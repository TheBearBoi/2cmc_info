<?php

namespace App\Http\Livewire;

use App\Models\Draft;
use App\Models\DraftSeat;
use App\Models\Player;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Validator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;
use Livewire\Component;
use function PHPUnit\Framework\throwException;

/**
 * Livewire Component for the Draft creation form
 *
 * @package App\Http\Livewire
 */
class DraftForm extends Component
{
    public string $new_player_name;
    public Collection $draft_seats;
    public Collection $remaining_previous_players;
    public int $player_count;
    public bool $is_team_draft;
    public int $round_time;

    protected $rules = [
        'round_time' => 'required'
    ];

    /**
     * Generate the default values for the livewire component
     *
     * @return void
     */
    public function mount(): void
    {
        $this->new_player_name = "";
        $this->remaining_previous_players = Player::get(['player_id','player_name']);
        $this->draft_seats = collect([]);
        $this->player_count = 0;
        $this->is_team_draft = false;
        $this->round_time = 50;
    }

    /**
     * Add a player to the draft, based on user input. If it is a new player, create a new player entry in the db.
     *
     * @return void
     */
    public function addPlayer(): void
    {
        if($this->new_player_name=="") {return;} // If the user is submitting an empty player name, return
        $player = Player::firstOrCreate([
            'player_name' => $this->new_player_name
        ]);

        $seat = new DraftSeat; // Create a new DraftSeat Object
        $seat->player_id = $player->player_id;
        $seat->seat_number = 0; // TODO, set default seat_number to 0 for draftseat objects

        // Remove the player from the list of players who haven't been added yet
        $this->remaining_previous_players = $this->remaining_previous_players->reject($player);

        $this->new_player_name = ""; // Reset the player entry box to empty

        $this->draft_seats[$player->player_id] = $seat;
        $this->player_count++;
    }

    /**
     * Remove a player from the current draft, based on the player id.
     *
     * @param int $id
     * @return void
     */
    public function removePlayer(int $id): void
    {
        unset($this->draft_seats[$id]);
        $this->remaining_previous_players->add(Player::find($id));
        $this->player_count--;
    }

    /**
     * Create the draft, and redirect the player to the active draft route, and controller.
     */
    public function createDraft()
    {
        $this->withValidator(function (Validator $validator) {
            $validator->after(function ($validator) {
                if ($this->player_count == 0) {
                    $validator->errors()->add('player_count', 'Please add at least one player to create a draft');
                }
            });
        })->validate();

        $draft = new Draft([
            'phase' => 1,
            'is_team_draft' => $this->is_team_draft,
            'round_time' => $this->round_time
        ]);
        $draft->save();
        $draft_seats = $this->draft_seats;

        //Split the players into an array of players with and without assigned seats
        list($assigned_draft_seats, $draft_seats) = $draft_seats->partition(function($item){
            return $item["seat_number"] != 0;
        });
        $draft_seats = $draft_seats->shuffle()->values();

        //Regroup the assigned and unassigned seats, maintaining the assigned seat numbers.
        foreach($assigned_draft_seats as $draft_seat)
        {
            $draft_seats->splice(1,0,[$draft_seat]);
        }

        //Creat Draft Seat objects, and save them.
        foreach ($draft_seats as $key => $draft_seat)
        {
            $draft_seat = new DraftSeat([
                    'draft_id' => $draft->draft_id,
                    'player_id' => $draft_seat['player_id'],
                    'seat_number' => $key+1
                ]);
            $draft_seat->save();
        }
        return redirect()->route('drafts.active');
    }

    /**
     * Render the Livewire component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('livewire.draft-form', ['draft_seats' => $this->draft_seats, 'remaining_previous_players' => $this->remaining_previous_players, 'player_count' => $this->player_count]);
    }
}

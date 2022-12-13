<?php

namespace App\Http\Livewire;

use App\Models\Draft;
use App\Models\DraftSeat;
use App\Models\Player;
use Illuminate\Support\Collection;
use Livewire\Component;

class DraftForm extends Component
{
    public $new_player_name;
    public $draft_seats = [];
    public $remaining_previous_players;
    public $player_count = 0;
    public $is_team_draft = false;
    public $round_time = 50;

    public function mount()
    {
        $this->remaining_previous_players = Player::get(['player_id','player_name']);
        $this->draft_seats = collect([]);
    }

    public function render()
    {
        return view('livewire.draft-form', ['draft_seats' => $this->draft_seats, 'remaining_previous_players' => $this->remaining_previous_players, 'player_count' => $this->player_count]);
    }

    public function addPlayer()
    {
        if($this->new_player_name=="") {return;}
        $player = Player::firstOrCreate([
            'player_name' => $this->new_player_name
        ]);

        $seat = new DraftSeat;
        $seat->player_id = $player->player_id;
        $seat->player = $player;
        $seat->seat_number = 0;

        $this->remaining_previous_players = $this->remaining_previous_players->reject($player);

        $this->new_player_name = "";

        $this->draft_seats[$player->player_id] = $seat;
        $this->player_count++;
    }

    public function removePlayer($id)
    {
        unset($this->draft_seats[$id]);
        $this->remaining_previous_players->add(Player::find($id));
        $this->player_count--;
    }

    public function createDraft()
    {
        $draft = new Draft([
            'phase' => 1,
            'is_team_draft' => $this->is_team_draft,
            'round_time' => $this->round_time
        ]);
        $draft->save();
        $draft_seats = $this->draft_seats;


        list($assigned_draft_seats, $draft_seats) = $draft_seats->partition(function($item){
            return $item["seat_number"] != 0;
        });
        $draft_seats = $draft_seats->shuffle()->values();
        foreach($assigned_draft_seats as $draft_seat)
        {
            $draft_seats->splice(1,0,[$draft_seat]);
        }

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
}

<?php

namespace App\Http\Livewire;

use App\Models\Draft;
use App\Models\DraftMatch;
use App\Models\DraftSeat;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;


class NextRound extends Component
{
    public $label;
    public Draft $draft;
    public $seats;

    public function mount()
    {
        $this->seats = $this->draft->seats;
    }

    public function render()
    {
        return view('livewire.next-round');
    }

    public function next_round()
    {
        $draft = $this->draft;
        $seats = $this->seats;
        $round_number = $draft->phase - 2;
        list($current_round_matches, $previous_rounds_matches) = $draft->matches
            ->partition(function($match) use($round_number){
                return $match->round_number == $round_number;
            });

        if ($round_number != 0)
        {
            if ($this->has_outstanding_matches($current_round_matches))
            {
                return 'please submit all matches before advancing to the next round';
            }
            foreach($current_round_matches as $match)
            {
                $this->update_deck_record($match);
            }
        }

        if($draft->is_team_draft) {
            $this->create_team_pairings($seats, $draft);
        } else {
            $this->create_pairings($seats, $previous_rounds_matches, $draft);
        }

        $draft->phase++;
        $draft->save();
        return redirect()->route('drafts.active');
    }

    private function update_deck_record($match)
    {
        $player_1_wins = $match->player_1_wins;
        $deck_1 = $match->seat_1->deck;
        $deck_2 = $match->seat_2->deck ?? false; //TODO: Look into potentially creating a new deck if one doesnt exist, and just not saving it.
        $player_2_wins = $match->player_2_wins;
        if($player_1_wins > $player_2_wins)
        {
            $deck_1->wins++;
            if($deck_2) {$deck_2->wins++;}
        } elseif ($player_1_wins < $player_2_wins)
        {
            $deck_1->losses++;
            if($deck_2) {$deck_2->losses++;}
        } else
        {
            $deck_1->draws++;
            if($deck_2) {$deck_2->draws++;}
        }
        $deck_1->save();
        if($deck_2) {$deck_2->save();}
    }

    private function has_outstanding_matches($matches)
    {
        $outstanding_matches = $matches->where('is_submitted', false)->count();
        return $outstanding_matches > 0;
    }

    private function create_pairings($seats, $previous_rounds_matches, $draft)
    {
        $round_number = $draft->phase - 2;

        $seats = $seats->shuffle()->values()->sortBy('deck.wins', SORT_NUMERIC);

        while ($seats->count() > 1)
        {
            $seat = $seats->pop();
            $previous_opponents = new Collection();
            $previous_opponents = $previous_opponents
                ->push(
                    $previous_rounds_matches
                        ->where('seat_2_id', $seat->seat_id)
                        ->pluck('seat_1_id')
                )
                ->push(
                    $previous_rounds_matches
                        ->where('seat_1_id', $seat->seat_id)
                        ->pluck('seat_2_id')
                )
                ->flatten()
                ->toArray();
            $new_opponent_key = $seats
                ->whereNotIn('seat_id', $previous_opponents)
                ->keys()
                ->last();
            $new_opponent_seat = $seats->pull($new_opponent_key);
            DraftMatch::create(
                [
                    'draft_id' => $draft->draft_id,
                    'round_number' => $round_number+1,
                    'seat_1_id' => $seat->seat_id,
                    'seat_2_id' => $new_opponent_seat->seat_id
                ]
            );
        }

        if($seats->isNotEmpty()){
            $seat = $seats->pop();
            DraftMatch::create(
                [
                    'draft_id' => $draft->draft_id,
                    'round_number' => $round_number+1,
                    'seat_1_id' => $seat->seat_id,
                    'seat_2_id' => NULL,
                    'player_1_wins' => 1,
                    'is_submitted' => true
                ]
            );
        }
    }

    private function create_team_pairings($seats, $draft)
    {
        $round_number = $draft->phase - 2;

        list($team_1, $team_2) = $seats->partition(function($seat){
            return $seat->team_number == 1;
        });
        $rotated_team_2_players = $team_2->shift($round_number);
        $team_1 = $team_1->values();
        $team_2 = $team_2->values()->concat($rotated_team_2_players);

        $pairings = $team_1
            ->zip($team_2);

        foreach($pairings as $pairing)
        {
            $pairing = $pairing->values();
            $draft_match = DraftMatch::create(
                [
                    'draft_id' => $draft->draft_id,
                    'round_number' => $round_number+1,
                    'seat_1_id' => $pairing[0]->seat_id,
                    'seat_2_id' => $pairing[1]->seat_id ?? NULL
                ]
            );
            if(count($pairing) == 1){
                $draft_match->player_1_wins = 1;
                $draft_match->is_submitted = true;
                $draft_match->save();
            }
        }
    }
}

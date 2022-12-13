<?php

namespace App\Http\Livewire;

use App\Models\Draft;
use App\Models\DraftMatch;
use App\Models\DraftSeat;
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
        if ($round_number != 0)
        {
            $outstanding_matches = $draft->matches->where([
                'is_submitted'=> false,
                'round_number' => $round_number
            ])->count();
            if ($outstanding_matches > 0)
            {
                return 'please submit all matches before advancing to the next round';
            }
            $matches = $draft->matches->where('round_number', $round_number);
            foreach($matches as $match)
            {
                $player_1_wins = $match->player_1_wins;
                $deck_1 = $match->seat_1->deck;
                $deck_2 = $match->seat_2->deck;
                $player_2_wins = $match->player_2_wins;
                if($player_1_wins > $player_2_wins)
                {
                    $deck_1->wins++;
                    $deck_2->losses++;
                } elseif ($player_1_wins < $player_2_wins)
                {
                    $deck_1->losses++;
                    $deck_2->wins++;
                } else
                {
                    $deck_1->draws++;
                    $deck_2->draws++;
                }
                $deck_1->save();
                $deck_2->save();
            }
        }

        if($draft->is_team_draft) {
            list($team_1, $team_2) = $seats->partition(function($item){
                return $item->team_number == 1;
            });
            $rotated_team_2_players = $team_2->shift($round_number);
            $team_1 = $team_1->values();
            $team_2 = $team_2->values()->concat($rotated_team_2_players);

            $pairings = $team_1->zip($team_2);
        } else {
//            $pairings = $seats->shuffle()->values()->sortBy('wins', SORT_NUMERIC)->chunk(2);
            $pairings = $seats->shuffle()->values()->chunk(2);
        }
        foreach ($pairings as $pairing)
        {
            $pairing = $pairing->values();
            DraftMatch::create(
                [
                    'draft_id' => $draft->draft_id,
                    'round_number' => $round_number+1,
                    'seat_1_id' => $pairing[0]->seat_id,
                    'seat_2_id' => $pairing[1]->seat_id
                ]
            );
        }

        $draft->phase++;
        $draft->save();
        return redirect()->route('drafts.active');
    }
}

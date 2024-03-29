<?php

namespace App\Http\Livewire;

use App\Models\Draft;
use App\Models\DraftMatch;
use App\Models\DraftSeat;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;
use Livewire\Component;

/**
 * Livewire Component for the Next Round Button
 *
 * @package App\Http\Livewire
 */
class NextRound extends Component
{
    public string $label;
    public Draft $draft;
    public Collection $seats;

    /**
     * Generate the default values for the livewire component
     *
     * @return void
     */
    public function mount(): void
    {
        $this->seats = $this->draft->seats;
    }

    /**
     * Validate if the round is ready to advance. If it is, Create the pairings and redirect the users to the active draft page.
     * If not, return false and dispatch a Missing Data browser event.
     *
     * @return false|RedirectResponse
     */
    public function next_round()
    {
        $draft = $this->draft;
        $seats = $this->seats;
        $round_number = $draft->phase - 2;
        $matches = $draft->matches;

        $current_round_matches = $matches->where('round_number', $round_number);
        if($round_number == 0 AND $seats->where('deck_id', NULL)->count() >0){
            $this->dispatchBrowserEvent('MissingData', ['type' => 'decks']);
            return false;
        } else {
            if ($this->has_outstanding_matches($current_round_matches))
            {
                $this->dispatchBrowserEvent('MissingData', ['type' => 'Matches']);
                return false;
            }
            foreach($current_round_matches as $match)
            {
                $this->update_deck_record($match);
            }
        }

        if($draft->is_team_draft) {
            $this->create_team_pairings($seats, $draft);
        } else {
            $this->create_pairings($seats, $matches, $draft);
        }

        $draft->phase++;
        $draft->save();
        return redirect()->route('drafts.active');
    }

    /**
     * Update the records for the decks playing in the current match.
     *
     * @param DraftMatch $match
     * @return void
     */
    private function update_deck_record(DraftMatch $match): void
    {
        $player_1_wins = $match->player_1_wins;
        $deck_1 = $match->seat_1->deck;
        $deck_2 = $match->seat_2->deck ?? false; //TODO: Look into potentially creating a new deck if one doesnt exist, and just not saving it.
        $player_2_wins = $match->player_2_wins;
        if($player_1_wins > $player_2_wins)
        {
            $deck_1->wins++;
            if($deck_2) {$deck_2->losses++;}
        } elseif ($player_1_wins < $player_2_wins)
        {
            $deck_1->losses++;
            if($deck_2) {$deck_2->wins++;}
        } else
        {
            $deck_1->draws++;
            if($deck_2) {$deck_2->draws++;}
        }
        $deck_1->save();
        if($deck_2) {$deck_2->save();}
    }

    /**
     * Check if the current round had any outstanding matches.
     *
     * @param Collection<DraftMatch> $matches
     * @return bool
     */
    private function has_outstanding_matches(Collection $matches): bool
    {
        $outstanding_matches = $matches->where('is_submitted', false)->count();
        return $outstanding_matches > 0;
    }

    /**
     * Generate Pairings For the next solo round
     * TODO Comment code process
     *
     * @param Collection<DraftSeat> $seats
     * @param Collection<DraftMatch> $matches
     * @param $draft
     * @return void
     */
    private function create_pairings(Collection $seats, Collection $matches, $draft): void
    {
        $round_number = $draft->phase - 2;

        $seats = $seats->shuffle()->values()->sortBy('deck.wins', SORT_NUMERIC);

        while ($seats->count() > 1)
        {
            $seat = $seats->pop();
            $previous_opponents = new Collection();
            $previous_opponents = $previous_opponents
                ->push(
                    $matches
                        ->where('seat_2_id', $seat->seat_id)
                        ->pluck('seat_1_id')
                )
                ->push(
                    $matches
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

    /**
     * Generate Pairings For the next teams round
     * TODO Comment code process
     *
     * @param Collection<DraftSeat> $seats
     * @param Draft $draft
     * @return void
     */
    private function create_team_pairings(Collection $seats, Draft $draft): void
    {
        $round_number = $draft->phase - 2;

        list($team_1, $team_2) = $seats->partition(function($seat){
            return $seat->team_number == 1;
        });
        $rotated_team_2_players = $team_2->shift($round_number);
        $team_2 = $team_2->values();
        if($round_number==1) {
            $team_2 = $team_2->push($rotated_team_2_players);
        } else {
            $team_2 = $team_2->values()->concat($rotated_team_2_players);
        }

        $team_1 = $team_1->values();

        $pairings = $team_1
            ->zip($team_2);

        foreach($pairings as $pairing)
        {
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

    /**
     * Render the Livewire component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('livewire.next-round');
    }
}

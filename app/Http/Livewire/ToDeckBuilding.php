<?php

namespace App\Http\Livewire;

use App\Models\Draft;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;

/**
 * Livewire Component for the Button to advance to deck-building.
 *
 * @package App\Http\Livewire
 */
class ToDeckBuilding extends Component
{
    public string $label;
    public Draft $draft;

    /**
     * If the draft is a team draft, assign teams, then advance the draft phase to deck building
     * and redirect to the active draft page.
     * TODO comment code process
     *
     * @return RedirectResponse
     */
    public function to_deck_building(): RedirectResponse
    {
        if ($this->draft->is_team_draft)
        {
            $seats = $this->draft->seats;
            $player_count = $seats->count();
            foreach($seats->shuffle()->chunk(ceil($player_count/2)) as $team_number => $team)
            {
                $team_number++;
                foreach($team as $player)
                {
                    $player->team_number = $team_number;
                    $player->save();
                }
            }
        }

        $this->draft->phase = 2;
        $this->draft->save();
        return redirect()->route('drafts.active');
    }

    /**
     * Render the Livewire component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('livewire.to-deck-building', ['label' => $this->label]);
    }
}

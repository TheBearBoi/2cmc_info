<?php

namespace App\Http\Livewire;

use App\Models\Draft;
use Livewire\Component;

class ToDeckBuilding extends Component
{
    public $label;
    public Draft $draft;

    public function render()
    {
        return view('livewire.to-deck-building', ['label' => $this->label]);
    }

    public function to_deck_building()
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
}

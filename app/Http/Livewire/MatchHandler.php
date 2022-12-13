<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MatchHandler extends Component
{
    public $match;

    public $rules = [
        'match.player_1_wins' => 'required|int|min:0',
        'match.player_2_wins' => 'required|int|min:0',
        'match.draws' => 'required|int|min:0'
    ];

    public function render()
    {
        return view('livewire.match-handler');
    }

    public function submitResults()
    {
        $this->match->is_submitted = true;
        $this->match->save();
    }
}

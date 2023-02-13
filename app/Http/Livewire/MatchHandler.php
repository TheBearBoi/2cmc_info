<?php

namespace App\Http\Livewire;

use App\Models\DraftMatch;
use Illuminate\Contracts\View\View;
use Livewire\Component;

/**
 * Livewire Component for the Draft creation form
 *
 * @package App\Http\Livewire
 */
class MatchHandler extends Component
{
    public DraftMatch $match;

    public $rules = [
        'match.player_1_wins' => 'required|int|min:0',
        'match.player_2_wins' => 'required|int|min:0',
        'match.draws' => 'required|int|min:0'
    ];

    /**
     * Submit and save the results the user has entered.
     *
     * @return void
     */
    public function submitResults(): void
    {
        $this->match->is_submitted = true;
        $this->match->save();
    }

    /**
     * Render the Livewire component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('livewire.match-handler');
    }
}

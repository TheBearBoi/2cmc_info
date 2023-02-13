<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;

/**
 * Livewire Component for the Round dashboard
 * TODO Figure out what this is lol
 *
 * @package App\Http\Livewire
 */
class RoundDashboard extends Component
{
    /**
     * Render the Livewire component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('livewire.round-dashboard');
    }
}

<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;

/**
 * Livewire Component for the Manual Deckbuilder
 * TODO merge with popup compoonent
 *
 * @package App\Http\Livewire
 */
class DeckBuilder extends Component
{
    public int $seat;
    public bool $showManualDeckBuilder;

    /**
     * Generate the default values for the livewire component
     *
     * @return void
     */
    public function mount(): void
    {
        $this->showManualDeckBuilder = false;
    }

    /**
     * Render the Livewire component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('livewire.deck-builder');
    }
}

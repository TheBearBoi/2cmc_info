<?php

namespace App\Http\Livewire;

use App\Models\Deck;
use Barryvdh\Debugbar\Facades\Debugbar;
use Livewire\Component;

class DeckBuilder extends Component
{
    public $seat;
    public $showManualDeckBuilder;

    public function mount()
    {
        $this->showManualDeckBuilder = false;
    }

    public function render()
    {
        return view('livewire.deck-builder');
    }
}

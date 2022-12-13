<?php

namespace App\Http\Livewire;

use App\Models\Deck;
use Barryvdh\Debugbar\Facades\Debugbar;
use Livewire\Component;

class DeckBuilder extends Component
{
    public $seat;
    public $showManualDeckBuilder = false;

    protected $listeners = [
        'showManualDeckBuilder' => 'showManualDeckBuilder',
        'hideManualDeckBuilder' => 'hideManualDeckBuilder'
    ];

    public function render()
    {
        return view('livewire.deck-builder');
    }


    public function toggleManualDeckBuilder()
    {
        $this->emitSelf('showManualDeckBuilder');
    }

    public function showManualDeckBuilder()
    {
        $this->showManualDeckBuilder = true;
    }

    public function hideManualDeckBuilder()
    {
        $this->showManualDeckBuilder = false;
    }

}

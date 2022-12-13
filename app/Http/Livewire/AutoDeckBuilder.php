<?php

namespace App\Http\Livewire;

use App\Events\CardScanned;
use Livewire\Component;

class AutoDeckBuilder extends Component
{
    public $seat;
    public $most_recent_card;
    public $deck = [];

    // Special Syntax: ['echo:{channel},{event}' => '{method}']
    protected $listeners = ['echo:card_scanned,CardScanned' => 'update_last_card'];

    public function update_last_card($data)
    {
        $this->last_card = $data['card'];
        $deck[] = $data['card'];
    }

    public function render()
    {
        return view('livewire.auto-deck-builder');
    }
}

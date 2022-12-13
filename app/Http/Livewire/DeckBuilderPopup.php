<?php

namespace App\Http\Livewire;

use App\Models\Card;
use App\Models\Deck;
use App\Models\DeckContent;
use Barryvdh\Debugbar\Facades\Debugbar;
use Livewire\Component;

class DeckBuilderPopup extends Component
{
    public $seat;
    public $deck_name;
    public $archetype;
    public $main_deck;
    public $sideboard;

    public function render()
    {
        return view('livewire.deck-builder-popup');
    }

    public function submitNewDeck()
    {
        Debugbar::addMessage($this->deck_name);
        $deck = Deck::create([
            'deck_name' => $this->deck_name,
            'player_id' => $this->seat->player_id,
            'color' => 'W',
            'archetype' => $this->archetype
        ]);

        $this->seat->deck_id = $deck->deck_id;
        $this->seat->save();

        $main_deck = explode(PHP_EOL, $this->main_deck);
        foreach ($main_deck as $line)
        {
            preg_match('/((?<quantity>\d+)x)?(?<name>.*)/', $line, $card);
            DeckContent::create([
                'deck_id' => $deck->deck_id,
                'oracle_id' => Card::firstWhere('name', $card['name'])->oracle_id,
                'quantity' => ($card['quantity']==""? 1 : $card['quantity']),
                'is_sideboard' => false
            ]);
        }

        $sideboard = explode(PHP_EOL, $this->sideboard);
        foreach ($sideboard as $line)
        {
            preg_match('/((?<quantity>\d+)x)?(?<name>.*)/', $line, $card);
            DeckContent::create([
                'deck_id' => $deck->deck_id,
                'oracle_id' => Card::firstWhere('name', $card['name'])->oracle_id,
                'quantity' => ($card['quantity']==""? 1 : $card['quantity']),
                'is_sideboard' => true
            ]);
        }
        $this->emitUp('hideManualDeckBuilder');
    }
}

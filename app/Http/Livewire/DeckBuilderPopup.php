<?php

namespace App\Http\Livewire;

use App\Models\Card;
use App\Models\Deck;
use App\Models\DeckContent;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Illuminate\Support\Collection;

/**
 * Livewire Component for the Manual Deckbuilder popup
 * TODO Rewrite, to be inline with autodeck builder.
 *
 * @package App\Http\Livewire
 */
class DeckBuilderPopup extends Component
{
    public int $seat;
    public string $deck_name;
    public string $archetype;
    public string $main_deck;
    public string $sideboard;

    /**
     * Create a new deck based on the values entered
     *
     * @return void
     */
    public function submitNewDeck(): void
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

    /**
     * Render the Livewire component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('livewire.deck-builder-popup');
    }
}

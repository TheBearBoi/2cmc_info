<?php

namespace App\Http\Livewire;

use App\Events\AutoDeckbuilderStateChanged;
use App\Models\Card;
use App\Models\CubeList;
use App\Models\Deck;
use App\Models\DeckContent;
use App\Models\DraftSeat;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Illuminate\Support\Collection;

/**
 * Livewire Component for the Deckbuilder popup utilizing a NFC scanner
 * TODO rewrite archetype & color queries to eloquent
 *
 * @package App\Http\Livewire
 */
class AutoDeckBuilder extends Component
{
    public DraftSeat $seat;
    public Card $most_recent_card;
    public Collection $main_deck;
    public Collection $sideboard;
    public bool $open;
    public string $deck_name;
    public string $archetype;
    public array $colors;
    public bool $submitted;

    /**
     * Generate the default values for the livewire component
     *
     * @return void
     */
    public function mount(): void
    {
        $this->open = false;
        $this->submitted = false;
        $this->main_deck = collect();
        $this->sideboard = collect();
        $this->colors = ["W" => false,
            "U" => false,
            "B" => false,
            "R" => false,
            "G" => false];
    }


    /**
     * Channel and event to listen for in order to add new cards as scanned
     *
     * @return string[]
     */
    public function getListeners(): array
    {
        return [
            "echo-private:scanner,.client-CardsScanned-{$this->seat->seat_number}" => 'update_last_card'
        ];
    }

    /**
     * Define how the main deck list property is accessed, such that duplicate cards are grouped together
     *
     * @return Collection
     */
    public function getMainDeckListProperty(): Collection
    {
        return $this->main_deck->groupBy('oracle_id')->map(function ($row) {
                            return ['quantity' => $row->count(),
                                'card' => $row[0]];
                        });

    }

    /**
     * Define how the sideboard list property is accessed, such that duplicate cards are grouped together
     *
     * @return Collection
     */
    public function getSideboardListProperty(): Collection
    {
        return $this->sideboard->groupBy('oracle_id')->map(function ($row) {
            return ['quantity' => $row->count(),
                'card' => $row[0]];
        });
    }

    /**
     * Update the most recent card scanned based on the websocket data.
     *
     * @param array $data
     * @return void
     */
    public function update_last_card(array $data): void
    {
        if (!$this->open) return;
        $card_uids = json_decode($data['uids'], true);

        foreach ($card_uids as $card_uid) {
            $card = CubeList::find($card_uid)->card;
            if ($data['main_deck']) {$this->main_deck->push($card);}
            else {$this->sideboard->push($card);}
        }
    }

    /**
     * Send a message over the websocket when the scanner is toggled on or off.
     *
     * @return void
     */
    public function toggle_scanner(): void
    {
        $this->open = !$this->open;
        AutoDeckbuilderStateChanged::dispatch($this->open, $this->seat->seat_number);
    }

    /**
     * Create a new deck and save it when the submit button is pressed.
     *
     * @return void
     */
    public function CreateDeck(): void
    {
        $colors = array_filter($this->colors, function($v) {return $v;}); // filter color array down to those which are set
        $colors = array_keys($colors); // Set color letters to be the array values instead of the keys.

        // create a new deck
        $deck = Deck::create([
            'deck_name' => $this->deck_name,
            'player_id' => $this->seat->player_id,
            'color' => join($colors),
            'archetype' => $this->archetype
        ]);

        // Save the cards in the main deck list to deck contents entities
        foreach ($this->main_deck_list as $value){
            DeckContent::create([
                'deck_id' => $deck->deck_id,
                'oracle_id' => $value['card']['oracle_id'],
                'quantity' => $value['quantity'],
                'is_sideboard' => false
                ]);
        }

        // Save the cards in the sideboard list to deck contents entities
        foreach ($this->sideboard_list as $value){
            DeckContent::create([
                'deck_id' => $deck->deck_id,
                'oracle_id' => $value['card']['oracle_id'],
                'quantity' => $value['quantity'],
                'is_sideboard' => true
            ]);
        }
        $this->seat->deck_id = $deck->deck_id;
        $this->seat->save();

        // Disable the deck builder popup option, and send a message over the websocket
        $this->open = false;
        $this->submitted = true;
        AutoDeckbuilderStateChanged::dispatch($this->open, $this->seat->seat_number);
    }

    /**
     * Render the Livewire component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('livewire.auto-deck-builder');
    }
}

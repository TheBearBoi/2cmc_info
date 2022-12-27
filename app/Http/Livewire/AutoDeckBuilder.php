<?php

namespace App\Http\Livewire;

use App\Events\AutoDeckbuilderStateChanged;
use App\Events\CardScanned;
use App\Models\Card;
use App\Models\CubeList;
use App\Models\Deck;
use App\Models\DeckContent;
use Livewire\Component;

class AutoDeckBuilder extends Component
{
    public $seat;
    public $most_recent_card;
    public $main_deck;
    public $sideboard;
    public $open;
    public $deck_name;
    public $archetype;
    public $colors;
    public $submitted;

    public function mount()
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

    // Echo Listener Syntax: ['echo-private:{channel},{event}' => '{method}']
    public function getListeners()
    {
        return [
            "echo-private:scanner,.client-CardScanned-{$this->seat->seat_number}" => 'update_last_card'
        ];
    }

    public function getMainDeckListProperty()
    {
        return $this->main_deck->groupBy('oracle_id')->map(function ($row) {
                            return ['quantity' => $row->count(),
                                'card' => $row[0]];
                        });

    }

    public function getSideboardListProperty()
    {
        return $this->sideboard->groupBy('oracle_id')->map(function ($row) {
            return ['quantity' => $row->count(),
                'card' => $row[0]];
        });
    }

    public function update_last_card($data)
    {
        if (!$this->open) return;
        $this->most_recent_card = CubeList::find($data['sleeve_id'])->card;
        if($data['main_deck']){$this->main_deck->push($this->most_recent_card);}
        else{$this->sideboard->push($this->most_recent_card);}
    }

    public function toggle_scanner()
    {
        $this->open = !$this->open;
        AutoDeckbuilderStateChanged::dispatch($this->open, $this->seat->seat_number);
    }

    public function CreateDeck()
    {
        $colors = array_filter($this->colors, function($v) {return $v;});
        $colors = array_keys($colors);
        $deck = Deck::create([
            'deck_name' => $this->deck_name,
            'player_id' => $this->seat->player_id,
            'color' => join($colors),
            'archetype' => $this->archetype
        ]);
        foreach ($this->main_deck_list as $value){
            DeckContent::create([
                'deck_id' => $deck->deck_id,
                'oracle_id' => $value['card']['oracle_id'],
                'quantity' => $value['quantity'],
                'is_sideboard' => false
                ]);
        }
        foreach ($this->sideboard_list as $value){
            DeckContent::create([
                'deck_id' => $deck->deck_id,
                'oracle_id' => $value['card']['oracle_id'],
                'quantity' => $value['quantity'],
                'is_sideboard' => true
            ]);
        }
        $this->open = false;
        $this->submitted = true;
        AutoDeckbuilderStateChanged::dispatch($this->open, $this->seat->seat_number);
    }

    public function render()
    {
        return view('livewire.auto-deck-builder');
    }
}

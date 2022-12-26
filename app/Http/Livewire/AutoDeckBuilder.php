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
    public $show;
    public $count;
    // Special Syntax: ['echo:{channel},{event}' => '{method}']
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
            return $row->count();
        });
    }

    public function mount()
    {
        $this->most_recent_card = Card::find('5089ec1a-f881-4d55-af14-5d996171203b');
        $this->show = false;
        $this->main_deck = collect();
        $this->sideboard = collect();
        $this->count = 0;
    }

    public function update_last_card($data)
    {
        if (!$this->show) return;
        $this->most_recent_card = CubeList::find($data['sleeve_id'])->card;
        if($data['main_deck']){$this->main_deck->push($this->most_recent_card);}
        else{$this->sideboard->push($this->most_recent_card);}
        $this->count++;
    }

    public function toggle_scanner()
    {
        $this->show = !$this->show;
        AutoDeckbuilderStateChanged::dispatch($this->show, $this->seat->seat_number);
    }

    public function CreateDeck()
    {
        $deck = Deck::create(['deck_name' => 'test', 'player_id' => $this->seat->player_id, 'color' => 'wubrg', 'archetype' => 'test']);
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
    }

    public function render()
    {
        return view('livewire.auto-deck-builder');
    }
}

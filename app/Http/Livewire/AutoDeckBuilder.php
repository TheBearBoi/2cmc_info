<?php

namespace App\Http\Livewire;

use App\Events\AutoDeckbuilderStateChanged;
use App\Events\CardScanned;
use App\Models\Card;
use App\Models\CubeList;
use Livewire\Component;

class AutoDeckBuilder extends Component
{
    public $seat;
    public $most_recent_card;
    public $deck;
    public $show;
    // Special Syntax: ['echo:{channel},{event}' => '{method}']
    public function getListeners()
    {
        return [
            "echo-private:scanner,.client-CardScanned-{$this->seat->seat_number}" => 'update_last_card'
        ];
    }

    public function getDeckCardNames()
    {
        return $this->deck->pluck("name");
    }

    public function mount()
    {
        $this->most_recent_card = Card::find('5089ec1a-f881-4d55-af14-5d996171203b');
        $this->show = false;
        $this->deck = collect();
    }

    public function update_last_card($data)
    {
        if (!$this->show) return;
        $this->most_recent_card = CubeList::find($data['sleeve_id'])->card;
        $this->deck->push($this->most_recent_card);
    }

    public function toggle_scanner()
    {
        $this->show = !$this->show;
        AutoDeckbuilderStateChanged::dispatch($this->show, $this->seat->seat_number);
    }

    public function render()
    {
        return view('livewire.auto-deck-builder');
    }
}

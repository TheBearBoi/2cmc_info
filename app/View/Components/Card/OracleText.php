<?php

namespace App\View\Components\Card;

use App\Models\Card;
use Illuminate\View\Component;

class OracleText extends Component
{
    public Card $card;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($card)
    {
        $this->card = $card;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card.oracle-text');
    }
}

<?php

namespace App\View\Components\Card;

use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class HoverLink extends Component
{
    public Model $card;
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
        return view('components.card.hover-link');
    }
}

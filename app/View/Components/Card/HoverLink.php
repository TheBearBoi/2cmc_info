<?php

namespace App\View\Components\Card;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

/**
 * Component for generating links that show an image of the card upon hovering
 *
 * @package App\View\Components\Card
 */
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
     * @return View
     */
    public function render(): View
    {
        return view('components.card.hover-link');
    }
}

<?php

namespace App\View\Components\Deck;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Component for laying out the body of the Deck Show page
 *
 * @package App\View\Components\Deck
 */
class ShowBody extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('components.deck.show-body');
    }
}

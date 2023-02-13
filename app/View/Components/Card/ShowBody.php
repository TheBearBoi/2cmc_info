<?php

namespace App\View\Components\Card;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Component for laying out the body of the Card Show page
 *
 * @package App\View\Components\Card
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
    public function render()
    {
        return view('components.card.show-body');
    }
}

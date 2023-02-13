<?php

namespace App\View\Components\Player;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Component for laying out the body of the Player Show page
 *
 * @package App\View\Components\Player
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
        return view('components.player.show-body');
    }
}

<?php

namespace App\View\Components\Shared;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Component for laying out the Navbar
 *
 * @package App\View\Components\Card
 */
class NavBar extends Component
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
        return view('components.shared.nav-bar');
    }
}

<?php

namespace App\View\Components\Draft\Active;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Component for laying out the Matches Phase Page
 *
 * @package App\View\Components\Draft\Active
 */
class MatchesBody extends Component
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
        return view('components.draft.active.matches-body');
    }
}

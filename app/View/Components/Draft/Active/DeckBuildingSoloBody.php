<?php

namespace App\View\Components\Draft\Active;

use App\Models\Draft;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Component for laying out the Solo Deck Building Phase Page
 *
 * @package App\View\Components\Draft\Active
 */
class DeckBuildingSoloBody extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public Draft $draft)
    {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('components.draft.active.deck-building-solo-body');
    }
}

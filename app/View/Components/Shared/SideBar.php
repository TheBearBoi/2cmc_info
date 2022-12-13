<?php

namespace App\View\Components\Shared;

use Illuminate\View\Component;

class SideBar extends Component
{
    public bool $leaderboard;
    public bool $current_draft;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($leaderboard, $currentdraft)
    {
        $this->leaderboard = $leaderboard;
        $this->current_draft = $currentdraft;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.shared.side-bar');
    }
}

<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MainLayout extends Component
{
    public bool $leaderboard;
    public bool $current_draft;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($leaderboard = false, $currentdraft = false)
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
        return view('components.main-layout');
    }
}

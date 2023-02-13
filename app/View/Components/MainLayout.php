<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Component for laying out the page (sidebars, navbars and the wrapper for the main content)
 *
 * @package App\View\Components
 */
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
     * @return View
     */
    public function render(): View
    {
        return view('components.main-layout');
    }
}

<?php

namespace App\View\Components\Shared;

use App\Models\Player;
use Illuminate\View\Component;

class SideBar extends Component
{
    public bool $leaderboard;
    public bool $current_draft;
    public $current_leaderboard;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($leaderboard, $currentdraft)
    {
        $this->leaderboard = $leaderboard;
        $this->current_draft = $currentdraft;
        $this->current_leaderboard = Player::with('decks')
            ->withSum('decks AS total_trophies', 'is_trophy')
            ->groupBy('player_id')
            ->orderBy('total_trophies', 'DESC')
            ->take(5)
            ->get();;
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

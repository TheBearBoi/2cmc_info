<?php

namespace App\View\Components\Shared;

use App\Models\Player;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

/**
 * Component for laying out the Sidebar
 *
 * @package App\View\Components\Card
 */
class SideBar extends Component
{
    public bool $leaderboard;
    public bool $current_draft;
    public Collection $current_leaderboard;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(bool $leaderboard, bool $currentdraft)
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
     * @return View
     */
    public function render(): View
    {
        return view('components.shared.side-bar');
    }
}

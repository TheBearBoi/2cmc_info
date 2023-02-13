<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Deck;
use App\Models\Player;
use Illuminate\Contracts\View\View;

/**
 * Controller for Player Pages
 * TODO rewrite archetype & color queries to eloquent
 *
 * @package App\Http\Controllers
 */
class StatisticsController extends Controller
{
    /**
     * Access the page for showing statistics
     *
     * @return View
     */
    public function __invoke(): View
    {
        // Get top 50 players, by trophies then win rate.
        $players_and_records = Player::withSum('decks AS total_trophies', 'is_trophy')
            ->withAvg('decks AS calc_win_rate', 'win_rate')
            ->groupBy('player_id')
            ->orderBy('total_trophies', 'DESC')
            ->orderBy('calc_win_rate', 'DESC')
            ->take(50)
            ->get();

        // Get top 50 cards by trophies then win rate
        $cards_and_records = Card::has('main_decks')
            ->where('is_basic', false)
            ->withSum('decks AS total_trophies', 'is_trophy')
            ->withAvg('decks AS calc_win_rate', 'win_rate')
            ->groupBy('oracle_id')
            ->orderBy('total_trophies', 'DESC')
            ->orderBy('calc_win_rate', 'DESC')
            ->take(50)
            ->get();

        // Get trophies & win rate for all archetypes.
        $archetype_stats = Deck::selectRaw('archetype, COUNT(*) as times_drafted, CONCAT_WS("-", SUM(wins), SUM(losses), SUM(draws)) as record, ROUND(100 * SUM(wins)/(SUM(wins) + SUM(losses) + SUM(draws)), 2) AS win_rate, SUM(is_trophy) as trophies')
            ->groupBy('archetype')
            ->orderBy('trophies', 'DESC')
            ->orderBy('win_rate', 'DESC')
            ->get();

        // Get trophies & win rate for all colors
        $color_stats = Deck::selectRaw('color, COUNT(*) as times_drafted, CONCAT_WS("-", SUM(wins), SUM(losses), SUM(draws)) as record, ROUND(100 * SUM(wins)/(SUM(wins) + SUM(losses) + SUM(draws)), 2) AS win_rate, SUM(is_trophy) as trophies')
            ->groupBy('color')
            ->orderBy('trophies', 'DESC')
            ->orderBy('win_rate', 'DESC')
            ->get();

        return view('statistics', [
            'archetype_stats' => $archetype_stats,
            'color_stats' => $color_stats,
            'players_and_records' => $players_and_records,
            'cards_and_records' => $cards_and_records]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Deck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function __invoke()
    {
        $archetype_stats = Deck::selectRaw('archetype, COUNT(*) as times_drafted, CONCAT_WS("-", SUM(wins), SUM(losses), SUM(draws)) as record, ROUND(100 * SUM(wins)/(SUM(wins) + SUM(losses) + SUM(draws)), 2) AS win_rate, SUM(is_trophy) as trophies')
            ->groupBy('archetype')
            ->orderBy('trophies', 'DESC')
            ->orderBy('win_rate', 'DESC')
            ->get();

        $color_stats = Deck::selectRaw('color, COUNT(*) as times_drafted, CONCAT_WS("-", SUM(wins), SUM(losses), SUM(draws)) as record, ROUND(100 * SUM(wins)/(SUM(wins) + SUM(losses) + SUM(draws)), 2) AS win_rate, SUM(is_trophy) as trophies')
            ->groupBy('color')
            ->orderBy('trophies', 'DESC')
            ->orderBy('win_rate', 'DESC')
            ->get();

        return view('statistics', ['archetype_stats' => $archetype_stats, 'color_stats' => $color_stats]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Player;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function __invoke()
    {

        $players_and_records = Player::with('decks')
            ->withSum('decks AS total_trophies', 'is_trophy')
            ->withSum('decks AS total_wins', 'wins')
            ->groupBy('player_id')
            ->orderBy('total_trophies', 'DESC')
            ->orderBy('total_wins', 'DESC')
            ->take(50)
            ->get();

        $cards_and_records = Card::has('main_decks')
            ->with('main_decks')
            ->where('is_basic', false)
            ->withSum('decks AS total_trophies', 'is_trophy')
            ->withSum('decks AS total_wins', 'wins')
            ->groupBy('oracle_id')
            ->orderBy('total_trophies', 'DESC')
            ->orderBy('total_wins', 'DESC')
            ->take(50)
            ->get();

        return view('leaderboard', ['players_and_records' => $players_and_records, 'cards_and_records' => $cards_and_records]);
    }
}


//select `cards`.*,
//(select count(*) from `decks` inner join `deck_contents` on `decks`.`deck_id` = `deck_contents`.`deck_id` where `cards`.`oracle_id` = `deck_contents`.`oracle_id`) as `win_rate`,
//(select count(*) from `decks` inner join `deck_contents` on `decks`.`deck_id` = `deck_contents`.`deck_id` where `cards`.`oracle_id` = `deck_contents`.`oracle_id`) as `wins`,
//(select count(*) from `decks` inner join `deck_contents` on `decks`.`deck_id` = `deck_contents`.`deck_id` where `cards`.`oracle_id` = `deck_contents`.`oracle_id`) as `trophies`
//from `cards`
//where exists (select * from `decks` inner join `deck_contents` on `decks`.`deck_id` = `deck_contents`.`deck_id` where `cards`.`oracle_id` = `deck_contents`.`oracle_id` and `is_basic` is null)
//group by `oracle_id` order by `trophies` desc, `win_rate` desc limit 50

<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Contracts\View\View;

/**
 * Controller for Player Pages
 *
 * @package App\Http\Controllers
 */
class PlayerController extends Controller
{
    /**
     * Access the page for searching for a player
     *
     * @return View
     */
    public function search(): View
    {
        return view('player.search');
    }

    /**
     * Access the page for a specific player, selected by id
     *
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        $player = Player::find($id);

        return view('player.show', ['player' => $player]);
    }
}

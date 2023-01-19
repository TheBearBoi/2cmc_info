<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function search()
    {
        return view('player.search');
    }

    public function show($id)
    {
        $player = Player::find($id);

        return view('player.show', ['player' => $player]);
    }
}

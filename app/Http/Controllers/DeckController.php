<?php

namespace App\Http\Controllers;

use App\Models\Deck;
use Illuminate\Http\Request;

class DeckController extends Controller
{
    public function search()
    {

    }

    public function show($id)
    {
        $deck = Deck::with(['main_deck','sideboard','player'])->find($id);

        return view('deck.show', ['deck' => $deck]);
    }
}

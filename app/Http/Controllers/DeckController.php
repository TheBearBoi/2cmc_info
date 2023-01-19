<?php

namespace App\Http\Controllers;

use App\Models\Deck;
use App\Models\Draft;
use Illuminate\Http\Request;

class DeckController extends Controller
{
    public function search()
    {
        return view('deck.search');
    }

    public function show($id)
    {
        $deck = Deck::with(['main_deck','sideboard','player'])->find($id);

        return view('deck.show', ['deck' => $deck]);
    }

    public function box($id)
    {
        $current_draft = Draft::latest('id')
            ->first();
        $seat = $current_draft
            ->seats
            ->firstWhere('seat_number', $id);

        $deck = $seat
            ->deck;

        return view('deck.show', ['deck' => $deck]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Deck;
use App\Models\Draft;
use Illuminate\Contracts\View\View;

/**
 * Controller for Deck Pages
 *
 * @package App\Http\Controllers
 */
class DeckController extends Controller
{
    /**
     * Access page for searching for a deck
     *
     * @return View
     */
    public function search(): View
    {
        return view('deck.search');
    }

    /**
     * Access page for viewing a specific deck, by its deck id
     *
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        $deck = Deck::with(['main_deck','sideboard','player'])->find($id);

        return view('deck.show', ['deck' => $deck]);
    }

    /**
     * Access page for viewing a specific deck, by its box id. (Only for viewing currently active decks.)
     *
     * @param int $id
     * @return View
     */
    public function box(int $id): View
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

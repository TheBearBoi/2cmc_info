<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\CubeList;
use Illuminate\Contracts\View\View;

/**
 * Controller for Card Pages
 *
 * @package App\Http\Controllers
 */
class CardController extends Controller
{

    /**
     * Access the page for a specific card, selected by name
     *
     * @param string $name
     * @return View
     */
    public function show(string $name): View
    {
        $name = str_replace(['+','_'], " ", $name);
        $card = Card::firstWhere('name', $name);

        return view('card.show', ['card' => $card]);
    }

    /**
     * Access the page for a specific card, selected by sleeve id
     *
     * @param int $id
     * @return View
     */
    public function sleeve(int $id): View
    {
        $card = CubeList::firstWhere('sleeve_id', $id)->card;

        return view('card.show', ['card' => $card]);
    }
}

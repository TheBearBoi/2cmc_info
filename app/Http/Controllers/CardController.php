<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CardController extends Controller
{
    public function search()
    {

    }

    public function show($name)
    {
        $name = str_replace(['+','_'], " ", $name);
        $card = Card::firstWhere('name', $name);

        return view('card.show', ['card' => $card]);
    }
}

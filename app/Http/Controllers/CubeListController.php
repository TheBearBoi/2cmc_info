<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\CubeList;
use Illuminate\Http\Request;

class CubeListController extends Controller
{


    public function __invoke()
    {
        $cube_list = [];
        $unsorted_cube_list = CubeList::whereNotNull('layout_key_1')->get();

        foreach ($unsorted_cube_list as $list_entry) {
            $card = $list_entry->card;
            $cube_list[$list_entry->layout_key_1][$list_entry->layout_key_2][$card->cmc][] = $card;
        }
//dd($cube_list);
        return view('cube-list', ['cube_list' => $cube_list]);
    }
}

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

        $sort_category_1_enum = config('enums.sort_category_1');
        $sort_category_2_enum = config('enums.sort_category_2');
        $sort_category_1_coloring_enum = config('enums.sort_category_1_coloring');
        foreach ($unsorted_cube_list as $list_entry) {
            $card = $list_entry->card;
            $cube_list
            [$sort_category_1_enum[$list_entry->layout_key_1]]
            [$sort_category_2_enum[$list_entry->layout_key_2]]
            [$card->cmc][] = $card;
        }
//dd($cube_list);
        return view('cube-list', ['cube_list' => $cube_list,
            'sort_category_1_coloring_enum' => $sort_category_1_coloring_enum]);
    }
}

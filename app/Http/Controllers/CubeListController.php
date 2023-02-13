<?php

namespace App\Http\Controllers;

use App\Models\CubeList;
use Illuminate\Contracts\View\View;

/**
 * Controller for Cube List Page
 *
 * @package App\Http\Controllers
 */
class CubeListController extends Controller
{


    /**
     * Access the page for viewing the Cube List
     *
     * @return View
     */
    public function __invoke(): View
    {
        $cube_list = [];
        $unsorted_cube_list = CubeList::whereNotNull('layout_key_1')->get(); // Returns all nonbasic lands

        $sort_category_1_enum = config('enums.sort_category_1');
        $sort_category_2_enum = config('enums.sort_category_2');
        $sort_category_1_coloring_enum = config('enums.sort_category_1_coloring');
        foreach ($unsorted_cube_list as $list_entry) {
            $card = $list_entry->card;
            $cube_list
            [$sort_category_1_enum[$list_entry->layout_key_1]]
            [$sort_category_2_enum[$list_entry->layout_key_2]]
            [$card->cmc][] = $card;
        } //Sorts the cubelist into nested arrays, based on layout keys

        return view('cube-list', ['cube_list' => $cube_list,
            'sort_category_1_coloring_enum' => $sort_category_1_coloring_enum]);
    }
}

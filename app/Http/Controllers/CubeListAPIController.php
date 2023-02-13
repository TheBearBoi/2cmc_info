<?php

namespace App\Http\Controllers;

use App\Models\CubeList;

/**
 * Controller for the Cube List Api Call
 *
 * @package App\Http\Controllers
 */
class CubeListAPIController extends Controller
{

    /**
     * Returns the cube list, as a json string
     *
     * @return string
     */
    public function getCubeList(): string
    {
        return CubeList::get()
        ->map(function ($item) {
            return [
                'sleeve_id' => $item->sleeve_id,
                'name' => $item->card->name
            ];
        })
        ->toJson();
    }
}

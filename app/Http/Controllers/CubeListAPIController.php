<?php

namespace App\Http\Controllers;

use App\Models\CubeList;
use Illuminate\Http\Request;

class CubeListAPIController extends Controller
{
    public function getCubeList()
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

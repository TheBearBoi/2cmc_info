<?php

namespace App\Http\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait ColorTrait
{
    protected $colorDict = [
        "" => "Colorless",
        "W" => "White",
        "U" => "Blue",
        "B" => "Black",
        "R" => "Red",
        "G" => "Green",
        "WU" => "Azorius",
        "UB" => "Dimir",
        "BR" => "Rakdos",
        "RG" => "Gruul",
        "WG" => "Selesnya",
        "WB" => "Orzhov",
        "UR" => "Izzet",
        "BG" => "Golgari",
        "WR" => "Boros",
        "UG" => "Simic",
        "WUB" => "Esper",
        "UBR" => "Grixis",
        "BRG" => "Jund",
        "WRG" => "Naya",
        "WUG" => "Bant",
        "WBR" => "Mardu",
        "URG" => "Temur",
        "WBG" => "Abzan",
        "WUR" => "Jeskai",
        "UBG" => "Sultai",
        "WUBR" => "WUBR",
        "WUBG" => "WUBG",
        "WURG" => "WURG",
        "WBRG" => "WBRG",
        "UBRG" => "UBRG",
        "WUBRG" => "Five Color"
    ];

    public function getColorAttribute($value)
    {
        $color =  (str_contains($value, 'W') ? 'W' : '')
                . (str_contains($value, 'U') ? 'U' : '')
                . (str_contains($value, 'B') ? 'B' : '')
                . (str_contains($value, 'R') ? 'R' : '')
                . (str_contains($value, 'G') ? 'G' : '');
        return $this->colorDict[$color];
    }
}

<?php

namespace App\Http\Traits;

/**
 * Trait for accessing color as a string instead of an abbreviation
 *
 * @package App\Http\Traits
 */
trait ColorTrait
{
    /**
     * Dictionary of all the unabbreviated color names
     *
     * @var array|string[]
     */
    protected array $colorDict = [
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

    /**
     * Attribute for validating the color string formatting, and returning the name from the dictionary.
     *
     * @param string $value
     * @return string
     */
    public function getColorAttribute(string $value): string
    {
        $color =  (str_contains($value, 'W') ? 'W' : '')
                . (str_contains($value, 'U') ? 'U' : '')
                . (str_contains($value, 'B') ? 'B' : '')
                . (str_contains($value, 'R') ? 'R' : '')
                . (str_contains($value, 'G') ? 'G' : '');
        return $this->colorDict[$color];
    }
}

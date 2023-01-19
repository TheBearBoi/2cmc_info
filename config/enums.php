<?php

return [
    'sort_category_1' => [
        1 => "White",
        2 => "Blue",
        3 => "Black",
        4 => "Red",
        5 => "Green",
        6 => "Multicolor",
        7 => "Colorless",
        8 => "Lands"
    ],
    'sort_category_1_coloring' => [
        "White" => "bg-yellow-200",
        "Blue" => "bg-blue-300",
        "Black" => "bg-stone-500",
        "Red" => "bg-red-400",
        "Green" => "bg-green-300",
        "Multicolor" => "bg-amber-300",
        "Colorless" => "bg-gray-400",
        "Lands" => "bg-amber-600"
    ]
    ,
    'sort_category_2' => [
        1 => "Creature",
        //planeswalker in theory should be 2. Need more genralized sort system, that doesnt need to be manually defined.
        2 => "Artifact",
        3 => "Enchantment",
        4 => "Azorius",
        5 => "Instant",
        6 => "Sorcery",
        7 => "Land",
        8 => "Dimir",
        9 => "Rakdos",
        10 => "Gruul",
        11 => "Selesnya",
        12 => "Orzhov",
        13 => "Izzet",
        14 => "Golgari",
        15 => "Boros",
        16 => "Simic",
        17 => "Five Color"
        // TODO add 3&4 color categories
    ]
];

// Sort Category 1 WUBRG multi colorless land
// Sort Category 2
// creature instant sorcery artifact enchantment land allied-colors enemy-colors

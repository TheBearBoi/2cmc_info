<?php
//    change tables to enums
$archetypeChartColors = [
    "Agro"=>'#b91d47',
    "Combo"=>'#00aba9',
    "Control"=>'#2b5797',
    "Midrange"=>'#e8c3b9',
    "Storm"=>'#1e7145',
    "Tempo"=>'#301934'
];
$colorChartColors=[
    "White"=>"#F0E688",
    "Blue"=>"#00BFFF",
    "Black"=>"#9400DD",
    "Red"=>"#B22222",
    "Green"=>"#006400",
    "Five Color"=>"#FFD700"
];
$colorChartColors += [
    "Azorius"=>[$colorChartColors["White"],$colorChartColors["Blue"]],
    "Dimir"=>[$colorChartColors["Blue"],$colorChartColors["Black"]],
    "Rakdos"=>[$colorChartColors["Black"],$colorChartColors["Red"]],
    "Gruul"=>[$colorChartColors["Red"],$colorChartColors["Green"]],
    "Selesnya"=>[$colorChartColors["White"],$colorChartColors["Green"]],
    "Orzhov"=>[$colorChartColors["White"],$colorChartColors["Black"]],
    "Izzet"=>[$colorChartColors["Blue"],$colorChartColors["Red"]],
    "Golgari"=>[$colorChartColors["Black"],$colorChartColors["Green"]],
    "Boros"=>[$colorChartColors["White"],$colorChartColors["Red"]],
    "Simic"=>[$colorChartColors["Blue"],$colorChartColors["Green"]],
    "Esper"=>[$colorChartColors["White"],$colorChartColors["Blue"],$colorChartColors["Black"]],
    "Grixis"=>[$colorChartColors["Blue"],$colorChartColors["Black"],$colorChartColors["Red"]],
    "Jund"=>[$colorChartColors["Black"],$colorChartColors["Red"],$colorChartColors["Green"]],
    "Naya"=>[$colorChartColors["White"],$colorChartColors["Red"],$colorChartColors["Green"]],
    "Bant"=>[$colorChartColors["White"],$colorChartColors["Blue"],$colorChartColors["Green"]],
    "Mardu"=>[$colorChartColors["White"],$colorChartColors["Black"],$colorChartColors["Red"]],
    "Temur"=>[$colorChartColors["Blue"],$colorChartColors["Red"],$colorChartColors["Green"]],
    "Abzan"=>[$colorChartColors["White"],$colorChartColors["Black"],$colorChartColors["Green"]],
    "Jeskai"=>[$colorChartColors["White"],$colorChartColors["Blue"],$colorChartColors["Red"]],
    "Sultai"=>[$colorChartColors["Blue"],$colorChartColors["Black"],$colorChartColors["Green"]],
    "WUBR"=>[$colorChartColors["White"],$colorChartColors["Blue"],$colorChartColors["Black"],$colorChartColors["Red"]],
    "WUBG"=>[$colorChartColors["White"],$colorChartColors["Blue"],$colorChartColors["Black"],$colorChartColors["Green"]],
    "WURG"=>[$colorChartColors["White"],$colorChartColors["Blue"],$colorChartColors["Red"],$colorChartColors["Green"]],
    "WBRG"=>[$colorChartColors["White"],$colorChartColors["Black"],$colorChartColors["Red"],$colorChartColors["Green"]],
    "UBRG"=>[$colorChartColors["Blue"],$colorChartColors["Black"],$colorChartColors["Red"],$colorChartColors["Green"]]
];

function createPieChart($result, $colors, $title, $radius = 300){
    echo "<canvas class='pieChart' id='" . $title . "PieChart' width='" . 2*$radius . "' height='" . 2*$radius . "'></canvas>";
    $data = [];
    foreach($result as $row) {
        $data[] = [
            "label"=>$row["label"],
            "total"=> $row["total"],
            "coloring"=> $colors[$row["label"]]
        ];
    }
    return "<script>newPieChart(" . json_encode($data) . ",'" . $title . "')</script>";
}
?>

<div class="stats_page_wrapper">
    <div class="color_stats_wrapper">
        {{--<?= createPieChart($color_stats,$colorChartColors, "Colors");?>--}}
        <table>
            <tr>
                <th>Color</th>
                <th>Times Drafted</th>
                <th>Record</th>
                <th>Total Trophies</th>
                <th>Win Rate</th>
            </tr>
            {{ $color_stats }}
        </table>
    </div>
    <div class="archetype_stats_wrapper">
        {{--<?= createPieChart($archetype_stats,$archetypeChartColors, "Archetypes");?>--}}
        <table>
            <tr>
                <th>Archetype</th>
                <th>Times Drafted</th>
                <th>Record</th>
                <th>Total Trophies</th>
                <th>Win Rate</th>
            </tr>
            {{ $archetype_stats }}
        </table>
    </div>
</div>

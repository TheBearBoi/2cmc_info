<?php

namespace Database\Seeders;

use App\Models\Card;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class cardTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $table->string('oracle_id')->primary();
//        $table->string('name');
//        $table->string('layout');
//        $table->float('cmc');
//        $table->binary('color'); //color is a binary, in wubrg order
        $cards = [
            [
                'oracle_id' => '1',
                'name' => '1',
                'layout' => 'split',
                'cmc' => '0.0',
                'color' => '00000'
            ],
            [
                'oracle_id' => '2',
                'name' => '2',
                'layout' => 'split',
                'cmc' => '0.0',
                'color' => '00000'
            ]
        ];

        foreach($cards as $key => $value) {
            Card::create($value);

        }
    }
}

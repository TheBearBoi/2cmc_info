<?php

use App\Models\Deck;
use App\Models\DeckContent;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $handle = fopen("storage/app/decks_historic.csv", "r");
        if ($handle) {
            while (($line = fgetcsv($handle)) !== false) {
                $deck = new Deck;
                $deck->deck_id = $line[0];
                $deck->deck_name = $line[1];
                $deck->player_id = $line[2];
                $deck->color = $line[3];
                $deck->archetype = $line[4];
                $deck->wins = $line[5];
                $deck->losses = $line[6];
                $deck->draws = $line[7];
                $deck->is_trophy = $line[8] == 'TRUE';

                $deck->save();
            }
        }
        fclose($handle);

        $handle = fopen("storage/app/deck_contents_historic.csv", "r");
        if ($handle) {
            while (($line = fgetcsv($handle)) !== false) {
                $deck_content = new DeckContent;
                $deck_content->deck_id = $line[0];
                echo $line[1];
                $deck_content->oracle_id = DB::table('cards')->where('name', $line[1])->first()->oracle_id;
                $deck_content->quantity = $line[3];
                $deck_content->is_sideboard = $line[2];

                $deck_content->save();
            }
        }
        fclose($handle);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};

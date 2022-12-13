<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('draft_matches', function (Blueprint $table) {
            $table->id('draft_match_id');
            $table->integer('draft_id');
            $table->tinyInteger('round_number');
            $table->integer('player_1_id');
            $table->integer('player_2_id');
            $table->tinyInteger('player_1_wins');
            $table->tinyInteger('player_2_wins');
            $table->tinyInteger('draws');
            $table->boolean('is_submitted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('draft_matches');
    }
};

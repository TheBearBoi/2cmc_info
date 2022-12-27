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
            $table->integer('seat_1_id');
            $table->integer('seat_2_id')->nullable();
            $table->tinyInteger('player_1_wins')->default(0);
            $table->tinyInteger('player_2_wins')->default(0);
            $table->tinyInteger('draws')->default(0);
            $table->boolean('is_submitted')->default(0);
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

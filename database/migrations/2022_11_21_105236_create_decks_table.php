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
        Schema::create('decks', function (Blueprint $table) {
            $table->id('deck_id');
            $table->string('deck_name');
            $table->integer('player_id');
            $table->string('color');
            $table->string('archetype');
            $table->tinyInteger('wins')->default(0);
            $table->tinyInteger('losses')->default(0);
            $table->tinyInteger('draws')->default(0);
            $table->boolean('is_trophy')->default(false);
            $table->float('win_rate')->generatedAs('100 * wins / (wins + losses + draws)'); //TODO Test generated collumn
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('decks');
    }
};

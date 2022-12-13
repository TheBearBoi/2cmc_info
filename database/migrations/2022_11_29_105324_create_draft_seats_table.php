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
        Schema::create('draft_seats', function (Blueprint $table) {
            $table->id();
            $table->integer('draft_id')->nullable();
            $table->tinyInteger('seat_id')->nullable();
            $table->integer('player_id');
            $table->tinyInteger('team_number')->nullable();
            $table->integer('deck_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('draft_seats');
    }
};

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
        Schema::create('card_rulings', function (Blueprint $table) {
            $table->string('oracle_id');
            $table->id('ruling_id');
            $table->date('ruling_date');
            $table->text('ruling_text');
            $table->unique(["oracle_id","ruling_text"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('card_rulings');
    }
};

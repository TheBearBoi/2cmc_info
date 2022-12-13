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
        Schema::create('deck_contents', function (Blueprint $table) {
            $table->id('deck_content_id');
            $table->integer('deck_id');
            $table->string('oracle_id');
            $table->tinyInteger('quantity');
            $table->boolean('is_sideboard');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deck_contents');
    }
};

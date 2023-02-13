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
        Schema::create('card_faces', function (Blueprint $table) {
            $table->id('face_id');
            $table->string('oracle_id');
            $table->integer('face_number')->default(0);
            $table->string('name');
            $table->string('mana_cost');
            $table->string('type_line');
            $table->text('oracle_text');
            $table->string('power')->nullable();
            $table->string('toughness')->nullable();
            $table->string('small_image_uri');
            $table->string('normal_image_uri');
            $table->string('large_image_uri');
            $table->string('png_uri');
            $table->string('art_crop_uri');
            $table->string('border_crop_uri');
            $table->binary('color')->nullable();
            $table->unique(["oracle_id","face_number"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('card_faces');
    }
};

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
        Schema::dropIfExists('cube_list');
        Schema::create('cube_list', function (Blueprint $table) {
            $table->unsignedSmallInteger('sleeve_id')->primary();
            $table->string('oracle_id');
            $table->unsignedSmallInteger('layout_key_1')->nullable();
            $table->unsignedSmallInteger('layout_key_2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cube_list');
    }
};

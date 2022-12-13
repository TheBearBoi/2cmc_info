<?php

use App\Models\Card;
use App\Models\CardFace;
use App\Models\CardRuling;
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
        Schema::dropIfExists('cards');
        Schema::create('cards', function (Blueprint $table) {
            //card db: oracle id, name, layout, cmc, color as binary
            $table->string('oracle_id')->primary();
            $table->string('name'); // have // in name for split cards
            $table->string('layout');
            $table->double('cmc',8,1);
            $table->boolean('is_basic');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cards');
    }
};

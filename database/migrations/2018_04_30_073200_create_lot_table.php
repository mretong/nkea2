<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lot', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_mukim');
            $table->string('no_lot');
            $table->integer('status_tanah');
            $table->string('no_hakmilik');
            $table->integer('id_blok');
            $table->integer('id_pakej');
            $table->timestamps()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lot');
    }
}

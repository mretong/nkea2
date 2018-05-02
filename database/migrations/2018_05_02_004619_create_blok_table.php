<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlokTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blok', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_fasa');
            $table->integer('id_lokaliti');
            $table->string('nama');
            $table->double('jum_lot_total',8,2);
            $table->double('anggaran_kos',10,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blok');
    }
}

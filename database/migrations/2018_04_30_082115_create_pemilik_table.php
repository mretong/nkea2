<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemilikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemilik', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_lot');
            $table->integer('status_milikan_id');
            $table->string('nama');
            $table->string('no_kp');
            $table->integer('kategori_pampasan_id');
            $table->string('pecahan');
            $table->date('tarikh_h');
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
        Schema::dropIfExists('pemilik');
    }
}

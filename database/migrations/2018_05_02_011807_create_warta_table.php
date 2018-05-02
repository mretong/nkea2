<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWartaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_blok');
            $table->date('tarikh_warta');
            $table->date('tarikh_luput');
            $table->string('jilid_warta');
            $table->integer('no_warta');
            $table->string('rujukan');
            $table->string('catatan');
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
        Schema::dropIfExists('warta');
    }
}

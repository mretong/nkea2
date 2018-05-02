<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerbicaraanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perbicaraan', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tarikh_1');
            $table->date('tarikh_2');
            $table->date('tarikh_3');
            $table->date('tarikh_4');
            $table->date('tarikh_5');
            $table->integer('id_daerah');
            $table->integer('id_mukim');
            $table->integer('id_blok');
            $table->integer('id_lot');
            $table->integer('id_staff');
            $table->integer('id_status');
            $table->integer('bil_pemilik');
            $table->double('luas_ambil',8,4);
            $table->double('harga_tanah',10,2);
            $table->integer('wakil_mada');
            $table->integer('wakil_jps');
            $table->string('bilangan_bicara');
            $table->double('pampasan',12,2);
            $table->double('kos_lain',12,2);
            $table->string('catatan');
            $table->string('jajaran');
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
        Schema::dropIfExists('perbicaraan');
    }
}

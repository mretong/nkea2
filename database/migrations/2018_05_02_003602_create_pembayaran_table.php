<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pemilik');
            $table->integer('id_bank');
            $table->integer('id_perbicaraan');
            $table->string('no_akaun');
            $table->integer('kaedah_bayaran');
            $table->string('no_baucer');
            $table->date('tarikh_baucer');
            $table->string('no_cek');
            $table->date('tarikh_cek');
            $table->string('rujukan');
            $table->string('catatan');
            $table->integer('id_status');
            $table->string('rujukan_denda');
            $table->date('tarikh_denda');
            $table->string('attachment');
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
        Schema::dropIfExists('pembayaran');
    }
}

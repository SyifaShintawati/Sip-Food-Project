<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_customer');
            $table->foreign('id_customer')->references('id')->on('customer')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->unsignedInteger('id_makanan');
            $table->foreign('id_makanan')->references('id')->on('makanan')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->unsignedInteger('id_minuman');
            $table->foreign('id_minuman')->references('id')->on('minuman')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->integer('jumlah_makanan');
            $table->integer('jumlah_minuman');
            $table->integer('total_harga');
            $table->date('tgl_pesan');
            $table->date('tgl_kirim');
            $table->string('alamat_tujuan');
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
        Schema::dropIfExists('transaksi');
    }
}

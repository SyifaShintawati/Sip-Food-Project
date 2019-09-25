<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMinumanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('minuman', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_supplier');
            $table->foreign('id_supplier')->references('id')->on('supplier')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->string('nama_minuman');
            $table->integer('harga_minuman');
            $table->integer('stok_minuman');
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
        Schema::dropIfExists('minuman');
    }
}

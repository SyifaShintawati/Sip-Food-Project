<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMakananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('makanan', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_supplier');
            $table->foreign('id_supplier')->references('id')->on('supplier')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->string('nama_makanan');
            $table->integer('harga_makanan');
            $table->integer('stok_makanan');
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
        Schema::dropIfExists('makanan');
    }
}

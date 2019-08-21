<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("nama");
            $table->unsignedBigInteger("p_id")->nullable();
            $table->unsignedBigInteger("hak_akses_id");
            $table->string("ikon")->nullable();
            $table->string("url")->nullable();
            $table->string("segment")->nullable();
            $table->string("tipe")->nullable();
            $table->string("urutan")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu');
    }
}

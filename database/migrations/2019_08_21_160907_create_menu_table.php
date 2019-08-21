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
            $table->integer("hak_akses_id")->unsigned()->nullable();
            $table->string("ikon")->nullable();
            $table->string("url")->nullable();
            $table->string("segment")->nullable();
            $table->string("tipe")->nullable();
            $table->string("urutan")->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('hak_akses_id')->references('id')->on('permission')
                ->onUpdate('cascade')->onDelete('set null');
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

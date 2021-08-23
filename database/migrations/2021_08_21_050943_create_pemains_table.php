<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemains', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('tinggi')->nullable();
            $table->integer('berat')->nullable();
            $table->string('posisi')->nullable();
            $table->integer('nomor_punggung')->nullable();
            $table->unsignedBigInteger('tim_id');
            $table->foreign('tim_id')->references('id')->on('tims')->onDelete('cascade');
            $table->date('deleted_at')->nullable();
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
        Schema::dropIfExists('pemains');
    }
}

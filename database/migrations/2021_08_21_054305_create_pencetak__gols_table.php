<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePencetakGolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pencetak__gols', function (Blueprint $table) {
            $table->id();
            $table->string('waktu_gol')->nullable();
            $table->unsignedBigInteger('pencetak_gol_id');
            $table->unsignedBigInteger('hasil_id');
            $table->foreign('hasil_id')->references('id')->on('hasils')->onDelete('cascade');
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
        Schema::dropIfExists('pencetak__gols');
    }
}

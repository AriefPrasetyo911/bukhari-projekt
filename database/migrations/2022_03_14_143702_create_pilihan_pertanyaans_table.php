<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePilihanPertanyaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pilihan_pertanyaans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pertanyaan_id')->unsigned()->nullable();
            $table->string('pilihan');
            $table->tinyInteger('benar')->nullable()->default(0);
            $table->integer('score_soal')->nullable();
            $table->timestamps();

            $table->index('pertanyaan_id');
            $table->foreign('pertanyaan_id')->references('id')->on('pertanyaans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pilihan_pertanyaans');
    }
}

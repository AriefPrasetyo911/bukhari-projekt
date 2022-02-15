<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkorPilihanTKPSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skor_pilihan_TKPs', function (Blueprint $table) {
            $table->id();
            $table->integer('id_soal');
            $table->integer('id_paket');
            $table->string('skor_pilihan_a');
            $table->string('skor_pilihan_b');
            $table->string('skor_pilihan_c');
            $table->string('skor_pilihan_d');
            $table->string('skor_pilihan_e');
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
        Schema::dropIfExists('skor_pilihan_TKPs');
    }
}

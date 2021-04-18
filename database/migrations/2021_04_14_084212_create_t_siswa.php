<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_siswa', function (Blueprint $table) {
            $table->string('nis', 10)->primary();
            $table->string('nisn', 15);
            $table->string('nama_siswa', 50);
            $table->integer('id_kelas');
            $table->foreign('id_kelas')->references('id_kelas')->on('t_kelas')->onDelete(
                'cascade');
            $table->text('alamat');
            $table->string('no_tlp', 15);
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
        Schema::dropIfExists('t_siswa');
    }
}

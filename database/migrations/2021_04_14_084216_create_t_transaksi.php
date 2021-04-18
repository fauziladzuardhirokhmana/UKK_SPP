<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_transaksi', function (Blueprint $table) {
            $table->integer('no_struk', 5);
            $table->string('nip', 10);
            $table->string('nis', 10);
            $table->integer('id_spp');
            $table->date('tanggal_bayar');
            $table->string('file', 100);
            $table->timestamps();

            $table->foreign('nip')->references('nip')->on('t_petugas')->onDelete(
                'cascade')->onUpdate('cascade');
            $table->foreign('nis')->references('nis')->on('t_siswa')->onDelete(
                'cascade')->onUpdate('cascade');
            $table->foreign('id_spp')->references('id_spp')->on('t_spp')->onDelete(
                'cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_transaksi');
    }
}

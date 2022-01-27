<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailSiswaAyahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_siswa_ayah', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ayah')->nullable();
            $table->string('nik')->nullable();
            $table->string('tgl_lahir')->nullable();
            $table->enum('agama', ['islam', 'kristen', 'katholik', 'hindu', 'budha'])->nullable();
            $table->string('alamat')->nullable();
            $table->enum('pendidikan', ['sd', 'smp', 'sma', 'd1', 'd2', 'd3', 'd4/s1', 's2', 's3'])->nullable();
            $table->enum('pekerjaan', ['petani', 'wirausaha', 'kontrak', 'honorer', 'pns', 'dokter', 'nelayan'])->nullable();
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
        Schema::dropIfExists('detail_siswa_ayah');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailGuru extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_guru', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_lahir')->nullable();
            $table->enum('jns_kelamin', ['pria', 'wanite'])->nullable();
            $table->enum('agama', ['islam', 'kristen', 'katholik', 'hindu', 'budha'])->nullable();
            $table->string('alamat')->nullable();
            $table->enum('pendidikan', ['sd', 'smp', 'sma', 'd1', 'd2', 'd3', 'd4/s1', 's2', 's3'])->nullable();
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('detail_guru');
    }
}

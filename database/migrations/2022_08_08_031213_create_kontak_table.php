<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontak_', function (Blueprint $table) {
            $table->id();
            $table ->bigInteger('id_siswa')->unsigned();
            $table->foreign('id_siswa')->references('id')->on('siswa')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table ->bigInteger('id_jenis')->unsigned();
            $table->foreign('id_jenis')->references('id')->on('jenis_kontak')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table -> char('desc_kontak');
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
        Schema::dropIfExists('kontak_');
    }
};

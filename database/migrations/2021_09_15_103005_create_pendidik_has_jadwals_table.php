<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendidikHasJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendidik_has_jadwal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pendidik_id');
            $table->foreign('pendidik_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('hari', ['1Senin', '2Selasa', '3Rabu', '4Kamis', '5Jumat', '6Sabtu', '7Minggu']);
            $table->time('pukul_mulai');
            $table->time('pukul_selesai');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendidik_has_jadwal');
    }
}

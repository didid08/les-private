<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembelajaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelajaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pembayaran_selesai_id');
            $table->foreign('pembayaran_selesai_id')->references('id')->on('pembayaran_selesai')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('pendidik_id')->nullable();
            $table->foreign('pendidik_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->date('waktu_mulai');
            $table->date('waktu_selesai');
            $table->date('absensi');
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
        Schema::dropIfExists('pembelajaran');
    }
}

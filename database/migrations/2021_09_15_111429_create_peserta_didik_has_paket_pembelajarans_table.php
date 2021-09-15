<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertaDidikHasPaketPembelajaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peserta_didik_has_paket_pembelajaran', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('peserta_didik_id');
            $table->foreign('peserta_didik_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('paket_pembelajaran_id');
            $table->foreign('paket_pembelajaran_id')->references('id')->on('paket_pembelajaran')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('pembelian_paket_pembelajaran_id');
            $table->foreign('pembelian_paket_pembelajaran_id')->references('id')->on('pembelian_paket_pembelajaran')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('peserta_didik_has_paket_pembelajaran');
    }
}

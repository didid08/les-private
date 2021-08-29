<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaketPembelajaranRelationshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paket_pembelajaran_relationships', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paket_pembelajaran_id_1');
            $table->foreign('paket_pembelajaran_id_1')->references('id')->on('paket_pembelajaran');
            $table->unsignedBigInteger('paket_pembelajaran_id_2');
            $table->foreign('paket_pembelajaran_id_2')->references('id')->on('paket_pembelajaran');
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
        Schema::dropIfExists('paket_pembelajaran_relationships');
    }
}

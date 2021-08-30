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
            $table->unsignedBigInteger('dari');
            $table->foreign('dari')->references('id')->on('paket_pembelajaran')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('ke');
            $table->foreign('ke')->references('id')->on('paket_pembelajaran')->onUpdate('cascade')->onDelete('cascade');
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

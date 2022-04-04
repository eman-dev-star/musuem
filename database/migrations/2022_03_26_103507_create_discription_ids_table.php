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
        Schema::create('discription_ids', function (Blueprint $table) {
            $table->id();
            $table->string('text');
            $table->string('audio');
            $table->string('video');
            $table->unsignedBigInteger('lang_id')->nullable();
            $table->foreign('lang_id')->references('id')->on('languages')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('discription_id')->nullable();
            $table->foreign('discription_id')->references('id')->on('discriptions')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('discription_ids');
    }
};

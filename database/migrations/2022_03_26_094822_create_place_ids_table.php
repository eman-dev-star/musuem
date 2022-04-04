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
        Schema::create('place_ids', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('lang_id')->nullable();
            $table->foreign('lang_id')->references('id')->on('languages')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('place_id')->nullable();
            $table->foreign('place_id')->references('id')->on('places')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('place_ids');
    }
};

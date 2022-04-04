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
        Schema::create('sculpture_ids', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('lang_id')->nullable();
            $table->foreign('lang_id')->references('id')->on('languages')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('sculpture_id')->nullable();
            $table->foreign('sculpture_id')->references('id')->on('sculptures')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('sculpture_ids');
    }
};

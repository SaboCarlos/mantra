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
        Schema::create('imobiliario_imagem', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('imobiliario_id');
            $table->string('image');
            $table->foreign('imobiliario_id')->references('id')->on('imobiliario')->onDelete('cascade');
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
        Schema::dropIfExists('imobiliario_imagem');
    }
};

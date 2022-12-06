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
        Schema::create('imobiliario', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categoria_id');
            
            $table->string('nome');
            $table->mediumText('p_discricao')->nullable();
            $table->longText('disc')->nullable();
            $table->string('local');
            $table->Integer('numero');
            $table->Integer('quartos');
            $table->Integer('casaBanho');
            $table->double('montante',10,2);
            $table->tinyInteger('estado')->default('0')->comment('0=A venda,1=Vendido');

            $table->foreign('categoria_id')->references('id')->on('categoria')->onDelete('cascade');
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
        Schema::dropIfExists('imobiliario');
    }
};

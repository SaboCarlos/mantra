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
        Schema::create('produto', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categoria_id');

            $table->string('nome');
            $table->mediumText('pequena_discricao')->nullable( );
            $table->longText('discricao');

            $table->string('localizacao'); 
            $table->Integer('Preco');
            $table->Integer('numero');
            $table->Integer('quartos');
            $table->Integer('casaBanho');
            $table->tinyInteger('estado')->default('0')->comment('0=A venda,1=Vendido');
            $table->tinyInteger('destaque')->default('0')->comment('0=nao ,1=Destaque');

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
        Schema::dropIfExists('produto');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('produto', function (Blueprint $table) {
            $table->increments('UniqueID');
            $table->string('nome', 50);
            $table->integer('fornecedor')->unsigned();
            $table->string('descricao', 100);
            $table->char('categoria', 10);
            $table->date('dataCompra');
            $table->integer('qtdProduto');
            $table->decimal('preco', 10, 2);
            $table->string('unidadeMedida', 20)->nullable();
            $table->timestamps();

            $table->foreign('fornecedor')->references('UniqueID')->on('fornecedor');
        });
        Schema::create('orcamento', function (Blueprint $table) {
            $table->increments('UniqueID');
            $table->integer('cliente')->unsigned();
            $table->integer('produto')->unsigned()->nullable();
            $table->char('formaPagamento', 8);
            $table->decimal('valor', 10, 2);
            $table->date('dataPedido');
            $table->integer('qtdProduto')->nullable();
            $table->integer('servico')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('cliente')->references('UniqueID')->on('cliente');
            $table->foreign('produto')->references('UniqueID')->on('produto');
        });

    }

    public function down()
    {
        Schema::dropIfExists('orcamento');
    }
};

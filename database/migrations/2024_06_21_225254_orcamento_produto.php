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
            $table->id();
            $table->string('nome', 50);
            $table->unsignedBigInteger('fornecedor')->unsigned()->nullable();
            $table->string('descricao', 100);
            $table->char('categoria', 10);
            $table->date('dataCompra');
            $table->unsignedBigInteger('qtdProduto');
            $table->decimal('preco', 10, 2);
            $table->string('unidadeMedida', 20)->nullable();
            $table->timestamps();

            $table->foreign('fornecedor')->references('id')->on('fornecedor');
        });
        Schema::create('orcamento', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente')->nullable();
            $table->unsignedBigInteger('produto')->nullable();
            $table->char('formaPagamento', 8);
            $table->decimal('valor', 10, 2);
            $table->date('dataPedido');
            $table->integer('qtdProduto')->nullable();
            $table->integer('servico')->nullable();
            $table->timestamps();

            $table->foreign('cliente')->references('id')->on('cliente');
            $table->foreign('produto')->references('id')->on('produto');
        });

    }

    public function down()
    {
        Schema::dropIfExists('orcamento');
    }
};

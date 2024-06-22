<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('endereco', function (Blueprint $table) {
            $table->increments('UniqueID');
            $table->string('rua', 50);
            $table->string('numero', 20);
            $table->char('estado', 2);
            $table->string('cidade', 50);
            $table->string('complemento',255);
            $table->timestamps();
        });
        Schema::create('cliente', function (Blueprint $table) {
            $table->increments('UniqueID');
            $table->string('nome', 60);
            $table->string('sexo', 10);
            $table->date('dataNascimento');
            $table->char('cpf', 11);
            $table->integer('endereco')->unsigned();
            $table->string('telefone', 14);
            $table->string('email', 30)->nullable();
            $table->enum('status', ['ativo', 'inativo'])->default('ativo')->nullable();
            $table->timestamps();

            $table->foreign('endereco')->references('UniqueID')->on('endereco');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente');
        Schema::dropIfExists('endereco');
    }
};

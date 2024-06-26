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
        Schema::create('funcionario', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100)->nullable();
            $table->date('dataNascimento')->nullable();
            $table->string('cpf', 20)->unique()->nullable();
            $table->unsignedBigInteger('endereco')->nullable();
            $table->string('telefone', 15)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('funcao', 100)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('funcionario');
    }
};

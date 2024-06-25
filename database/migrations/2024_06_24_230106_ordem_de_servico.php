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
        Schema::create('ordem_de_servico', function(Blueprint $table){
            $table->id();
            $table->date('dataServico')->nullable();
            $table->date('prazo')->nullable();
            $table->float('valor')->nullable();
            $table->unsignedInteger('servico')->nullable();
            $table->unsignedInteger('funcionario')->nullable();
            $table->unsignedInteger('cliente')->nullable();
            $table->unsignedInteger('produto')->nullable();
            $table->foreign('funcionario')->references('id')->on('funcionario');
            $table->foreign('servico')->references('id')->on('servico');
            $table->foreign('cliente')->references('id')->on('cliente');
            $table->foreign('produto')->references('id')->on('produto');
            $table->timestamps(); 
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

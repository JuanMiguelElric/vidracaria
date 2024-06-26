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
        Schema::create('fornecedor', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 60);
            $table->char('cnpj', 26);
            $table->unsignedBigInteger('endereco')->nullable();
            $table->string('telefone', 14);
            $table->string('email', 30)->nullable();
            $table->timestamps();

            $table->foreign('endereco')->references('id')->on('endereco');
        });
    }

    public function down()
    {
        Schema::dropIfExists('fornecedor');
    }
};

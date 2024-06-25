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
        Schema::table('cliente', function (Blueprint $table) {
            $table->boolean('ativo')->default(0)->nullable();
        });
        Schema::table('ordem_de_servico', function (Blueprint $table) {
            $table->boolean('ativo')->default(0)->nullable();
        });
        Schema::table('servico', function (Blueprint $table) {
            $table->boolean('ativo')->default(0)->nullable();
        });
        Schema::table('produto', function (Blueprint $table) {
            $table->boolean('ativo')->default(0)->nullable();
        });
        Schema::table('orcamento', function (Blueprint $table) {
            $table->boolean('ativo')->default(0)->nullable();
        });
        Schema::table('funcionario', function (Blueprint $table) {
            $table->boolean('ativo')->default(0)->nullable();
        });
        Schema::table('fornecedor', function (Blueprint $table) {
            $table->boolean('ativo')->default(0)->nullable();
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

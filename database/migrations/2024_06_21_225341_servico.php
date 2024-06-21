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
        Schema::create('servico', function (Blueprint $table) {
            $table->increments('UniqueID');
            $table->string('nome', 100)->nullable();
            $table->string('descricao', 255)->nullable();
            $table->decimal('valor', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('servico');
    }
};

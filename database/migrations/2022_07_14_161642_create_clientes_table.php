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
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 255);
            $table->string('cpf', 14);
            $table->string('telefone', 255);
            $table->string('endereco', 255);
            $table->string('profissao', 255);
            $table->decimal('renda', $precision = 8, $scale = 2);
            $table->string('email', 255);
            $table->string('senha', 255);
            $table->string('tipo_usuario', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
};

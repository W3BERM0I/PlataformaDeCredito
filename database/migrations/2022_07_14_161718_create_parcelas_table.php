<?php

use App\Models\Emprestimo;
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
        Schema::create('parcelas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('valor', $precision = 8, $scale = 2);
            $table->integer('numero');
            $table->date('data_vencimento');
            $table->date('data_pagamento')->nullable();
            $table->decimal('multa', $precision = 8, $scale = 2)->nullable();
            $table->string('status', 20);
            $table->foreignIdFor(Emprestimo::class)->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parcelas');
    }
};

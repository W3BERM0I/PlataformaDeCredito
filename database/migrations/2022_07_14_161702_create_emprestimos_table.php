<?php

use App\Models\Cliente;
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
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->id();
            $table->decimal('valor', $precision = 8, $scale = 2);
            $table->decimal('taxa_juros', $precision = 8, $scale = 2);
            $table->date('data_solicitacao');
            $table->date('data_quitacao')->nullable();
            $table->decimal('valor_pago', $precision = 12, $scale = 2);
            $table->string('status', 20);
            // $table->foreignIdFor(Cliente::class)->constrained()->onDelete('cascade');
            $table->bigInteger('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('parcelas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emprestimos');
    }
};

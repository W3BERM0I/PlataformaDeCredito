<?php

namespace App\Repositories;

use App\Models\Parcela;
use Illuminate\Http\Request;

interface ParcelaRepository
{
  public function buscaParcelasPorEmprestimo(int $id);
  public function addParcelasPorEmprestimo(int $id): void;
  public function pagarParcela(Request $request);
  public function analizaParcela(Parcela $parcela);
}

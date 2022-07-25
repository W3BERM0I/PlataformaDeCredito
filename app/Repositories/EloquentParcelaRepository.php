<?php

namespace App\Repositories;

use App\Models\Emprestimo;
use App\Models\Parcela;
use DateInterval;
use DateTimeImmutable;
use DomainException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EloquentParcelaRepository implements ParcelaRepository
{
  public function addParcelasPorEmprestimo(int $id): void
  {
    DB::beginTransaction();
    $emprestimo = Emprestimo::whereId($id)->first();
    $valor = $emprestimo->valor_pago / $emprestimo->parcelas;
    $data_vencimento = new DateTimeImmutable();
    for ($i = 1; $i <= $emprestimo->parcelas; $i++) {
      $data_vencimento = $data_vencimento->add(new DateInterval('P1M'));
      parcela::create([
        'valor' => $valor,
        'numero' => $i,
        'data_vencimento' => $data_vencimento,
        'status' => 'ABERTA',
        'emprestimo_id' => $id,
      ]);
    }
    DB::commit();
  }

  public function pagarParcela(Request $request)
  {
    $parcela = Parcela::whereId($request->id);
    try {
      $this->analizaParcela($parcela);
    } catch (DomainException $e) {
      echo $e->getMessage();
      throw new DomainException();
    }
    $parcela->update(['status' => 'PAGA', 'data_pagamento' => new DateTimeImmutable()]);
  }

  public function analizaParcela(Parcela $parcela)
  {
    if ($parcela->data_vencimento < new DateTimeImmutable())
      $parcela->update(['multa' => '2', 'valor' => ($parcela->valor * 1.02)]);

    $parcelas = $this->buscaParcelasPorEmprestimo($parcela->emprestimo_id);
    foreach ($parcelas as $par) {
      if ($par->numero == ($parcela->numero - 1))
        $parcelaAnterior = $par;
    }
    if ($parcelaAnterior->status !== 'PAGA')
      throw new DomainException();
    return $parcela;
  }

  public function buscaParcelasPorEmprestimo(int $id)
  {
    return Parcela::with('emprestimo')->whereEmprestimo_id($id)->get();
  }
}

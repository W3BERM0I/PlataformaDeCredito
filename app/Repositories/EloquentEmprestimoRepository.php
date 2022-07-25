<?php

namespace App\Repositories;

use App\Models\Emprestimo;
use App\Models\Parcela;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EloquentEmprestimoRepository implements EmprestimoRepository
{
  public function add(Request $request): Emprestimo
  {
    DB::beginTransaction();
    $valor = $request->valor;
    $qtdParcelas = $request->qtdParcelas;
    $taxaJuros = 10;
    $id = (int)(session('id'));
    $valorTotal = (($valor * ($taxaJuros / 100)) * $qtdParcelas) + $valor;
    $emprestimo = Emprestimo::create([
      'valor' => $valor,
      'taxa_juros' => $taxaJuros,
      'data_solicitacao' => date('Y/m/d'),
      'status' => 'SOLICITADO',
      'cliente_id' => $id,
      'parcelas' => $qtdParcelas,
      'valor_pago' => $valorTotal
    ]);
    DB::commit();
    return $emprestimo;
  }

  public function listaEmprestimos()
  {
    return (Emprestimo::whereCliente_id(session('id'))->get());
  }

  public function buscaClientesEmprestimosSolicitados(): array
  {
    $emprestimos = Emprestimo::where(['status' => 'SOLICITADO']);
    $clientes_id = [];
    foreach ($emprestimos as $emprestimo) {
      $clientes_id[] = $emprestimo->cliente_Id;
    }
    return $clientes_id;
  }

  public function buscaEmprestimosSolicitados()
  {
    return Emprestimo::with('cliente')->whereStatus('SOLICITADO')->get();
  }

  public function buscaEmprestimoPorId(int $id)
  {
    return Emprestimo::with('cliente')->whereId($id)->first();
  }

  public function aprovaEmprestimo(int $id, float $juros): void
  {
    $emprestimo = Emprestimo::whereId($id)->first();
    $valorTotal = (($emprestimo->valor * ($juros / 100)) * $emprestimo->parcelas) + $emprestimo->valor;
    $emprestimo->update(['status' => 'APROVADO', 'taxa_juros' => $juros, 'valor_pago' => $valorTotal]);
  }

  public function rejeitaEmprestimo(int $id): void
  {
    Emprestimo::whereId($id)->update(['status' => 'REJEITADO']);
  }

  public function cancelaEmprestimo(int $id): void
  {
    Emprestimo::whereId($id)->update(['status' => 'CANCELADO']);
  }

  public function destroy(int $id)
  {
    return Emprestimo::whereId($id)->delete();
  }
}

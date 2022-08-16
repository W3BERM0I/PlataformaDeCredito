<?php

namespace App\Repositories;

use App\Models\Emprestimo;
use Illuminate\Support\Facades\DB;

class EloquentEmprestimoRepository implements EmprestimoRepository
{
  public function add(array $request): Emprestimo
  {
    $valor = (preg_replace("/[^0-9]/", "", $request['valor'])) / 100;
    $qtdParcelas = $request['qtdParcelas'];
    $taxaJuros = 10;
    $id = $request['clienteId'];
    $valorTotal = (($valor * ($taxaJuros / 100)) * $qtdParcelas) + $valor;
    DB::beginTransaction();
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

  public function all()
  {
    return Emprestimo::all();
  }

  public function listaEmprestimos()
  {
    return (Emprestimo::whereCliente_id(session('id'))->get());
  }

  public function listaEmprestimosIdCliente(int $i)
  {
    return (Emprestimo::whereCliente_id($i)->get());
  }

  public function FiltroDeEmprestimo(mixed $filtro)
  {
    return  Emprestimo::where("id", "{$filtro}")->paginate();
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
    $emprestimos = Emprestimo::with('cliente')->whereStatus('SOLICITADO')->get();
    foreach ($emprestimos as $emprestimo) {
      $emprestimo->data_solicitacao = $this->inverteData($emprestimo->data_solicitacao);
    }
    return $emprestimos;
  }

  public function buscaEmprestimoPorId(int $id)
  {
    $emprestimo = Emprestimo::with('cliente')->whereId($id)->first();
    $emprestimo->data_solicitacao = $this->inverteData($emprestimo->data_solicitacao);
    return $emprestimo;
  }

  public function inverteData($data)
  {
    $data = explode("-", $data);
    $data = $data[2] . "-" . $data[1] . "-" . $data[0];
    return $data;
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

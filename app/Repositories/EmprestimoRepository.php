<?php

namespace App\Repositories;

use App\Models\Emprestimo;
use Illuminate\Http\Request;

interface EmprestimoRepository
{
  public function add(array $request): Emprestimo;
  public function all();
  public function listaEmprestimos();
  public function listaEmprestimosIdCliente(int $i);
  public function FiltroDeEmprestimo(mixed $filtro);
  public function buscaClientesEmprestimosSolicitados(): array;
  public function buscaEmprestimosSolicitados();
  public function buscaEmprestimoPorId(int $id);
  public function aprovaEmprestimo(int $id, float $juros): void;
  public function rejeitaEmprestimo(int $id): void;
  public function cancelaEmprestimo(int $id): void;
  public function destroy(int $id);
}

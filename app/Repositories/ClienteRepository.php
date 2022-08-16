<?php

namespace App\Repositories;

use App\Models\Cliente;
use Illuminate\Http\Request;

interface ClienteRepository
{
  public function add(Request $request): Cliente;
  public function all();
  public function atualizarTipoUsuario(int $id, string $tipo): void;
  public function buscaClientePorId(int $id);
}

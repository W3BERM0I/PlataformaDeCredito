<?php

namespace App\Repositories;

use App\Models\Cliente;
use Illuminate\Http\Request;

interface ClienteRepository
{
  public function add(Request $request): Cliente;
  public function alteraUsuario(Request $request): void;
  public function all();
  public function despromoverUser(int $id): void;
  public function promoverUser(int $id): void;
  public function buscaClientePorId(int $id);
}

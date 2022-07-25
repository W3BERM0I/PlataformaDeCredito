<?php

namespace App\Repositories;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EloquentClienteRepository implements ClienteRepository
{
  public function add(Request $request): Cliente
  {
    DB::beginTransaction();
    $nome = $request->input('nome');
    $cpf = $request->input('cpf');
    $renda = $request->input('renda');
    $renda = preg_replace('/[\D]/', '', $renda);
    //$renda = floatval($renda) / 100;
    $telefone = $request->input('telefone');
    $endereco = $request->input('endereco');
    $profissao = $request->input('profissao');
    $email = $request->input('email');
    $senha = $request->input('senha');

    $cliente = new Cliente();
    $cliente->nome = $nome;
    $cliente->cpf = $cpf;
    $cliente->renda = $renda;
    $cliente->telefone = $telefone;
    $cliente->endereco = $endereco;
    $cliente->profissao = $profissao;
    $cliente->email = $email;
    $cliente->password =  Hash::make($senha);
    //password_hash($senha, PASSWORD_ARGON2I);
    $cliente->tipo_usuario = 'COMUN';
    $cliente->save();
    DB::commit();
    return $cliente;
  }

  public function alteraUsuario(Request $request): void
  {
    dd($request);
  }

  public function all()
  {
    return Cliente::all();
  }

  public function buscaClientePorId(int $id)
  {
    return Cliente::whereId($id)->first();
  }

  public function promoverUser(int $id): void
  {
    Cliente::updateOrCreate(['id' => $id], ['tipo_usuario' => 'GESTOR']);
  }

  public function despromoverUser(int $id): void
  {
    dd($id);
    Cliente::whereId($id)->update(['tipo_usuario' => 'COMUN']);
  }
}

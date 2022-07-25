<link rel="stylesheet" href="/assets/css/diretor.css">
@extends('layouts.main')
@section('title', 'Solicitar Emprestimo')

@section('content')
<main>
  <div class="lista_emprestimos">
    <div class="titulo">
      <h1>Usuarios</h1>
    </div>
    <table class="table table-borderless">
      <thead class="tbhead">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">nome</th>
          <th scope="col">Renda</th>
          <th scope="col">CPF</th>
          <th scope="col">STATUS</th>
          <th scope="col">Atualizar status para</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($usuarios as $user)
        <tr>
          <th scope="row">{{$user->id}}</th>
          <td>{{$user->nome}}</td>
          <td>R$ {{number_format($user->renda, 2, ',', '.')}}</td>
          <td>{{$user->cpf}}</td>
          <td>{{$user->tipo_usuario}}</td>
          <td>
            <form action="{{route('diretor.promover') }}" method="POST">
              @csrf
              @method('PUT')
              <div class="form-gestor">
                <select class="form-select" name="tipo_usuario" aria-label="Default select example" id="tipo_usuario" required>
                  <option value="COMUN">Comun</option>
                  <option value="GESTOR">Gestor</option>
                  <option value="DIRETOR">Diretor</option>
                </select>
                <input type="text" name="id" style="display: none;" value="{{$user->id}}">
                <button class="btn btn-success" type="submit">Atualizar</button>
              </div>
            </form>
          </td>
          @endforeach
          </form>
      </tbody>
    </table>
  </div>
</main>
@endsection
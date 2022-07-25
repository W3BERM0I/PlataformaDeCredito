<link rel="stylesheet" href="/assets/css/gestor.css">
@extends('layouts.main')
@section('title', 'Solicitar Emprestimo')

@section('content')
<main>
  <div class="lista_emprestimos">
    <div class="titulo">
      <h1>Emprestimos solicitados</h1>
    </div>

    <table class="table table-borderless">
      <thead class="tbhead">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">valor</th>
          <th scope="col">Parcelas</th>
          <th scope="col">Taxa de juros</th>
          <th scope="col">STATUS</th>
          <th scope="col">Nome do Cliente</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($emprestimos as $emprestimo)
        <tr>
          <th scope="row">{{$emprestimo->id}}</th>
          <td>R$ {{number_format($emprestimo->valor, 2, ',', '.')}}</td>
          <td>{{$emprestimo->parcelas}}</td>
          <td>{{$emprestimo->taxa_juros}}</td>
          <td>{{$emprestimo->status}}</td>
          <td>{{$emprestimo->cliente->nome}}</td>

          <td>
            <a href="{{ route('gestor.show', $emprestimo->id) }}" class="btn btn-secondary bo">Saiba mais</a>
          </td>
        </tr>
        @endforeach
        </form>
      </tbody>
    </table>
  </div>
</main>
@endsection
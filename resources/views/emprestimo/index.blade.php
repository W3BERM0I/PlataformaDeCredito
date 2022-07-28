  <link rel="stylesheet" href="/assets/css/listar_emprestimo.css">

  @extends('layouts.main')
  @section('title', 'Meus emprestimos')

  @section('content')
  <main>
    <div class="lista_emprestimos">
      <div class="titulo">
        <h1>Lista de emprestimos</h1>
      </div>
      <table class="table table-borderless">
        <thead class="tbhead">
          @if (Auth::user()->tipo_usuario == 'GESTOR' || Auth::user()->tipo_usuario == 'DIRETOR')
          <div id="search">
            <form action="{{ route('emprestimo.search') }}" method="post">
              @csrf
              <input type="text" name="search" placeholder="Filtrar por ID:">
              <button type="submit">Filtrar</button>
            </form>
          </div>
          @endif
          <tr>
            <th scope="col">ID</th>
            @if (Auth::user()->tipo_usuario == 'GESTOR' || Auth::user()->tipo_usuario == 'DIRETOR')
            <th>Nome do cliente</th>
            @endif
            <th scope="col">valor</th>
            <th scope="col">Quantidade de Parcelas</th>
            <th scope="col">TAXA DE JUROS</th>
            <th scope="col">STATUS</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($emprestimos as $emprestimo)
          <tr>
            <th scope="row">{{$emprestimo->id}}</th>
            @if (Auth::user()->tipo_usuario == 'GESTOR' || Auth::user()->tipo_usuario == 'DIRETOR')
            <td>{{$emprestimo->cliente->nome}}</td>
            @endif
            <td>R$ {{number_format($emprestimo->valor, 2, ',', '.')}}</td>
            <td>{{$emprestimo->parcelas}}</td>
            <td>{{$emprestimo->taxa_juros}} %</td>
            <td>{{$emprestimo->status}}</td>
            <td>
              <a href="{{ route('emprestimo.show', $emprestimo->id) }}" class="btn btn-secondary bo" value="{{$emprestimo->id}}">Saiba mais</a>
            </td>
          </tr>
          @endforeach
          </form>
        </tbody>
      </table>
      @if (count($emprestimos) == 0)
      <h2>Não ha emprestimos para serem exibidos</h2>
      @endif
      <div class="c">
        <div class="cria_emprestimos"><a class="bnovo" href="{{route('emprestimo.create')}}">Solicitar emprestimo</a></div>
      </div>
    </div>
  </main>
  @endsection
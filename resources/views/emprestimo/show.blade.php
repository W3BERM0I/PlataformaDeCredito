<link rel="stylesheet" href="/assets/css/emprestimoDetalhado.css">

@extends('layouts.main')
@section('title', 'Emprestimo')

@section('content')
<main>
  <section class="emprestimo-asides">
    <aside id="right">

      <p>Id: {{$emprestimo->id}}</p>
      <p>Valor solicitado: R$ {{number_format($emprestimo->valor, 2, ',', '.')}}</p>
      <p>Taxa juros: {{$emprestimo->taxa_juros}}</p>
      <p>Data de solicitação: {{$emprestimo->data_solicitacao}}</p>
      <p>Status: {{$emprestimo->status}}</p>
      <p>Quantidade de parcelas: {{$emprestimo->parcelas}}</p>
      <p>valor aproximado de cada parcela:R$ {{number_format(($emprestimo->valor_pago / $emprestimo->parcelas), 2, ',', '.') }}</p>
      @if ($emprestimo->status === 'SOLICITADO')
      <form action="{{route('emprestimo.cancela', $emprestimo->id)}}" method="post">
        @csrf
        @method('PUT')
        <button class="btn btn-danger btn-cancelar">Cancelar solicitaçao</button>
      </form>
      @endif
    </aside>
    <aside id="left">
      <div class="lista_emprestimos">
        <div class="titulo">
          <h1>Parcelas</h1>
        </div>
        <table class="table table-bordered table-striped table-hover">
          <thead class="tbhead">
            <tr class="table-secondary">
              <th scope="col">numero</th>
              <th scope="col">valor</th>
              <th scope="col">Data de Vencimento</th>
              <th scope="col">Status</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($parcelas as $parcela)
            <tr>
              <th scope="row">{{$parcela->numero}}</th>
              <td>R$ {{number_format($parcela->valor, 2, ',', '.')}}</td>
              <td>{{$parcela->data_vencimento}}</td>
              <td>{{$parcela->status}}</td>
              <td>
                <form action="{{ route('parcela.pagar', $parcela->id)}}" method="post">
                  @csrf
                  @method("PUT")
                  <button type="submit" class="btn btn-secondary bo" value="{{$emprestimo->id}}">Pagar</button>
                </form>
              </td>
            </tr>
            @endforeach
            </form>
          </tbody>
        </table>
    </aside>
  </section>
</main>
@endsection
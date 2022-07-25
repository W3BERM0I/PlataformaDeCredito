<link rel="stylesheet" href="/assets/css/gestor.css">
@extends('layouts.main')
@section('title', 'Analizar solicitação de Emprestimo')
@section('content')

<main>
  <aside class="aside">
    <div class="caixa-aside">
      <h1>Cliente</h1>
      <p class="titulo"><span>Nome</span></p>
      <p class="conteudo">{{$cliente->nome}}</p>
      <p class="titulo"><span>Email</span></p>
      <p class="conteudo">{{$cliente->email}}</p>
      <p class="titulo"><span>CPF</span></p>
      <p class="conteudo">{{$cliente->cpf}}</p>
      <p class="titulo"><span>Endereço</span></p>
      <p class="conteudo">{{$cliente->endereco}}</p>
      <p class="titulo"><span>Telefone</span></p>
      <p class="conteudo">{{$cliente->telefone}}</p>
      <p class="titulo"><span>Profissão</span></p>
      <p class="conteudo">{{$cliente->profissao}}</p>
      <p class="titulo"><span>Renda</span></p>
      <p class="conteudo">R$ {{number_format($cliente->renda, 2, ',', '.')}}</p>
    </div>
  </aside>
  <aside class="aside">
    <div class="caixa-aside">
      <h1>Emprestimo</h1>
      <p class="titulo"><span>Valor</span></p>
      <p class="conteudo">R$ {{number_format($emprestimo->valor, 2, ',', '.')}}</p>
      <p class="titulo"><span>Taxa de juros</span></p>
      <p class="conteudo">{{$emprestimo->taxa_juros}} % ao a.</p>
      <p class="titulo"><span>Data da solicitação</span></p>
      <p class="conteudo">{{$emprestimo->data_solicitacao}}</p>
      <p class="titulo"><span>Valor total esperado</span></p>
      <p class="conteudo">R$ {{number_format($emprestimo->valor_pago, 2, ',', '.')}}</p>
      <p class="titulo"><span>Quantidade de parcelas</span></p>
      <p class="conteudo">{{$emprestimo->parcelas}}</p>
      <p class="titulo"><span>valor da parcela</span></p>
      <p class="conteudo">R$ {{number_format($emprestimo->valor_pago / $emprestimo->parcelas, 2, ',', '.')}}</p>
      <p class="titulo"><span>Id</span></p>
      <p class="conteudo">{{$emprestimo->id}}</p>
    </div>
  </aside>
</main>
<div class="card-form">
  <div class="form">
    <form action="{{ route('processa.emprestimo', $emprestimo->id)}}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-atributes">
        <label class="info" for="taxa">taxa de Juros</label>
        <input type="text" name="taxa" value="{{$emprestimo->taxa_juros}}">
        <label class="info" for="status">Status</label>
        <select name="status" id="status">
          <option value="APROVADO">Aprovar</option>
          <option value="REJEITADO">Rejeitar</option>
        </select>
        <button type="submit" class="btn btn-success button">Finalizar</button>
      </div>
    </form>
  </div>
</div>
@endsection
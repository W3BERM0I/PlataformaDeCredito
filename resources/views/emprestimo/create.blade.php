<link rel="stylesheet" href="/assets/css/solicitar_emprestimo.css">
@extends('layouts.main')
@section('title', 'Solicitar Emprestimo')

@section('content')

<main>
  <section id="propaganda">
    <h2>Solicite o seu emprestimo e venha fazer parte do time</h2>
    <p>Apos o envio do formulário a sua proposta vai ser analisada e entraremos em contato em até 24 horas úteis</p>
  </section>
  <section id="formulario">
    <div class="card-solicitacao">
      <h3>Solicitar Emprestimo</h3>
      <form class="form-list" action="{{ route('emprestimo.store') }}" method="post">
        @csrf
        <div class="mb-3 inputs">
          <label for="formGroupExampleInput" class="form-label labels" id="valor">Valor a ser solicitado</label>
          <input type="text" class="form-control input" id="myInput" name="valor" placeholder="Informe o valor a ser solicitado" data-tipo="valor" value="1000" inputmode="numeric" required />
        </div>
        <div class="mb-3">
          <label for="formGroupExampleInput" class="form-label labels" id="valor">Quantidade de parcelas</label>
          <select class="form-select input select" id="qtdParcelas" name="qtdParcelas" aria-label="Default select example" required>
            @for ($i = 1; $i <= 72; $i++) <option value="{{ $i }}">{{ $i }} x</option>
              @endfor
          </select>
        </div>
        <div class="mb-3" id="submit"><button type="submit" class="btn-login">Enviar</button></div>
      </form>
    </div>
  </section>
</main>

<script src="../public/assets/js/solicitar_emprestimo.js"></script>
@endsection
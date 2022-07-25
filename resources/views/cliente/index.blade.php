<link rel="stylesheet" href="/assets/css/cliente/clienteDados.css">
@extends('layouts.main')
@section('title', 'Meus dados')

@section('content')
<div class="titulo">
  <h1>Seu cadastro</h1>
  <h2>dados da conta</h2>
</div>
<form action="{{ route('atualiza.cliente') }}" method="post">
  @csrf
  <div class="form">
    <aside>
      <div class="form-cadastro nome_completo">
        <label for="nome" class="input-label">Nome completo</label>
        <div>
          <input type="text" id="nome" autofocus disabled value="{{Auth::user()->nome}}" class="input" name="nome" minlength="10" maxlength="255" required />
          <input type="checkbox" id="cbNome" name="nome" onclick="EstadoNome(this)" /> Alterar
        </div>
      </div>
      <div class="form-cadastro">
        <label for="cpf" class="input-label">cpf</label>
        <div>
          <input type="text" id="cpf" class="input" disabled value="{{Auth::user()->cpf}}" name="cpf" data-tipo="cpf" autocomplete="off" maxlength="14" onkeyup="mascara_cpf()" required />
          <input type="checkbox" id="cbNome" name="nome" onclick="EstadoCpf(this)" /> Alterar
        </div>
      </div>
      <div class="form-cadastro">
        <label for="telefone" class="input-label">telefone</label>
        <div>
          <input type="text" id="telefone" name="telefone" class="input" disabled value="{{Auth::user()->telefone}}" maxlength="14" onkeydown="mascara_telefone()" required />
          <input type="checkbox" id="cbNome" name="nome" onclick="EstadoTelefone(this)" /> Alterar
        </div>
      </div>
      <div class="form-cadastro">
        <label for="Endereço" class="input-label">Endereço</label>
        <div>
          <input type="text" id="endereco" name="endereco" class="input" disabled value="{{Auth::user()->endereco}}" maxlength="255" required />
          <input type="checkbox" id="cbNome" name="nome" onclick="EstadoEndereco(this)" /> Alterar
        </div>
      </div>
    </aside>
    <aside>
      <div class="form-cadastro">
        <label for="profissao" class="input-label">Profissão</label>
        <div>
          <input type="text" id="profissao" name="profissao" class="input" disabled value="{{Auth::user()->profissao}}" required />
          <input type="checkbox" id="cbNome" name="nome" onclick="EstadoProfissao(this)" /> Alterar
        </div>
      </div>
      <div class="form-cadastro">
        <label for="renda" class="input-label">Renda</label>
        <div>
          <input type="text" id="renda" class="input" name="renda" disabled value="{{Auth::user()->renda}}" data-tipo="preco" required />
          <input type="checkbox" id="cbNome" name="nome" onclick="EstadoRenda(this)" /> Alterar
        </div>
      </div>
      <div class="form-cadastro">
        <label for="email" class="input-label">Email</label>
        <div>
          <input type="email" name="email" id="email" class="input" disabled value="{{Auth::user()->email}}" required />
          <input type="checkbox" id="cbNome" name="nome" onclick="EstadoEmail(this)" /> Alterar
        </div>
      </div>
  </div>
  <div class="form-checkbox">
    <input type="checkbox" id="cbNome" name="nome" onclick="EstadoSenha(this)" /> Alterar Senha
  </div>
  <div id="senhas">
    <div class="form-cadastro">
      <label for="senha" class="input-label">Senha atual</label>
      <input type="password" name="senha" id="senha" class="input senha" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?!.*[ !@#$%^&*_=+-]).{6,40}$" title="A senha deve conter entre 6 a 40 caracteres, deve conter pelo menos uma letra maiúscula, um número e não deve conter símbolos." data-tipo="senha" required />
    </div>
    <div class="form-cadastro">
      <label for="senha" class="input-label">Nova senha</label>
      <input type="password" name="senha" id="senha" class="input senha" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?!.*[ !@#$%^&*_=+-]).{6,40}$" title="A senha deve conter entre 6 a 40 caracteres, deve conter pelo menos uma letra maiúscula, um número e não deve conter símbolos." data-tipo="senha" required />
    </div>
    <div class="form-cadastro confirmar_senha">
      <label for="senha" class="input-label">Confirme a nova senha</label>
      <input type="password" id="senha" class="input senha" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?!.*[ !@#$%^&*_=+-]).{6,40}$" title="A senha deve conter entre 6 a 40 caracteres, deve conter pelo menos uma letra maiúscula, um número e não deve conter símbolos." data-tipo="compararSenha" required />
    </div>
  </div>
  </aside>
  <div class="submit">
    <input type="submit" value="Atualizar cadastro" class="enviar" />
  </div>
</form>

<script src="/assets/js/cliente/clienteDados.js"></script>


@endsection
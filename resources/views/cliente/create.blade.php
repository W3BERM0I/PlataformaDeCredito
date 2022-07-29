<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastar</title>
  <link rel="stylesheet" href="/assets/css/baseCss/base.css">
  <link rel="stylesheet" href="/assets/css/cadastrar.css">
</head>

<body>
  <header class="cabecalhoPrincipal">
    <div class="container">
      <h1><a href="/credeasy">CredEasy</a></h1>
      <nav>
        <a class="container__item" href="/entrar">Entrar</a>
      </nav>
    </div>
  </header>
  <main>
    <div class="info-cadastro">
      <h2 class="desktop">Crie o seu cadastro e venha fazer parte do nosso time</h2>
      <h2 class="mobile">Crie a sua conta gratís</h2>
      <p class="desktop">Acesso facil e rápido e com as melhores taxas do mercado</p>
      <form action="{{ route('efetua.cadastro') }}" method="post">
        @csrf
        <div class="form-cadastro nome_completo">
          <label for="nome" class="input-label">Nome completo</label>
          <input type="text" id="nome" autofocus class="input" name="nome" minlength="10" maxlength="255" required />
        </div>
        <div class="form-cadastro">
          <label for="cpf" class="input-label">cpf</label>
          <input type="text" id="cpf" class="input" name="cpf" data-tipo="cpf" autocomplete="off" maxlength="14" onkeyup="mascara_cpf()" required />
        </div>
        <div class="form-cadastro">
          <label for="telefone">telefone</label>
          <input type="text" id="telefone" name="telefone" class="input" maxlength="14" onkeydown="mascara_telefone()" required />
        </div>
        <div class="form-cadastro">
          <label for="Endereço">Endereço</label>
          <input type="text" id="endereco" name="endereco" class="input" maxlength="255" required />
        </div>
        <div class="form-cadastro">
          <label for="profissao">Profissão</label>
          <input type="text" id="profissao" name="profissao" class="input" required />
        </div>
        <div class="form-cadastro">
          <label for="renda">Renda</label>
          <input type="text" id="renda" class="input" name="renda" data-tipo="preco" required />
        </div>
        <div class="form-cadastro">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="input" required />
        </div>
        <div class="form-cadastro">
          <label for="senha">Senha</label>
          <input type="password" name="senha" id="senha" class="input" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?!.*[ !@#$%^&*_=+-]).{6,40}$" title="A senha deve conter entre 6 a 40 caracteres, deve conter pelo menos uma letra maiúscula, um número e não deve conter símbolos." data-tipo="senha" required />
        </div>
        <div class="form-cadastro confirmar_senha">
          <label for="senha">Confirme a senha</label>
          <input type="password" id="confirmarSenha" class="input" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?!.*[ !@#$%^&*_=+-]).{6,40}$" title="A senha deve conter entre 6 a 40 caracteres, deve conter pelo menos uma letra maiúscula, um número e não deve conter símbolos." data-tipo="compararSenha" required />
        </div>
        <div class="submit">
          <input type="submit" value="Criar Conta" class="enviar" />
        </div>
      </form>
    </div>
  </main>
  <footer class="footer">
    <div class="propaganda">
    </div>
    <div class="info-footer">
      <p>Group CredEasy by Moisés Weber</p>
      <p>© copyright</p>
    </div>
  </footer>
  <script src="/assets/js/cadastrar/mascaras.js"></script>
  <script src="/assets/js/cadastrar/app.js"></script>
  <script src="https://github.com/codermarcos/simple-mask-money/releases/download/v3.0.0/simple-mask-money.js"></script>
</body>

</html>
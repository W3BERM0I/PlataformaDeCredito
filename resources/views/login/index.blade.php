<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/assets/css/baseCss/base.css">
  <link rel="stylesheet" href="/assets/css/entrar.css" />

  <title>Entrar</title>
</head>

<body>
  <header class="cabecalhoPrincipal">
    <div class="container">
      <h1 class="container__titulo"><a id="container__link" href="/credeasy">CredEasy</a></h1>
    </div>
  </header>

  <main>
    <section>
      <div class="informacao">
        <h2 id="informacao__titulo">Bem-vindo a CredEasy</h2>
        <p>
          Somos a maneira mais facil de você alcançar os seus
          sonhos
        </p>
      </div>

      <div class="card">
        <h1>Entrar</h1>
        <form action="{{route('validaLogin')}}" method="post">
          @csrf
          <div class="textfield">
            <label for="email">E-mail</label>
            <input type="email" name="email" placeholder="E-mail" id="email" required />
          </div>
          <div class="textfield">
            <label for="password">Senha</label>
            <input type="password" name="password" placeholder="Senha" required />
          </div>
          <div class="textfield"><button class="btn-login">Login</button></div>
        </form>
        <a href="/recuperar-senha">Esqueci minha senha</a>
        <a href="/cadastrar">Sou novo aqui</a>
      </div>
    </section>
  </main>
</body>

</html>
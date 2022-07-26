<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="/assets/css/baseCss/base.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
  <header class="cabecalhoPrincipal" id="principalHeader">
    <div class="container">
      <h1><a href="{{ route('home') }}">CredEasy</a></h1>
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
          Olá, {{session('nome')}}
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
          <li><a class="dropdown-item" href="{{ route('cliente.index') }}">Meu Perfil</a></li>
          <li><a class="dropdown-item" href="{{ route('deslogar') }}">Sair</a></li>
        </ul>
      </div>
    </div>
  </header>

  <body>
    @yield('content')

    <footer class="footer">
      <div class="propaganda">
      </div>
      <div class="info-footer">
        <p>Group CredEasy by Moisés Weber</p>
        <p>© copyright</p>
      </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>

</html>
<template>
  <header class="cabecalhoPrincipal" id="principalHeader">
    <div class="container">
      <h1><a href="/home">CredEasy</a></h1>
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
          Olá,
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
          <li><a class="dropdown-item" href="">Meu Perfil</a></li>
          <li><a class="dropdown-item" href="">Sair</a></li>
        </ul>
      </div>
    </div>
  </header>  
  <RouterView />
<footer class="footer">
      <div class="propaganda">
      </div>
      <div class="info-footer">
        <p>Group CredEasy by Moisés Weber</p>
        <p>© copyright</p>
      </div>
    </footer>
</template>


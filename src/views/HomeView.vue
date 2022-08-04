<template>
   <div class="principal">
    <div class="card">
      <div class="card-body">
        <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-credit-card-2-front rounded mx-auto d-block" viewBox="0 0 16 16">
          <path d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z" />
          <path d="M2 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
        </svg>
        <h5 class="card-title">Lista de emprestimos</h5>
        <p class="card-text">Acesse por aqui os emprestimos</p>
        <router-link to="/ListaEmprestimos" class="btn btn-primary" id="btn-style">Saiba mais</router-link>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-unlock rounded mx-auto d-block" viewBox="0 0 16 16">
          <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2zM3 8a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1H3z" />
        </svg>
        <h5 class="card-title">Solicitar emprestimo</h5>
        <p class="card-text">Solicite um emprestimo para chegar mais perto do seu sonho</p>
        <router-link to="/CriaEmprestimo" class="btn btn-primary btn-style" id="btn-style">Saiba mais</router-link>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-fire mx-auto d-block" viewBox="0 0 16 16">
          <path d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16Zm0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15Z" />
        </svg>
        <h5 class="card-title">Ações gestor</h5>
        <p class="card-text">Gerencie os emprestimos por aqui</p>
        <router-link to="/IndexGestor" class="btn btn-primary" id="btn-style">Acessar</router-link>
      </div>
    </div>
    <div class="card">
      <div class="card-body center">
        <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-bar-chart-line mx-auto d-block" viewBox="0 0 16 16">
          <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2zm1 12h2V2h-2v12zm-3 0V7H7v7h2zm-5 0v-3H2v3h2z" />
        </svg>
        <h5 class="card-title">Ações Diretor</h5>
        <p class="card-text">Gerencie a sua equipe por aqui</p>
        <router-link to="/AcoesDiretor" class="btn btn-primary" id="btn-style">Acessar</router-link>
      </div>
    </div>
  </div>
</template>


<style scoped>
  .principal {
  height: 80vh;
  width: 100vw;
  display: flex;
}


.card {
  margin-top: 10vh;
  height: 50vh;
  width: 31vw;
  display: flex;
  justify-content: space-between;
  margin-right: 2vw;
}

.card-body {
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
}

.card-title {
  margin-bottom: 5vh;
}

.card-text {
  margin-bottom: 1rem;
}


#btn-style {
  background-color: var(--verdeClaro);
  border-color: var(--cinza);
}

#btn-style:hover {
  background-color: #023d2ac4;
}

.card:first-child {
  margin-left: 1vw;
}

@media screen and (max-width: 768px) {
  .principal {
    flex-direction: column;
    height: 170vh;
  }

  .card-body {
    width: 95vw;
  }
}
</style>

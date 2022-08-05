<template>
  <main>
    <section>
      <card class="emprestimo">
        <aside class="left aside-card">
          <h1 class="titulo">Emprestimo</h1>
          <div class="conteudo">
            <p>ID: </p>
            <p>VALOR: R$ 40.000,00</p>
          </div>
        </aside>
        <aside class="right aside-card">
          <h2 class="titulo">Parcelas</h2>
        </aside>
      </card>
    </section>
  </main>
</template>

<style scoped>
  main {
    display: flex;
    justify-content: center;
    background: var(--brancoEscuro);
    min-height: 70vh;
  }

  section {
    display: flex;
  }

  .emprestimo {
    display: flex;
    background: var(--brancoClaro);
    justify-content: space-around;
    min-height: 70%;
    width: 90vw;
    border-radius: 12%;
    margin: 3% 0 3% 0;
    border: 1px solid var(--cinza);
  }

  .aside-card{
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 45%;
    min-height: 50%;
    max-height: 100%;
    border-radius: 20%;
  }

  .titulo {
    color: var(--verdeClaro);
    font-weight: 700;
    font-size: 1.5rem;
    padding: 20px 40px;
  }
</style>
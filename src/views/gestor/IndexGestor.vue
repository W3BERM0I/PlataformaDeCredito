<template>
  <main>
  <div class="lista_emprestimos">
    <div class="titulo">
      <h1>Emprestimos solicitados</h1>
    </div>
    <table class="table table-borderless">
      <thead class="tbhead">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">valor</th>
          <th scope="col">Parcelas</th>
          <th scope="col">Taxa de juros</th>
          <th scope="col">STATUS</th>
          <th scope="col">Nome do Cliente</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(emprestimo, index) in TodosEmprestimos" :key="index">
          <th scope="row">{{emprestimo.id}}</th>
          <td>R$ {{emprestimo.valor}}</td>
          <td>{{emprestimo.parcelas}}</td>
          <td>{{emprestimo.taxa_juros}} %</td>
          <td>{{emprestimo.status}}</td>
          <td>{{emprestimo.cliente.nome}}</td>

          <td>
            <router-link :to="'analizar/emprestimo/' + emprestimo.id" class="btn btn-secondary bo">Saiba mais</router-link>
          </td>
        </tr>
      </tbody>
    </table>
    <h2 v-if="semEmprestimos">Não ha emprestimos para serem analizados</h2>
  </div>
</main>
</template>

<script setup>
import { ref, computed } from 'vue';
import api from '../../services/api'

  const TodosEmprestimos = ref([]);
  api.get('listaEmprestimosSolicitados').then((res) => {
    TodosEmprestimos.value = res.data;
  });

  const semEmprestimos = computed(() => TodosEmprestimos.value.length == 0);
  
</script>

<script>

  export default {
    data() {
      return {
      }
    },
    setup() {
     
    }
  }
</script>


<style scoped>
  main {
  display: flex;
  min-height: 65vh;
  width: 100vw;
}

.lista_emprestimos {
  width: 100vw;
}

h1 {
  color: var(--verdeClaro);
  font-weight: 700;
  font-size: 3rem;
}

.aside {
  width: 50vw;
  height: 65vh;
  display: flex;
  justify-content: center;
  align-items: flex-start;
  margin-top: 5vh;
}

.caixa-aside {
  width: 40vw;
  height: 65vh;
  display: flex;
  flex-direction: column;
  background-color: var(--brancoClaro);
  border-radius: 15%;
  border: .2rem solid var(--cinzaEscuro);
  align-items: center;
  margin-bottom: 0;
}

.titulo {
  font-weight: 700;
  font-size: 1.8rem;
  text-align: center;
  margin: 0;
  color: var(--cinza);
}

.conteudo {
  font-size: 1.5rem;
  margin: 0;
}

.form {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 70vw;
  height: 15vh;
  border: .2rem solid var(--cinzaEscuro);
  border-radius: 15%;
  margin-top: 1vh;

}

.form-atributes {
  display: flex;
}

.info {
  font-size: 2rem;
  font-weight: 700;
  height: 5vh;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 1vw 0 2vw;
}

.card-form {
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0;
}

#status {
  width: 7vw;
}

.button {
  margin-left: 1vw;
  width: 10vw;
}
</style>
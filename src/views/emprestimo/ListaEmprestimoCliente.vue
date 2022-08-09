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
            <tr v-for="(emprestimo, index) in EmprestimosCliente" :key="index">
              <th scope="row">{{ emprestimo.id }}</th>
              <td>R$ {{ emprestimo.valor }}</td>
              <td>{{ emprestimo.parcelas }}</td>
              <td>{{ emprestimo.taxa_juros}} %</td>
              <td>{{ emprestimo.status}}</td>
              <td>{{ emprestimo.cliente.nome}}</td>

              <td>
                <router-link to="" class="btn btn-secondary bo">Saiba mais</router-link>
              </td>
            </tr>
          </tbody>
        </table>
      <h2 v-if="semEmprestimos">Não ha emprestimos para serem analizados</h2>
       <div class="c">
        <div class="cria_emprestimos"><router-link class="bnovo" to="CriaEmprestimo">Solicitar emprestimo</router-link ></div>
      </div>
      </div>
    </main>
</template>

<script setup>
  import api from '../../services/api'
  import { ref, computed } from 'vue';
  

  const EmprestimosCliente = ref([]);
  api.get('emprestimo/cliente').then((res) => {
     EmprestimosCliente.value = res.data;
  });

  const semEmprestimos = computed(() => EmprestimosCliente.value.length == 0);

</script>

<script>
  import Emprestimo from '../../domain/Emprestimo';


  export default {
    data() {
      return {
        emprestimo: new Emprestimo()
      }
    }
  }
</script>

<style scoped>
  .principal {
  height: 80vh;
  width: 100vw;
  display: flex;
}


main {
  min-height: 80vh;
  flex-direction: column;
}

#search {
  margin-bottom: 2vh;
}

#search>input {
  padding: 5px 30px;
  margin-left: 2%;
  margin-right: 1%;
}

#search>button {
  background: var(--verdeClaro);
  color: var(--brancoEscuro);
  border: 0;
  border-radius: 20%;
  padding: 8px 20px;
}


.lista__emprestimos {
  flex-direction: column;
}

.titulo {
  display: flex;
  justify-content: center;
  align-items: center;
  color: var(--verdeClaro);
  padding: 1%;
  font-size: 35px;
  font-weight: 700;
}

.tbhead {
  background-color: var(--verdeClaro);
}

td {
  color: var(--cinza);
}

.bo {
  background-color: var(--verdeClaro);
  color: var(--brancoEscuro);
}

.cria_emprestimos {
  width: 15%;
  margin-top: 1.9em;
  border-radius: 8px;
  background-color: var(--verdeClaro);
  cursor: pointer;
  box-shadow: 0px 10px 40px -12px var(--preto);
  display: flex;
  justify-content: center;
}

.bnovo {
  text-decoration: none;
  text-align: center;
  color: var(--cinzaEscuro);
  font-weight: 700;
  justify-content: center;
  align-items: center;
  width: 10vw;
  padding: 12px;
}

.bnovo:hover {
  color: var(--brancoEscuro);
}

.c {
  display: flex;
  justify-content: flex-end;
  margin-right: 5vw;
  margin-bottom: 5vh;
}
</style>
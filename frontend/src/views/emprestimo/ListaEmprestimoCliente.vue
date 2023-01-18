<template>
    <main>
      <div class="lista_emprestimos">
        <div class="titulo">
          <h1>Meus emprestimos</h1>
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
            <tr v-for="(emprestimo, index) in this.emprestimos" :key="index">
              <th scope="row">{{ emprestimo.id }}</th>
              <td>R$ {{ emprestimo.valor }}</td>
              <td>{{ emprestimo.parcelas }}</td>
              <td>{{ emprestimo.taxa_juros}} %</td>
              <td>{{ emprestimo.status}}</td>
              <td>{{ emprestimo.cliente.nome}}</td>
              <td>
                <router-link :to="'emprestimo/' + emprestimo.id" class="btn btn-secondary bo">Saiba mais</router-link>
              </td>
            </tr>
          </tbody>
        </table>
      <h2 v-if="semEmprestimos()" class="flag">Não ha emprestimos para serem exibidos</h2>
       <div class="c">
        <div class="cria_emprestimos"><router-link class="bnovo" to="CriaEmprestimo">Solicitar emprestimo</router-link ></div>
      </div>
      </div>
    </main>
</template>


<script>
 import api from '../../services/api'

  export default {
    data() {
      return {
        emprestimos: [],
      }
    },
    created() {
        api.get('emprestimo/cliente').then((res) => {
        this.emprestimos = res.data;
       });
    },
    methods: {
      semEmprestimos() {
        return Boolean(this.emprestimos.length == 0);
      },
    }
  }
</script>

<style scoped>
  .principal {
  min-height: 80vh;
  display: flex;
}


main {
  min-height: 80vh;
  flex-direction: column;
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
  margin-top: 1.9em;
  padding: 2px 10px;
  border-radius: 8px;
  background-color: var(--verdeClaro);
  cursor: pointer;
  box-shadow: 0px 10px 40px -12px var(--preto);
  display: flex;
  justify-content: center;
  text-align: center;
  flex-wrap: nowrap;
}

.bnovo {
  text-decoration: none;
  text-align: center;
  color: var(--cinzaEscuro);
  font-weight: 700;
  flex-wrap: nowrap;
  padding: 12px 20px;
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

.flag {
  font-size: 30px;
  text-align: center;
  margin-top: 2%;
}
</style>
<template>
  <main>
    <!-- <h3>{{ emprestimo.parcelas }}</h3> -->
    <section>
      <card class="emprestimo">
        <aside class="left aside-card">
          <h1 class="titulo">Emprestimo</h1>
          <div class="conteudo">
            <p class="emprestimo-campo">ID do emprestimo: {{ emprestimo.emprestimo.id }} </p>
            <p class="emprestimo-campo">Valor: {{ (formataCampoMonetario(emprestimo.emprestimo.valor) / 100).toLocaleString('pt-br',{style: 'currency', currency: 'BRL'})}}</p>
            <p class="emprestimo-campo">Taxa de Juros: {{ emprestimo.emprestimo.taxa_juros}}%</p>
            <p class="emprestimo-campo">Data da Solicitação: {{ emprestimo.emprestimo.data_solicitacao}}</p>
            <p class="emprestimo-campo">Quantidade de parcelas: {{ emprestimo.emprestimo.parcelas}}</p>
            <p class="emprestimo-campo">Valor aproximado de cada parcela: {{ (emprestimo.emprestimo.valor_pago / emprestimo.emprestimo.parcelas).toLocaleString('pt-br',{style: 'currency', currency: 'BRL'})}}</p>
            <p class="emprestimo-campo">Status: {{ emprestimo.emprestimo.status}}</p>
          </div>
          <div class="cancelar" v-show="emprestimo.emprestimo.status == 'SOLICITADO'">
            <form @click.prevent="cancelarEmprestimo()">
              <button type="submit" class="btn btn-danger">Cancelar solicitação de emprestimo</button>
            </form>
          </div>
        </aside>
        <aside v-show="emprestimo.emprestimo.status == 'APROVADO'" class="right aside-card">
          <h2 class="titulo">Parcelas</h2>
          <div class="conteudo"  >
            <table class="table table-bordered table-striped table-hover">
              <thead class="tbhead">
                <tr class="">
                  <th scope="col">numero</th>
                  <th scope="col">valor</th>
                  <th scope="col">Data de Vencimento</th>
                  <th scope="col">Status</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="parcela in emprestimo.parcelas" :key="parcela.id">
                  <td scope="row">{{parcela.numero}}</td>
                  <td scope="row">R$ {{parcela.valor}}</td>
                  <td scope="row" v-show="!parcelaAtrasada(parcela)">{{parcela.data_vencimento}}</td>
                  <td scope="row" v-show="parcelaAtrasada(parcela)" class="parcelaAtrasada">{{parcela.data_vencimento}}</td>
                  <td scope="row" v-show="!parcelaAtrasada(parcela)">{{parcela.status}}</td>
                  <td scope="row" v-show="parcelaAtrasada(parcela)" class="parcelaAtrasada">ATRASADA</td>
                  <td>
                    <form>
                      <button type="submit" class="btn btn-secondary bo" @click.prevent="pagarParcela(parcela)">Pagar</button>
                    </form>
                  </td>
                </tr>
              </tbody>
             </table>
          </div>
        </aside>
      </card>
    </section>
  </main>
</template>

<script setup>
  import { ref } from 'vue';
  import { useRoute } from 'vue-router'
  import api from '../../services/api'
  
  const emprestimo = ref([]);

  listaEmprestimos()

  async function listaEmprestimos() {
    await api.get('emprestimo/' + useRoute().params.id).then((res) => {
     emprestimo.value = res.data;
    })
  }

  async function pagarParcela(parcela){
    await api.put('parcela/pagar', parcela).then((res) => {
      listaEmprestimos()
    }).catch(err => {
      console.log(err);
    });
  }

  async function cancelarEmprestimo(){
    await api.patch('emprestimo/cancelar', this.emprestimo.emprestimo).then(res => {
      listaEmprestimos()
      this.$toast.success('cpf cancelado')
    }).catch(err => {
      console.log(err)
  });
  }

  function parcelaAtrasada(parcela) {
    if(parcela.status == 'ABERTA'){
       let data_vencimento = parcela.data_vencimento.split('-')
       let dateParcela = new Date(data_vencimento[2], data_vencimento[1], data_vencimento[0])
       let nowDate = new Date()
       if(nowDate > dateParcela) return true
      }
    return false;
  }

  function  formataCampoMonetario(valor) {
    valor = valor.replace(",", "").replace(".", "")
    return valor.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'})
  }
</script>


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

  .emprestimo-campo {
    min-height: 40px;
    font-size: 25px;
    text-align: center;
    margin-top: 3%;
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

  .cancelar {
    margin-bottom: 2%;
  }

  .parcelaAtrasada {
    color: red !important;
  }
</style>
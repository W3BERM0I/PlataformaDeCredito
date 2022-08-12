<template>
    <main>
      <aside class="aside">
        <div class="caixa-aside">
          <h1>Cliente</h1>
          <p class="titulo"><span>Nome</span></p>
          <p class="conteudo">{{emprestimo.cliente.nome}}</p>
          <p class="titulo"><span>Email</span></p>
          <p class="conteudo">{{emprestimo.cliente.email}}</p>
          <p class="titulo"><span>CPF</span></p>
          <p class="conteudo">{{emprestimo.cliente.cpf}}</p>
          <p class="titulo"><span>Endereço</span></p>
          <p class="conteudo">{{emprestimo.cliente.endereco}}</p>
          <p class="titulo"><span>Telefone</span></p>
          <p class="conteudo">{{emprestimo.cliente.telefone}}</p>
          <p class="titulo"><span>Profissão</span></p>
          <p class="conteudo">{{emprestimo.cliente.profissao}}</p>
          <p class="titulo"><span>Renda</span></p>
          <p class="conteudo">R$ {{emprestimo.cliente.renda}}</p>
        </div>
      </aside>
      <aside class="aside">
        <div class="caixa-aside">
          <h1>Emprestimo</h1>
          <p class="titulo"><span>Valor</span></p>
          <p class="conteudo">R$ {{emprestimo.emprestimo.valor}}</p>
          <p class="titulo"><span>Taxa de juros</span></p>
          <p class="conteudo">{{emprestimo.emprestimo.taxa_juros}} % ao a.</p>
          <p class="titulo"><span>Data da solicitação</span></p>
          <p class="conteudo">{{emprestimo.emprestimo.data_solicitacao}}</p>
          <p class="titulo"><span>Valor total esperado</span></p>
          <p class="conteudo">R$ {{emprestimo.emprestimo.valor_pago}}</p>
          <p class="titulo"><span>Quantidade de parcelas</span></p>
          <p class="conteudo">{{emprestimo.emprestimo.parcelas}}</p>
          <p class="titulo"><span>valor da parcela</span></p>
          <p class="conteudo">R$ {{emprestimo.emprestimo.valor_pago / emprestimo.emprestimo.parcelas}}</p>
          <p class="titulo"><span>Id</span></p>
          <p class="conteudo">{{emprestimo.emprestimo.id}}</p>
        </div>
      </aside>
    </main>
    <div class="card-form">
      <div class="form">
        <form>
          <div class="form-atributes">
            <label class="info" for="taxa">taxa de Juros</label>
            <input type="text" name="taxa" value="{{emprestimo.emprestimo.taxa_juros}} %">
            <label class="info" for="status">Status</label>
            <select name="status" id="status">
              <option value="APROVADO">Aprovar</option>
              <option value="REJEITADO">Rejeitar</option>
            </select>
            <button type="submit" class="btn btn-success button">Finalizar</button>
          </div>
        </form>
      </div>
    </div>
</template>

<script setup>
  import api from '../../services/api'
  import { ref } from 'vue';
import { useRoute } from 'vue-router';
  
  const emprestimo = ref([]);
  api.get('emprestimo/analisar/' + useRoute().params.id).then((res) => {
     emprestimo.value = res.data;
  });
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
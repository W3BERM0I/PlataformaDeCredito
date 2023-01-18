<template>
<main>
 <section id="propaganda">
    <h2>Solicite o seu emprestimo  venha fazer parte do time</h2>
    <p>Apos o envio do formulário a sua proposta vai ser analisada e entraremos em contato em até 24 horas úteis</p>
  </section>
  <section id="formulario">
    <div class="card-solicitacao">
      <h3>Solicitar Emprestimo</h3>
      <form>
        <div class="mb-3 inputs">
          <label for="valor" class="form-label labels" id="valor">Valor a ser solicitado</label>
          <div class="emprestimo-valor">
          <input type="text" name="pre-fix" readonly id="pre-fix-valor" value="R$">
          <input type="text" class="form-control input emprestimo-valor" id="myInput" name="valor" inputmode="numeric"  v-mask-decimal.br="2" v-model="emprestimo.valor" required />
          </div>
        </div>
        <div class="mb-3">
          <label for="formGroupExampleInput" class="form-label labels" id="valor">Quantidade de parcelas</label>
          <select class="form-select input select" id="qtdParcelas" name="qtdParcelas" v-model="emprestimo.qtdParcelas" aria-label="Default select example" required >
            <option v-for="n in qtdMaximaParcelas" :key="n" :value="n">{{ n }} x {{(valorParcela / n).toLocaleString('pt-br',{style: 'currency', currency: 'BRL'})}}</option>
          </select>
        </div>
        <div class="mb-3" id="submit"><button type="submit" @click.prevent="criarEmprestimo()" class="btn-login">Enviar</button></div>
      </form>
    </div>
  </section>
  </main>
</template>

<script>
import api from '../../services/api'
export default {
  data() {
    return {
      emprestimo: {valor: '1.000,00', qtdParcelas: 1, clienteId: this.$store.state.usuario.id}
    }
  },
  methods: {
    async criarEmprestimo() {
        this.emprestimo.valor = this.emprestimo.valor.replace(/[^0-9]/g,'')
        await api.post('emprestimo', this.emprestimo).then((res) => {
        this.$router.push({ name: "Home" })
      }).catch(err => {
        console.log(err);
      })
    }
  },
  computed: {
    valorParcela() {
      let valor = this.emprestimo.valor

      if((this.emprestimo.valor).includes(".") || (this.emprestimo.valor).includes(","))
        valor = ((this.emprestimo.valor).replace(".", "").replace(",", "") / 100)
      return valor * 1.1
    },
    qtdMaximaParcelas() {
      let qtdParcela = Math.round(this.valorParcela / 200 - 1)
      if(qtdParcela <= 1 && this.valor > 200) return 1;
      if (qtdParcela > 72) return 72
      return qtdParcela
    }

  }
};
</script>

<style scoped>
  
main {
  display: flex;
  width: 100vw;
  height: 90vh;
  background-color: var(--brancoEscuro);
}

.emprestimo-valor {
  display: flex;
  background: white;
}

#pre-fix-valor {
  width: 10%;
  background: white;
  border: none;
}

#propaganda {
  background-color: var(--brancoEscuro);
  width: 50vw;
  height: 40vw;
  color: var(--cinza);
  padding: 5%;
}

#propaganda h2 {
  margin-top: 5vh;
  font-weight: 700;
  font-size: 2.5rem;
  font-family: 'Ubuntu', sans-serif;
  color: var(--verdeClaro);
}

#propaganda p {
  margin-top: 10vh;
  font-weight: 400;
  font-size: 1.5rem;
  font-family: 'Ubuntu', sans-serif;
}

#formulario {
  height: 80vh;
  width: 50vw;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  font-family: 'Ubuntu', sans-serif;
}

.card-solicitacao {
  margin-top: 8vh;
  height: 70vh;
  width: 31vw;
  border-radius: 13%;
  background-color: var(--verdeClaro);
  box-shadow: 0px 10px 40px -12px var(--cinza);
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  color: var(--cinzaEscuro);
}

form {
  width: 22vw;
  display: flex;
  flex-direction: column;
}

.card-solicitacao h3 {
  font-weight: 700;
  font-size: 2.3em;
  margin-bottom: 5vh;
}

#valor {
  font-size: 1.2em;
  font-weight: 700;

}

label-valor {
  font-size: 2.3em;
  font-weight: 700;
  color: red;
}

.btn-login {
  width: 100%;
  padding: 1em 0px;
  margin-top: 1em;
  border: none;
  border-radius: 8px;
  outline: none;
  text-transform: uppercase;
  font-weight: 800;
  letter-spacing: 0.5em;
  color: var(--verdeClaro);
  background: var(--brancoEscuro);
  cursor: pointer;
  box-shadow: 0px 10px 40px -12px var(--preto);
}

@media screen and (max-width: 767px) {
  main {
    flex-direction: column;
  }

  #propaganda {
    display: none;
  }

  #propaganda h2 {
    margin: auto;
    align-items: center;
    justify-content: center;
  }

  #formulario {
    width: 100vw;
  }

  .card-solicitacao {
    height: 60vh;
    width: 85vw;
    margin-top: 0%;
  }

  .form-list {
    display: flex;
    flex-direction: column;
  }

  .btn-submit {
    width: 30vw;
    margin-left: 18vw;
  }

  #valor {
    width: 85vw;
  }
}
</style>
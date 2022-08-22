

<template>
  <main>
    <div class="info-cadastro">
      <h2 class="desktop">Crie o seu cadastro e venha fazer parte do nosso time</h2>
      <h2 class="mobile">Crie a sua conta gratís</h2>
      <p class="desktop">Acesso facil e rápido e com as melhores taxas do mercado</p>
      <form action="" method="post">
        <div class="form-cadastro nome_completo">
          <label for="nome" class="input-label">Nome completo</label>
          <input type="text" id="nome" autofocus class="input" name="nome" v-model="user.nome" minlength="10" maxlength="255" required />
        </div>
        <div class="form-cadastro">
          <label for="cpf" class="input-label">cpf</label>
          <input type="text" id="cpf" class="input" name="cpf" autocomplete="off" maxlength="14" v-model="user.cpf" v-mask-cpf />
        </div>
        <div class="form-cadastro">
          <label for="telefone">telefone</label>
          <input type="text" id="telefone" name="telefone" class="input" maxlength="15" v-model="user.telefone" v-mask-phone.br/>
        </div>
        <div class="form-cadastro">
          <label for="Endereço">Endereço</label>
          <input type="text" id="endereco" name="endereco" v-model="user.endereco" class="input"/>
        </div>
        <div class="form-cadastro">
          <label for="profissao">Profissão</label>
          <input type="text" id="profissao" name="profissao" v-model="user.profissao" class="input" />
        </div>
        <div class="form-cadastro">
          <label for="renda">Renda</label>
          <input type="text" id="renda" class="input" name="renda" v-model="user.renda" v-mask-decimal.br="2"/>
        </div>
        <div class="form-cadastro">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" v-model="user.email" class="input"/>
        </div>
        <div class="form-cadastro">
          <label for="senha">Senha</label>
          <input type="password" name="senha" id="senha" class="input" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[ !@#$%^&*_=+-]).{6,40}$" v-model="user.senha"/>
        </div>
        <div class="form-cadastro confirmar_senha">
          <label for="senha">Confirme a senha</label>
          <input type="password" id="confirmarSenha" class="input" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{6,40}$" v-model="user.confirmarSenha"/>
        </div>
        <div class="submit">
          <input type="submit" @click.prevent="criarConta" value="Criar Conta" class="enviar" />
        </div>
      </form>
    </div>
  </main>
</template>


<script>

import api from '../../services/api';
import { cpf } from 'cpf-cnpj-validator'; 

export default {
  data() {
    return {
      user: {nome: "", cpf: "", telefone: "", endereco: "", profissao: "", renda: "", email: "", senha: "", confirmarSenha: ""}
    }
  },
  methods: {
    async criarConta() {
      let flag = 0
      if(this.user.senha !== this.user.confirmarSenha) {
        this.$toast.error("Os campos de senha não são idênticos ")
        flag = 1
      }
      
      await api.post('emailECpf', [this.user.email, this.user.cpf]).then(res => {
        if(res.data.email !== null) {
          this.$toast.error('E-mail informado ja esta em uso!')
          flag = 1
        }
        if(res.data.cpf !== null) {
        this.$toast.error('CPF informado ja esta em uso!')
          flag = 1
        }
      }).catch(err => {
        console.log(err)
      })

      if(!cpf.isValid(this.user.cpf)){
       this.$toast.error('CPF informado é invalido!')
        flag = 1
      }


      if(this.user.senha.length < 3) flag = 1

      if(flag == 0) {
      await api.post('cadastrar', this.user).then((res) => {
        this.$router.push({ name: "Entrar" })
        this.$toast.success('Conta criada com sucesso')
      }).catch((err) => {
        console.log(err)
      })
    }
    }
  }
}
</script>

<style scoped>
  body {
  background-color: var(--brancoClaro);
  font-family: 'Lato', sans-serif;
}

.textfield {
  display: flex;
  flex-direction: column;
  width: 100vw;
  height: 100vh;
}

.info-cadastro h2 {
  margin-top: 5vh;
  text-align: center;
  font-weight: 700;
  font-size: 2.5rem;
}

.info-cadastro p {
  margin-top: 5vh;
  margin-bottom: 3vh;
  text-align: center;
  font-weight: 400;
  font-size: 2rem;
}

.mobile {
  display: none;
}

form {
  display: flex;
  flex-direction: column;
  align-items: center;
}

form>label {
  margin: auto;
  align-items: center;
}

.form-cadastro {
  display: flex;
  flex-direction: column;
  margin-bottom: 1vh;
  font-size: 1.5rem;
  justify-content: center;
}

.form-cadastro>label {
  margin-bottom: 1vh;
  height: 2rem;
  text-align: center;
  font-weight: bold;
  font-size: 2rem;
}

.form-cadastro>input {
  height: 6vh;
  width: 40vw;
  background-color: var(--verdeClaro);
  border: 1px solid var(--preto);
  border-radius: 5vh;
  text-align: center;
}

.form-cadastro>input::placeholder {
  color: var(--preto);
}

.submit input {
  height: 8vh;
  width: 35vw;
  background-color: var(--preto);
  color: var(--brancoClaro);
  border: 1px solid var(--preto);
  border-radius: 20px;
  margin: 3vh 0 3vh;
  font-size: 1.5rem;
}

.submit input:hover {
  background-color: var(--brancoEscuro);
  color: var(--preto);
  border: 1px solid var(--preto);
}

@media screen and (max-width: 768px) {
  .desktop {
    display: none;
  }

  .mobile {
    display: inline-block;
    font-weight: 100;
  }

  .input {
    width: 60vw;
  }

  .submit input {
    width: 45vw;
  }

  #nome_completo {
    display: flex;
    margin-top: 10vh;
  }

  #nome {
    justify-content: center;
    align-items: center;
    margin-left: 9vw;
  }

  .confirmar_senha {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  #confirmarSenha {
    margin-left: 13vw;
  }
}
</style>
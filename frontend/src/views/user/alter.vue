<template>
  <link rel="stylesheet" href="/assets/css/cliente/clienteDados.css">

<div class="titulo">
  <h1>Seu cadastro</h1>
  <h2>dados da conta</h2>
</div>
<form>
  <div class="form">
    <aside>
      <div class="form-cadastro nome_completo">
        <label for="nome" class="input-label">Nome completo</label>
        <div>
          <input type="text" id="nome" autofocus v-model="user.nome" class="input" name="nome" minlength="10" maxlength="255" required />
        </div>
      </div>
      <div class="form-cadastro">
        <label for="cpf" class="input-label">cpf</label>
        <input type="text" id="cpf" class="input" v-model="user.cpf" name="cpf" autocomplete="off" maxlength="14" required />
      </div>
      <div class="form-cadastro">
        <label for="telefone" class="input-label">telefone</label>
        <input type="text" id="telefone" name="telefone" class="input" v-model="user.telefone" maxlength="14" required />
      </div>
      <div class="form-cadastro">
        <label for="Endereço" class="input-label">Endereço</label>
          <input type="text" id="endereco" name="endereco" class="input" v-model="user.endereco" maxlength="255" required />
      </div>
      <div class="form-cadastro">
          <label for="profissao" class="input-label">Profissão</label>
            <input type="text" id="profissao" name="profissao" class="input" v-model="user.profissao" required />
        </div>
    </aside>
    <aside>
        <div class="form-cadastro">
          <label for="renda" class="input-label">Renda</label>
          <input type="text" id="renda" class="input" name="renda" v-model="user.renda" required />
        </div>
        <div class="form-cadastro">
          <label for="email" class="input-label">Email</label>
            <input type="email" name="email" id="email" class="input" v-model="user.email" required />
        </div>
        <div class="form-cadastro">
          <label for="senha" class="input-label">Senha atual</label>
          <input type="password" name="senha" id="senha" class="input senha" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?!.*[ !@#$%^&*_=+-]).{6,40}$" title="A senha deve conter entre 6 a 40 caracteres, deve conter pelo menos uma letra maiúscula, um número e não deve conter símbolos." v-model="user.senha" required />
        </div>
      <div class="form-cadastro">
        <label for="senha" class="input-label">Nova senha</label>
        <input type="password" name="senha" id="senha" class="input senha" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?!.*[ !@#$%^&*_=+-]).{6,40}$" title="A senha deve conter entre 6 a 40 caracteres, deve conter pelo menos uma letra maiúscula, um número e não deve conter símbolos." data-tipo="senha" />
      </div>
      <div class="form-cadastro confirmar_senha">
        <label for="senha" class="input-label">Confirme a nova senha</label>
        <input type="password" id="senha" class="input senha" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?!.*[ !@#$%^&*_=+-]).{6,40}$" title="A senha deve conter entre 6 a 40 caracteres, deve conter pelo menos uma letra maiúscula, um número e não deve conter símbolos." data-tipo="compararSenha" />
    </div>
  </aside>
  </div>
  <div class="submit">
    <input type="submit" value="Atualizar cadastro" @click.prevent="atualizaUsuario()" class="enviar" />
  </div>
</form>
</template>

<script setup>
import { reactive } from 'vue';
import api from '../../services/api';

// const user = reactive({ nome: this.$store.state.usuario.nome, cpf: this.$store.state.usuario.cpf, email: this.$store.state.usuario.email, profissao: this.$store.state.usuario.profissao, renda: this.$store.state.usuario.renda, telefone: this.$store.state.usuario.telefone, endereco: this.$store.state.usuario.endereco
//  });

const user = reactive({ nome: 'moises', cpf: '035.035.160-00', email: 'moisesweber01@gmail.com', profissao: 'dev', renda: 'R$ 2.300,00', telefone: '(51) 99504-7834', endereco: 'smh'
  });

async function atualizaUsuario() {
  await api.put('atulizarUser', user).then(res => {
    console.log(res)
  }).catch(err => {
    console.log(err)
  })
}

</script>

<style scoped>

body {
  font-family: 'Lato', sans-serif;
}

.titulo {
  display: flex;
  flex-direction: column;
  align-items: center;
  color: var(--cinza);
  font-size: 30px;
  margin-bottom: 1%;
}

form {
  display: flex;
  flex-direction: column;
  min-height: 70vh;
  width: 100vw;
}

.form {
  display: flex;
}


.form-cadastro {
  display: flex;
  flex-direction: column;
  margin-left: 10vw;
}

.form-checkbox {
  margin-left: 10vw;
}

.input-label {
  font-size: 1.4rem;
}

.input {
  width: 30vw;
  height: 6vh;
  border-radius: .3rem;
}

.submit {
  display: flex;
  justify-content: center;
}

.submit input {
  height: 7vh;
  width: 20vw;
  background-color: var(--cinzaEscuro);
  color: var(--brancoClaro);
  border: 1px solid var(--cinzaEscuro);
  border-radius: 15px;
  margin: 2vh 0 2vh;
  font-size: 1.1rem;
}

.submit input:hover {
  background-color: var(--brancoEscuro);
  color: var(--preto);
  border: 1px solid var(--preto);
}

#senhas {
  display: none;
  justify-content: center;
}

.senha {
  width: 20vw;
}
</style>
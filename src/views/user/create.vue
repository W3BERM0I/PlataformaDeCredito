

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
          <input type="text" id="cpf" class="input" name="cpf" autocomplete="off" maxlength="14" v-model="user.cpf" v-mask-cpf required />
        </div>
        <div class="form-cadastro">
          <label for="telefone">telefone</label>
          <input type="text" id="telefone" name="telefone" class="input" maxlength="15" v-model="user.telefone" v-mask-phone.br required />
        </div>
        <div class="form-cadastro">
          <label for="Endereço">Endereço</label>
          <input type="text" id="endereco" name="endereco" v-model="user.endereco" class="input" maxlength="255" required />
        </div>
        <div class="form-cadastro">
          <label for="profissao">Profissão</label>
          <input type="text" id="profissao" name="profissao" class="input" required />
        </div>
        <div class="form-cadastro">
          <label for="renda">Renda</label>
          <input type="text" id="renda" class="input" name="renda" v-model="user.renda" v-mask-decimal.br="2" data-tipo="preco" required />
        </div>
        <div class="form-cadastro">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="input" required />
        </div>
        <div class="form-cadastro">
          <label for="senha">Senha</label>
          <input type="password" name="senha" id="senha" class="input" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?!.*[ !@#$%^&*_=+-]).{6,40}$" title="A senha deve conter entre 6 a 40 caracteres, deve conter pelo menos uma letra maiúscula, um número e não deve conter símbolos." data-tipo="senha" required />
        </div>
        <div class="form-cadastro confirmar_senha">
          <label for="senha">Confirme a senha</label>
          <input type="password" id="confirmarSenha" class="input" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?!.*[ !@#$%^&*_=+-]).{6,40}$" title="A senha deve conter entre 6 a 40 caracteres, deve conter pelo menos uma letra maiúscula, um número e não deve conter símbolos." data-tipo="compararSenha" required />
        </div>
        <div class="submit">
          <input type="submit" value="Criar Conta" class="enviar" />
        </div>
      </form>
    </div>
  </main>
</template>


<script>


export default {
  data() {
    return {
      user: {nome: "", cpf: "", telefone: "", endereco: "", profissao: "", renda: "", email: "", senha: "", confirmarSenha: ""}
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
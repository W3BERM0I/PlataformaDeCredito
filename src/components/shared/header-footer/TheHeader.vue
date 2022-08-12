<template>
    <header class="cabecalhoPrincipal" id="principalHeader">
    <div class="container">
      <h1 v-show="usuarioestaLogado"><router-link to="/home">CredEasy</router-link></h1>
      <h1 v-show="!usuarioestaLogado"><router-link to="/">CredEasy</router-link></h1>
      <div class="dropdown"  v-if="usuarioestaLogado">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
          Olá, {{ primeiroNome }}
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
          <li><router-link class="dropdown-item" to="">Meu Perfil</router-link></li>
          <li><a class="dropdown-item" href="#" @click.prevent="efetuarLogout">Sair</a></li>
        </ul>
      </div>
       <div v-show="!usuarioestaLogado"> <router-link to="entrar" class="entrar-link">Entrar</router-link></div>
    </div>
  </header> 
</template>

<script>
import api from '../../../services/api'
export default {
  methods: {
    efetuarLogout () {
      this.$store.commit('DESLOGAR_USUARIO')
      api.get('deslogar');
      this.$router.push({ name: 'Entrar'})

    }
  },
  computed: {
    usuarioestaLogado () {
      return Boolean(this.$store.state.token)
    },
    primeiroNome () {
      return (this.$store.state.usuario.nome.split(' '))[0]
    }
  }
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,700;1,900&display=swap');

.cabecalhoPrincipal .container {
  max-width: 100%;
  width: 100%;
  height: 12vh;
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-family: 'Lato';
  background-color: var(--verdeClaro);
}


.container {
  display: flex;
  justify-content: space-between;
  box-sizing: border-box;
  width: 100%;
  margin-left: 0;
}

.container>nav {
  display: flex;
  padding: 2vw;
}

.container>h1 {
  margin: 1vh 0 1vh 2vw;
  font-style: none;
  border-style: none;
}

.container>h1>a {
  width: 3.5vw;
  height: 3.5vh;
  padding: 0.4rem;
  color: var(--brancoClaro);
  font-style: none;
  text-decoration: none;
  font-size: 2.2rem;
  font-weight: 700;
  border: 0.2rem solid var(--brancoClaro);
  border-radius: 100px;

}

.container>h1>a:hover {
  background-color: var(--verdeClaro);
  color: var(--brancoClaro);
}
  .entrar-link {
    color: var(--brancoClaro);
    text-decoration: none;
    font-size: 2rem;
    font-weight: 600;
  }

.container__item {
  padding: 1vw;
  margin-right: .25vw;
  font-style: none;
  text-align: center;
  font-family: 'Lato', sans-serif;
  color: var(--brancoClaro);
  text-decoration: none;
  font-size: 2rem;
  font-weight: 700;
}

.container__item:nth-last-of-type(1) {
  margin-right: 2vw;
}

.container__item:hover {
  color: var(--verdeClaro);
  transform: 1s;
}

#dropdownMenu2 {
  color: var(--verdeClaro);
  background-color: var(--brancoEscuro);
  margin-right: 2vw;
  border: 2px solid var(--verdeClaro);
  border-radius: 20%;
}

@media screen and (max-width: 768px) {
  .container>h1>a {
    font-size: 1.5rem;
  }

  .container__item {
    font-size: 1.5rem;
  }
}
</style>
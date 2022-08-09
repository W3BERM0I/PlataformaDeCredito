import { createStore } from 'vuex'
import api from './services/api.js'

const estado = {
  token: 3,
  usuario: {
    nome: 'moises'
  }
}

const mutations = {
  DEFINIR_USUARIO_LOGADO (state, { token }) {
    state.token = token
  },
  DESLOGAR_USUARIO (state) {
    state.token = null
    state.usuario = {}
  }
}

const actions = {
  efetuarLogin({ commit }, usuario) {
    return new Promise((resolve, reject) => {
      console.log(usuario)
      api.post('entrar', usuario).then(res => {
        commit('DEFINIR_USUARIO_LOGADO', {
          token: res.data.access_token,
          usuario: res.data.user
        }) 
        resolve(res.data)
      }).catch(err => {
        console.log(err)
        reject(err)
      })
    })
  }
}

export default new createStore({
  state: estado,
  mutations,
  actions
})

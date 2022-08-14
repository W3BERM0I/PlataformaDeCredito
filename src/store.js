import { createStore } from 'vuex'
import api from './services/api.js'


const estado = {
  token: null,
  usuario: {
  }
}

const mutations = {
  DEFINIR_USUARIO_LOGADO (state, { token, usuario }) {
    state.token = token
    state.usuario = usuario
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
      api.post('entrar', usuario).then((res) => {
        commit('DEFINIR_USUARIO_LOGADO', {
          token: res.data.token,
          usuario: res.data.usuario
        }) 
        resolve(res.data)
      }).catch(err => {
        console.log(err)
        reject(err)
      })
    })
  },
  criarEmprestimo(emprestimo) {
    console.log(emprestimo)
    return new Promise((resolve, reject) => {
      api.post('emprestimo', emprestimo).then((res) => {
        console.log(res);
        resolve(emprestimo)
      }).catch(err => {
        console.log(err.code)
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

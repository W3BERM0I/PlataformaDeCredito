import axios from "axios";
import store from "../store";
import { useLoading } from 'vue-loading-overlay';
import { withDirectives } from "vue";

const api = axios.create({
  baseURL: "http://127.0.0.1:8000/api/",
  headers: {
    'Accept': 'application/json',
    'Content': 'application/json'
  }
});

let loading = useLoading({
  color: '#27ca94c4',
  height: '55%',
  width: '55%'
});

api.interceptors.request.use(function (config) {
  let spinner = loading.show();
  config.spinner = spinner;
  const token = store.state.token
  if (token){
    config.headers.Authorization = `Bearer ${token}`
  }
  return config;
}, function (erro) {
  return Promise.reject(erro)
})

api.interceptors.response.use( function(resposta) {
  resposta.config.spinner.hide();
  return resposta;
}, function(erro) {
  let spinner = erro.config.spinner.hide();
})

export default api;
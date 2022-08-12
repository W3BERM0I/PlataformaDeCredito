import axios from "axios";
import store from "../store";

const api = axios.create({
  baseURL: "http://127.0.0.1:8000/api/",
  headers: {
    'Accept': 'application/json',
    'Content': 'application/json'
  }
});

api.interceptors.request.use(function (config) {
  const token = store.state.token
  if (token){
    config.headers.Authorization = `Bearer ${token}`
  }
  return config;
}, function (erro) {
  return Promise.reject(erro)
})

export default api;
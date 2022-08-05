import { createRouter, createWebHistory } from 'vue-router'
import home from '../views/HomeView.vue'
import criarEmprestimo from '../views/emprestimo/CriarEmprestimo.vue'
import emprestimosCliente from '../views/emprestimo/ListaEmprestimoCliente.vue'
import emprestimo from '../views/emprestimo/Emprestimo.vue'
import diretor from '../views/diretor/IndexDiretor.vue';
import index from '../views/index.vue'
import indexGestor from '../views/gestor/IndexGestor.vue'
import entrar from '../views/login/index.vue'
import cadastrar from '../views/user/create.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/home',
      name: 'home',
      component: home
    },
    {
      path: '/',
      name: 'index',
      component: index
    },
      {
        path: '/CriaEmprestimo',
        name: 'CriaEmprestimo',
        component: criarEmprestimo
      },
     {
       path: '/ListaEmprestimos',
       name: 'ListaEmprestimos',
       component: emprestimosCliente
     },
     {
       path: '/Emprestimo/:id',
       name: 'Emprestimo',
       component: emprestimo
     },
     {
       path: '/AcoesDiretor',
       name: 'AcoesDiretor',
       component: diretor
     },
     {
      path: '/IndexGestor',
      name: 'IndexGestor',
      component: indexGestor
     },
     {
      path: '/entrar',
      name: 'Entrar',
      component: entrar
     },
     {
      path: '/cadastrar',
      name: 'Cadastrar',
      component: cadastrar
     }
  ]
})

export default router

<template>
 <main>
    <div class="lista_emprestimos">
      <div class="titulo">
        <h1>Usuarios</h1>
      </div>
      <table class="table table-borderless">
        <thead class="tbhead">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">nome</th>
            <th scope="col">Renda</th>
            <th scope="col">CPF</th>
            <th scope="col">TIPO USUARIO</th>
            <th scope="col">ATUALIZAR CARGO</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(user, index) in users" :key="index">
            <th scope="row">{{user.id}}</th>
            <td>{{user.nome}}</td>
            <td>R$ {{user.renda}}</td>
            <td>{{user.cpf}}</td>
            <td>{{user.tipo_usuario}}</td>
            <td>
              <Form @submit.prevent="alteraTipoGestor()" method="POST">
                <div class="form-gestor">
                  <select class="form-select" name="tipo_usuario" aria-label="Default select example" id="tipo_usuario" required>
                    <option value="COMUN">Comun</option>
                    <option value="GESTOR">Gestor</option>
                    <option value="DIRETOR">Diretor</option>
                  </select>
                  <input type="text" name="id" style="display: none;" value="index">
                  <button class="btn btn-success" type="submit">Atualizar</button>
                </div>
              </Form>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </main>
</template>

<script setup>
import api from '../../services/api';
import { ref } from 'vue';

const users = ref([]);
api.get('usuarios').then((res) => {
  users.value = res.data;
})

</script>

<script>
 
 export default {
    data() {
      return {
      }
    }
  };

  function alteraTipoGestor(tipo) {
    user.tipo_usuario = tipo;
  }
</script>

<style scoped>
main {
  min-height: 80vh;
}

.titulo {
  text-align: center;
  font-weight: 700;
  font-size: 40px;
  color: var(--cinza)
}

.form-gestor {
  display: flex;
}

.form-gestor>select {
  width: 40%;
  margin-right: 1vw;
}
</style>
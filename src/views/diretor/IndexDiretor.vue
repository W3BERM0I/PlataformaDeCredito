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
    <h2 v-if="semUsuarios()" class="flag">Não ha usuarios</h2>
    </div>
  </main>
</template>



<script>
 import api from '../../services/api'

  export default {
    data() {
      return {
        users: [],
      }
    },
    created() {
        api.get('usuarios').then((res) => {
        this.users = res.data;
       });
    },
    methods: {
      semUsuarios() {
        return Boolean(this.users.length == 0);
      },
    }
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

.flag {
  font-size: 30px;
  font-weight: 700;
  color: var(--cinza);
  text-align: center;
  margin-top: 1%;
}
</style>
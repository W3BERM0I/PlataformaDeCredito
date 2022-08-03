<template>
  <div class="missaoVisaoValores__card">
        <h2 class="missaoVisaoValores__titulo">{{ titulo}}</h2>
        <ol class="valores__lista">
          <li class="valores__items" v-for="(item, index) in items" :key="index">♦ {{item}}</li>
        </ol>
      </div>
</template>

<script>
export default {

  props: {
    titulo: {
      required: true,
      type: String
    },
    items: {
      required: true,
      type: Array
    }
  }
}

</script>

<style scoped>
.missaoVisaoValores__card {
  min-width: 33.3%;
  min-height: 60%;
  background-color: var(--brancoClaro);
  border: none;
  border-radius: 10%;
  margin-right: 1vw;
  margin-bottom: 2%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  box-sizing: content-box;
  
}

.missaoVisaoValores__titulo {
  font-size: 2rem;
  margin: 2vh 0 2vh 0;
  color: var(--verdeClaro);
}

.valores__items {
  margin: 2vh 1vw 2vh 1vw;
  color: var(--cinza);
  padding: 1px;
  font-size: 1.2rem;
}

.valores__lista {
  display: flex;
  flex-direction: column;
}

</style>
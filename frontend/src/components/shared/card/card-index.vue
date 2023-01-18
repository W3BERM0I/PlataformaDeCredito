<template>
  <div class="solucoes__cred">
      <h3 class="solucoes__titulo">{{ titulo }}</h3>
      <p class="solucoes__texto" >{{ texto }}</p>
      <button class="solucoes__button">Saiba mais</button>
    </div>
</template>

<script>

export default {

  props: {
    titulo: {
      required: true,
      type: String
    },
    texto: {
      required: true,
      type: String
    }
  }
}

</script>

<style scoped>
  
.solucoes__cred {
  background-color: var(--brancoClaro);
  color: var(--preto);
  min-height: 50vh;
  width: 29%;
  margin: 5vh 0.5vw 0vh;
  border-radius: 25px;
  border: 2px solid var(--preto);
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.solucoes__titulo {
  font-size: 2rem;
  margin-bottom: 3%;
}
    
.solucoes__texto {
  font-weight: 400;
  font-size: 1.3rem;
  margin-bottom: 10%; 
  margin-left: 10%;
}

.solucoes__button {
  width: 20vw;
  border: none;
  font-size: 1rem;
  font-weight: bold;
  color: var(--brancoClaro);
  padding: 0.7rem;
  background-color: var(--preto);
  border-radius: 25px;
}
</style>
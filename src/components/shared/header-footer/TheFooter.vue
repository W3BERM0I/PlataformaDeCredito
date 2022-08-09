<template>
  <footer class="footer">
      <div class="propaganda">
      </div>
      <div class="info-footer">
        <p>Group CredEasy by Moisés Weber</p>
        <p>© copyright</p>
      </div>
    </footer>
</template>


<style scoped>
.footer {
  height: 20vh;
  width: 100%;
  display: flex;
  flex-direction: column;
  justify-content: end;
  margin-bottom: 2vh;
  background-color: var(--preto);
}

.info-footer {
  display: flex;
  flex-direction: column;
}

.info-footer>p {
  text-align: center;
  align-items: right;
  color: var(--brancoClaro);
}

.info-footer>p:nth-of-type(2) {
  margin-bottom: 2vh;
}
</style>
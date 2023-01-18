<template>
  <TheHeader/>
  <RouterView />
  <TheFooter />
</template>

<script>
import TheFooter from "./components/shared/header-footer/TheFooter.vue";
import TheHeader from "./components/shared/header-footer/TheHeader.vue";

export default {
  components: {
    TheFooter,
    TheHeader
}
}
</script>

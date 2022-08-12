import { createApp } from 'vue'
import VueMask from '@devindex/vue-mask'
import App from './App.vue'
import router from './router'
import store from './store'

const app = createApp(App)
app.use(VueMask)
app.use(router)
app.use(store)
app.mount('#app')



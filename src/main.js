import { createApp } from 'vue'
import VueMask from '@devindex/vue-mask'
import App from './App.vue'
import router from './router'
import provedor from './provedor'

const app = createApp(App)
app.use(VueMask)
app.use(router)
app.use(provedor)
app.mount('#app')



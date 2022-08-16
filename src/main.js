import { createApp } from 'vue'
import VueMask from '@devindex/vue-mask'
import VueLoading from 'vue-loading-overlay'
import App from './App.vue'
import router from './router'
import store from './store'


import 'vue-loading-overlay/dist/vue-loading.css';

const app = createApp(App)
app.use(VueMask)
app.use(router)
app.use(store)
app.use(VueLoading)
app.mount('#app')



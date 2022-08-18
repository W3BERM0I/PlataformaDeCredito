import { createApp } from 'vue'
import VueMask from '@devindex/vue-mask'
import VueLoading from 'vue-loading-overlay'
import App from './App.vue'
import router from './router'
import store from './store'
import Toaster from "@meforma/vue-toaster"


import 'vue-loading-overlay/dist/vue-loading.css';

const app = createApp(App)
app.use(VueMask)
app.use(router)
app.use(store)
app.use(VueLoading)
app.use(Toaster)
app.mount('#app')



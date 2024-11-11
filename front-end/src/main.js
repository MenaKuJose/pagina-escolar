import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'

// Importa los estilos CSS de Bootstrap
import 'bootstrap/dist/css/bootstrap.min.css';

// Importa el JavaScript de Bootstrap
import 'bootstrap';

createApp(App).use(store).use(router).mount('#app')

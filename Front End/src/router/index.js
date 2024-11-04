// src/router/index.js
import { createRouter, createWebHistory } from 'vue-router';
import Dashboard from '../components/TheWelcome.vue';
import OfertasTable from '../components/OfertasTable.vue';
import UsuariosTable from '../components/UsuariosTable.vue';

const routes = [
  { path: '/', name: 'Dashboard', component: Dashboard },
  { path: '/ofertas', name: 'Ofertas', component: OfertasTable },
  { path: '/usuarios', name: 'Usuarios', component: UsuariosTable },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;

// src/router/index.js
import { createRouter, createWebHistory } from 'vue-router';
import HomePage from '../pages/MainPage.vue';
import SalePage from '../pages/SalesPage.vue';

const routes = [
  { path: '/', component: HomePage },
  { path: '/sales', component: SalePage },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;

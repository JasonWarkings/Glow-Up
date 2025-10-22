import { createRouter, createWebHistory } from 'vue-router';
import MainPage from '../pages/MainPage.vue';
import SalesPage from '../pages/SalesPage.vue';
import CatalogPage from '../pages/CatalogPage.vue';
import RegisterPage from '../pages/RegisterPage.vue'
import ProfilePage from '../pages/ProfilePage.vue'


 




const routes = [
  { path: '/', name: 'Home', component: MainPage },
  { path: '/sales', name: 'Sales', component: SalesPage },
  { path: '/catalog', name: 'Catalog', component: CatalogPage },
  { path: '/register', name: 'Register', component: RegisterPage },
  { path: '/profile', name: 'Profile', component: ProfilePage }
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;

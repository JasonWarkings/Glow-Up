import { createRouter, createWebHistory } from 'vue-router'

// Импорт всех страниц
import Home from '../views/Home.vue'
import Catalog from '../views/Catalog.vue'
import Sales from '../views/Sales.vue'
import New from '../views/New.vue'
import Delivery from '../views/Delivery.vue'
import Payment from '../views/Payment.vue'
import About from '../views/About.vue'
import Favorites from '@/views/Favorites.vue'
import Cart from '../views/Cart.vue'
import CategoryBodycare from '../views/CategoryBodycare.vue'
import CategoryHaircare from '../views/CategoryHaircare.vue'
import CategoryMakeup from '../views/CategoryMakeup.vue'
import CategoryMen from '../views/CategoryMen.vue'
import CategoryPerfume from '../views/CategoryPerfume.vue'
import CategorySkincare from '../views/CategorySkincare.vue'
import Profile from '../views/Profile.vue'
import Login from '../views/Login.vue'
import Checkout from '../views/Checkout.vue'
import Register from '../views/Register.vue'


const routes = [
  { path: '/', name: 'Home', component: Home },
  { path: '/catalog', name: 'Catalog', component: Catalog },
  { path: '/sales', name: 'Sales', component: Sales },
  { path: '/new', name: 'New', component: New },
  { path: '/delivery', name: 'Delivery', component: Delivery },
  { path: '/payment', name: 'Payment', component: Payment },
  { path: '/about', name: 'About', component: About },
  { path: '/profile', name: 'Profile', component: Profile },
  { path: '/favorites', name: 'Favorites', component: Favorites },
  { path: '/cart', name: 'Cart', component: Cart },
  { path: '/categoryBodycare', name: 'CategoryBodycare', component: CategoryBodycare},
 { path: '/categoryHaircare', name: 'CategoryHaircare', component: CategoryHaircare},
 { path: '/categoryMakeup.vue', name: 'CategoryMakeup', component: CategoryMakeup},
 { path: '/categoryMen', name: 'CategoryMen', component: CategoryMen},
 { path: '/categoryPerfume', name: 'CategoryPerfume', component: CategoryPerfume},
 { path: '/categorySkincare', name: 'CategorySkincare', component: CategorySkincare},
  { path: '/login', name: 'Login', component: Login },
    { path: '/checkout', name: 'Checkout', component: Checkout },
    { path: '/register', name: 'Register', component: Register },


]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router

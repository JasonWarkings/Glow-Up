<template>
  <div class="min-h-screen bg-gray-50">

    <Banner />
    <Categories />
    <PromoSection />
    <Brands />
 
  </div>
</template>

<script>
import Header from '../components/Header.vue'
import Banner from '../components/Banner.vue'
import Categories from '../components/Categories.vue'
import PromoSection from '../components/PromoSection.vue'
import Sales from './Sales.vue'
import New from './New.vue'
import Footer from '../components/Footer.vue'
import Payment from './Payment.vue'
import Profile from './Profile.vue'
import About from './About.vue'
import CategoryBodycare from './CategoryBodycare.vue'
import CategoryHaircare from './CategoryHaircare.vue'
import CategoryMakeup from './CategoryMakeup.vue'
import CategoryMen from './CategoryMen.vue'
import CategoryPerfume from './CategoryPerfume.vue'
import CategorySkincare from './CategorySkincare.vue'


export default {
  name: 'Home',
  components: {
    Header,
    Banner,
    Categories,
    Sales,
    New,
    Payment,
    Profile,
    About,
    CategoryBodycare,
    CategoryHaircare,
    CategoryMakeup,
    CategoryMen,
    CategorySkincare,
    CategoryPerfume,
    PromoSection,

    Footer
  },
  data() {
    return {
      cart: [],
      favorites: []
    }
  }
}
</script>
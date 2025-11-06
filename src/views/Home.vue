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
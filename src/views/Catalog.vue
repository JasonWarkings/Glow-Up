<template>
  <div class="min-h-screen bg-gray-50">
   
    <section class="max-w-7xl mx-auto px-4 py-12">
      <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-8">Каталог</h1>
      <div class="bg-white rounded-xl p-12 text-center">
        <p class="text-xl text-gray-600">Здесь будет каталог товаров</p>
      </div>
    </section>
 
  </div>
</template>

<script>
import Header from '../components/Header.vue'
import Footer from '../components/Footer.vue'

export default {
  name: 'Catalog',
  components: {
    Header,
    Footer
  }
}
</script>
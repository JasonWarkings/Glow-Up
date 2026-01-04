<template>
  <div class="min-h-screen bg-gray-50">
  
    
    <section class="max-w-7xl mx-auto px-4 py-12">
      <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">🔥 Акции</h1>
      <p class="text-gray-600 mb-8">Скидки до 50% на популярные товары</p>
      <div class="bg-gradient-to-r from-pink-500 to-purple-600 rounded-xl p-12 text-center text-white">
        <p class="text-xl">Здесь будут акционные товары</p>
      </div>
    </section>
    
    
  </div>
</template>

<script>
import Header from '../components/Header.vue'
import Footer from '../components/Footer.vue'

export default {
  name: 'Sales',
  components: {
    Header,
    Footer
  }
}
</script>
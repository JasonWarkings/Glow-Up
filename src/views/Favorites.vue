<template>
  <div class="min-h-screen bg-gray-50">
  
    <section class="max-w-7xl mx-auto px-4 py-12">
      <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-8">❤️ Избранное</h1>
      <div class="bg-white rounded-xl p-12 text-center">
        <span class="text-6xl mb-4 block">❤️</span>
        <h2 class="text-2xl font-bold mb-4">Список избранного пуст</h2>
        <router-link to="/catalog">
          <button class="bg-pink-600 text-white px-8 py-3 rounded-full hover:bg-pink-700 transition">
            Перейти в каталог
          </button>
        </router-link>
      </div>
    </section>
    
 
  </div>
</template>

<script>
import Header from '../components/Header.vue'
import Footer from '../components/Footer.vue'

export default {
  name: 'Favorites',
  components: { Header, Footer }
}
</script>
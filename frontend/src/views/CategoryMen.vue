<template>
  <div class="min-h-screen bg-gray-50">
    <Header :cartCount="0" :favoritesCount="0" />

    <section class="max-w-7xl mx-auto px-4 py-12">
      <div class="mb-8">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">🧔 Для мужчин</h1>
        <p class="text-gray-600">Профессиональный мужской уход</p>
      </div>

      <!-- Фильтры -->
      <div class="bg-white rounded-xl p-6 mb-8">
        <h3 class="font-bold mb-4">Категории</h3>
        <div class="flex flex-wrap gap-3">
          <button class="px-4 py-2 rounded-full bg-pink-100 text-pink-600 hover:bg-pink-200 transition">
            Все товары
          </button>
          <button class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 hover:bg-gray-200 transition">
            Уход за лицом
          </button>
          <button class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 hover:bg-gray-200 transition">
            Для бритья
          </button>
          <button class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 hover:bg-gray-200 transition">
            Парфюмерия
          </button>
          <button class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 hover:bg-gray-200 transition">
            Уход за телом
          </button>
        </div>
      </div>
    </section>

    <Footer />
  </div>
</template>

<script>
import Header from '../components/Header.vue'
import Footer from '../components/Footer.vue'

export default {
  name: 'CategoryMen',
  components: { Header, Footer }
}
</script>

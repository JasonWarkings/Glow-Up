<template>
  <div class="min-h-screen bg-gray-50">
    <Header :cartCount="0" :favoritesCount="0" />

    <section class="max-w-7xl mx-auto px-4 py-12">
      <div class="mb-8">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">💇‍♀️ Уход за волосами</h1>
        <p class="text-gray-600">Средства для здоровых и красивых волос</p>
      </div>

      <!-- Фильтры -->
      <div class="bg-white rounded-xl p-6 mb-8">
        <h3 class="font-bold mb-4">Категории ухода</h3>
        <div class="flex flex-wrap gap-3">
          <button class="px-4 py-2 rounded-full bg-pink-100 text-pink-600 hover:bg-pink-200 transition">
            Все товары
          </button>
          <button class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 hover:bg-gray-200 transition">
            Шампуни
          </button>
          <button class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 hover:bg-gray-200 transition">
            Кондиционеры
          </button>
          <button class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 hover:bg-gray-200 transition">
            Маски
          </button>
          <button class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 hover:bg-gray-200 transition">
            Стайлинг
          </button>
        </div>
      </div>

      <!-- Популярные бренды -->
      <div class="bg-white rounded-xl p-6">
        <h3 class="font-bold mb-4">Популярные бренды</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
          <div class="border rounded-lg p-4 text-center hover:shadow-md transition cursor-pointer">
            <p class="font-semibold text-sm">L'Oreal</p>
          </div>
          <div class="border rounded-lg p-4 text-center hover:shadow-md transition cursor-pointer">
            <p class="font-semibold text-sm">Schwarzkopf</p>
          </div>
          <div class="border rounded-lg p-4 text-center hover:shadow-md transition cursor-pointer">
            <p class="font-semibold text-sm">Dove</p>
          </div>
          <div class="border rounded-lg p-4 text-center hover:shadow-md transition cursor-pointer">
            <p class="font-semibold text-sm">Kerastase</p>
          </div>
          <div class="border rounded-lg p-4 text-center hover:shadow-md transition cursor-pointer">
            <p class="font-semibold text-sm">Pantene</p>
          </div>
          <div class="border rounded-lg p-4 text-center hover:shadow-md transition cursor-pointer">
            <p class="font-semibold text-sm">Wella</p>
          </div>
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
  name: 'CategoryHair',
  components: { Header, Footer }
}
</script>

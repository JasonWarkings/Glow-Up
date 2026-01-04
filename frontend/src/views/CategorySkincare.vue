<template>
  <div class="min-h-screen bg-gray-50">
    <Header :cartCount="0" :favoritesCount="0" />

    <section class="max-w-7xl mx-auto px-4 py-12">
      <div class="mb-8">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">✨ Уход за кожей</h1>
        <p class="text-gray-600">Косметика для здоровой и сияющей кожи</p>
      </div>

      <!-- Фильтры -->
      <div class="bg-white rounded-xl p-6 mb-8">
        <h3 class="font-bold mb-4">Категории ухода</h3>
        <div class="flex flex-wrap gap-3">
          <button class="px-4 py-2 rounded-full bg-pink-100 text-pink-600 hover:bg-pink-200 transition">
            Все товары
          </button>
          <button class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 hover:bg-gray-200 transition">
            Увлажнение
          </button>
          <button class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 hover:bg-gray-200 transition">
            Очищение
          </button>
          <button class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 hover:bg-gray-200 transition">
            Антивозрастной уход
          </button>
          <button class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 hover:bg-gray-200 transition">
            Сыворотки
          </button>
          <button class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 hover:bg-gray-200 transition">
            Маски
          </button>
        </div>
      </div>

      <!-- Популярные бренды -->
      <div class="bg-white rounded-xl p-6">
        <h3 class="font-bold mb-4">Популярные бренды</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
          <div class="border rounded-lg p-4 text-center hover:shadow-md transition cursor-pointer">
            <p class="font-semibold text-sm">La Roche-Posay</p>
          </div>
          <div class="border rounded-lg p-4 text-center hover:shadow-md transition cursor-pointer">
            <p class="font-semibold text-sm">Vichy</p>
          </div>
          <div class="border rounded-lg p-4 text-center hover:shadow-md transition cursor-pointer">
            <p class="font-semibold text-sm">CeraVe</p>
          </div>
          <div class="border rounded-lg p-4 text-center hover:shadow-md transition cursor-pointer">
            <p class="font-semibold text-sm">The Ordinary</p>
          </div>
          <div class="border rounded-lg p-4 text-center hover:shadow-md transition cursor-pointer">
            <p class="font-semibold text-sm">Neutrogena</p>
          </div>
          <div class="border rounded-lg p-4 text-center hover:shadow-md transition cursor-pointer">
            <p class="font-semibold text-sm">Bioderma</p>
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
  name: 'CategorySkincare',
  components: { Header, Footer }
}
</script>

<template>
  <div class="min-h-screen bg-gray-50">
    <Header :cartCount="0" :favoritesCount="0" />

    <section class="max-w-7xl mx-auto px-4 py-12">
      <div class="mb-8">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">💄 Макияж</h1>
        <p class="text-gray-600">Косметика для вашего образа</p>
      </div>

      <!-- Фильтры -->
      <div class="bg-white rounded-xl p-6 mb-8">
        <h3 class="font-bold mb-4">Категории</h3>
        <div class="flex flex-wrap gap-3">
          <button class="px-4 py-2 rounded-full bg-pink-100 text-pink-600 hover:bg-pink-200 transition">
            Все товары
          </button>
          <button class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 hover:bg-gray-200 transition">
            Для глаз
          </button>
          <button class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 hover:bg-gray-200 transition">
            Для губ
          </button>
          <button class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 hover:bg-gray-200 transition">
            Тональная основа
          </button>
        </div>
      </div>

      <!-- Популярные бренды -->
      <div class="bg-white rounded-xl p-6 mb-8">
        <h3 class="font-bold mb-4">Популярные бренды</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
          <div class="border rounded-lg p-4 text-center hover:shadow-md transition cursor-pointer">
            <p class="font-semibold text-sm">MAC</p>
          </div>
          <div class="border rounded-lg p-4 text-center hover:shadow-md transition cursor-pointer">
            <p class="font-semibold text-sm">Maybelline</p>
          </div>
          <div class="border rounded-lg p-4 text-center hover:shadow-md transition cursor-pointer">
            <p class="font-semibold text-sm">L'Oreal</p>
          </div>
          <div class="border rounded-lg p-4 text-center hover:shadow-md transition cursor-pointer">
            <p class="font-semibold text-sm">NYX</p>
          </div>
        </div>
      </div>

      <!-- Заглушки товаров -->
      <div class="bg-white rounded-xl p-6">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
          <div v-for="i in 8" :key="i" class="border rounded-xl p-4 hover:shadow-lg transition">
            <div class="bg-gray-100 rounded-lg h-48 mb-4 flex items-center justify-center">
              <span class="text-gray-400 text-4xl">💄</span>
            </div>
            <p class="text-xs text-gray-500 mb-1">Бренд</p>
            <h4 class="font-semibold mb-2">Название товара</h4>
            <div class="flex items-center gap-2">
              <span class="text-lg font-bold">--- ₽</span>
            </div>
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
  name: 'CategoryMakeup',
  components: { Header, Footer }
}
</script>

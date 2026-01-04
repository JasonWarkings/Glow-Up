<template>
  <div class="min-h-screen bg-gray-50">
    <Header :cartCount="0" :favoritesCount="0" />

    <section class="max-w-7xl mx-auto px-4 py-12">
      <div class="mb-8">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">🌸 Парфюмерия</h1>
        <p class="text-gray-600">Ароматы для особенных моментов</p>
      </div>

      <!-- Фильтры -->
      <div class="bg-white rounded-xl p-6 mb-8">
        <h3 class="font-bold mb-4">Типы ароматов</h3>
        <div class="flex flex-wrap gap-3">
          <button class="px-4 py-2 rounded-full bg-pink-100 text-pink-600 hover:bg-pink-200 transition">
            Все ароматы
          </button>
          <button class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 hover:bg-gray-200 transition">
            Для женщин
          </button>
          <button class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 hover:bg-gray-200 transition">
            Для мужчин
          </button>
          <button class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 hover:bg-gray-200 transition">
            Унисекс
          </button>
          <button class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 hover:bg-gray-200 transition">
            Цветочные
          </button>
          <button class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 hover:bg-gray-200 transition">
            Восточные
          </button>
        </div>
      </div>

      <!-- Популярные бренды -->
      <div class="bg-white rounded-xl p-6">
        <h3 class="font-bold mb-4">Популярные бренды</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
          <div class="border rounded-lg p-4 text-center hover:shadow-md transition cursor-pointer">
            <p class="font-semibold text-sm">Chanel</p>
          </div>
          <div class="border rounded-lg p-4 text-center hover:shadow-md transition cursor-pointer">
            <p class="font-semibold text-sm">Dior</p>
          </div>
          <div class="border rounded-lg p-4 text-center hover:shadow-md transition cursor-pointer">
            <p class="font-semibold text-sm">Gucci</p>
          </div>
          <div class="border rounded-lg p-4 text-center hover:shadow-md transition cursor-pointer">
            <p class="font-semibold text-sm">Tom Ford</p>
          </div>
          <div class="border rounded-lg p-4 text-center hover:shadow-md transition cursor-pointer">
            <p class="font-semibold text-sm">Versace</p>
          </div>
          <div class="border rounded-lg p-4 text-center hover:shadow-md transition cursor-pointer">
            <p class="font-semibold text-sm">Yves Saint Laurent</p>
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
  name: 'CategoryPerfume',
  components: { Header, Footer }
}
</script>

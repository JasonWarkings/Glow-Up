<template>
  <section class="max-w-7xl mx-auto px-4 py-12">
    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-8">Популярные категории</h2>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
      <div 
        v-for="(category, index) in categories"
        :key="index"
        class="bg-white rounded-xl p-6 text-center hover:shadow-lg transition cursor-pointer"
      >
        <div class="bg-gradient-to-br from-pink-100 to-purple-100 w-20 h-20 rounded-full mx-auto mb-4 flex items-center justify-center">
          <span class="text-3xl">{{ category.icon }}</span>
        </div>
        <h3 class="font-medium text-gray-900 text-sm">{{ category.name }}</h3>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'Categories',
  data() {
    return {
      categories: [
        { name: 'Уход за кожей', icon: '✨' },
        { name: 'Макияж', icon: '💄' },
        { name: 'Парфюмерия', icon: '🌸' },
        { name: 'Уход за волосами', icon: '💆' },
        { name: 'Для тела', icon: '🧴' },
        { name: 'Для мужчин', icon: '🧔' }
      ]
    }
  }
}
</script>
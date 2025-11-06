<template>
  <section class="max-w-7xl mx-auto px-4 py-12">
    <div class="flex justify-between items-center mb-8">
      <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Хиты продаж</h2>
      <a href="#" class="text-pink-600 hover:text-pink-700 font-medium flex items-center gap-2">
        Все товары
        <ChevronRight :size="20" />
      </a>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
      <div 
        v-for="product in products"
        :key="product.id"
        class="bg-white rounded-xl overflow-hidden hover:shadow-lg transition"
      >
        <!-- Изображение товара -->
        <div class="relative">
          <img 
            :src="product.image" 
            :alt="product.name"
            class="w-full h-48 md:h-64 object-cover"
          />
          <button 
            @click="$emit('toggle-favorite', product.id)"
            class="absolute top-2 right-2 p-2 bg-white rounded-full hover:bg-gray-100 transition"
          >
            <Heart 
              :size="20" 
              :class="favorites.includes(product.id) ? 'fill-pink-500 text-pink-500' : 'text-gray-700'"
            />
          </button>
          <div v-if="product.oldPrice" class="absolute top-2 left-2 bg-red-500 text-white px-2 py-1 rounded-full text-xs font-bold">
            -{{ Math.round((1 - product.price / product.oldPrice) * 100) }}%
          </div>
        </div>

        <!-- Информация о товаре -->
        <div class="p-4">
          <div class="text-xs text-gray-500 mb-1">{{ product.brand }}</div>
          <h3 class="font-medium text-gray-900 mb-2 text-sm md:text-base line-clamp-2">
            {{ product.name }}
          </h3>
          
          <!-- Рейтинг -->
          <div class="flex items-center gap-1 mb-2">
            <Star :size="14" class="fill-yellow-400 text-yellow-400" />
            <span class="text-sm text-gray-600">{{ product.rating }}</span>
          </div>

          <!-- Цена -->
          <div class="flex items-center gap-2 mb-3">
            <span class="text-lg font-bold text-gray-900">{{ product.price.toLocaleString() }} ₽</span>
            <span v-if="product.oldPrice" class="text-sm text-gray-400 line-through">
              {{ product.oldPrice.toLocaleString() }} ₽
            </span>
          </div>

          <!-- Кнопка -->
          <button 
            @click="$emit('add-to-cart', product)"
            class="w-full bg-pink-600 text-white py-2 rounded-lg hover:bg-pink-700 transition text-sm font-medium"
          >
            В корзину
          </button>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { Heart, Star, ChevronRight } from 'lucide-vue-next'

export default {
  name: 'ProductsSection',
  components: {
    Heart,
    Star,
    ChevronRight
  },
  props: {
    products: {
      type: Array,
      required: true
    },
    favorites: {
      type: Array,
      default: () => []
    }
  },
  emits: ['add-to-cart', 'toggle-favorite']
}
</script>
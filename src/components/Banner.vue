<template>
  <section class="bg-gradient-to-r from-pink-100 via-purple-100 to-pink-100">
    <div class="max-w-7xl mx-auto px-4 py-16 md:py-24">
      <div class="grid md:grid-cols-2 gap-8 items-center">
        <div>
          <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
            Сияй каждый день с Glow-Up
          </h2>
          <p class="text-lg text-gray-700 mb-6">
            Премиальная косметика и парфюмерия с доставкой по всему Казахстану
          </p>
          <button class="bg-pink-600 text-white px-8 py-3 rounded-full hover:bg-pink-700 transition font-medium">
            Смотреть каталог
          </button>
        </div>
        <div class="hidden md:block">
          <!-- СЮДА: Вставьте ваше изображение -->
          <img 
            src="https://images.unsplash.com/photo-1596462502278-27bfdc403348?w=800&h=600&fit=crop"
            alt="Glow-Up Beauty products"
            class="rounded-2xl shadow-2xl"
          />
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'Banner'
}
</script>
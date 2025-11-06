<template>
  <section class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid md:grid-cols-2 gap-6">
      <div class="bg-gradient-to-r from-pink-500 to-purple-600 rounded-2xl p-8 text-white relative overflow-hidden">
        <div class="relative z-10">
          <div class="mb-4">
            <span class="bg-white text-pink-600 px-3 py-1 rounded-full text-sm font-bold">-30%</span>
          </div>
          <h3 class="text-2xl font-bold mb-2">Черная пятница</h3>
          <p class="mb-4">Скидки до 30% на уход за кожей</p>
          <button class="bg-white text-pink-600 px-6 py-2 rounded-full hover:bg-gray-100 transition font-medium">
            Подробнее
          </button>
        </div>
        <!-- СЮДА: Фоновое изображение -->
        <div class="absolute right-0 bottom-0 opacity-20">
          <img src="https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?w=400&h=300&fit=crop" alt="" class="w-64 h-64 object-cover" />
        </div>
      </div>

      <div class="bg-gradient-to-r from-purple-500 to-pink-600 rounded-2xl p-8 text-white relative overflow-hidden">
        <div class="relative z-10">
          <div class="mb-4">
            <span class="bg-white text-purple-600 px-3 py-1 rounded-full text-sm font-bold">Новинка</span>
          </div>
          <h3 class="text-2xl font-bold mb-2">Новая коллекция</h3>
          <p class="mb-4">Эксклюзивная парфюмерия сезона</p>
          <button class="bg-white text-purple-600 px-6 py-2 rounded-full hover:bg-gray-100 transition font-medium">
            Смотреть
          </button>
        </div>
        <!-- СЮДА: Фоновое изображение -->
        <div class="absolute right-0 bottom-0 opacity-20">
          <img src="https://images.unsplash.com/photo-1541643600914-78b084683601?w=400&h=300&fit=crop" alt="" class="w-64 h-64 object-cover" />
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'PromoSection'
}
</script>
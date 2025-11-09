<template>
  <section class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid md:grid-cols-2 gap-6">
      <!-- Баннер "Черная пятница" -->
      <div class="bg-gradient-to-r from-pink-500 to-purple-600 rounded-2xl p-8 text-white relative overflow-hidden min-h-[300px]">
        <!-- Фоновое изображение -->
        <div class="absolute inset-0 opacity-30">
          <img 
            src="https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?w=800&h=400&fit=crop" 
            alt="Beauty products"
            class="w-full h-full object-cover"
          />
        </div>
        
        <!-- Контент -->
        <div class="relative z-10">
          <div class="mb-4">
            <span class="bg-white text-pink-600 px-3 py-1 rounded-full text-sm font-bold">-30%</span>
          </div>
          <h3 class="text-2xl md:text-3xl font-bold mb-2">Черная пятница</h3>
          <p class="mb-6 text-lg">Скидки до 30% на уход за кожей</p>
          <router-link to="/sales">
            <button class="bg-white text-pink-600 px-6 py-2 rounded-full hover:bg-gray-100 transition font-medium">
              Подробнее
            </button>
          </router-link>
        </div>
      </div>

      <!-- Баннер "Новая коллекция" -->
      <div class="bg-gradient-to-r from-purple-500 to-pink-600 rounded-2xl p-8 text-white relative overflow-hidden min-h-[300px]">
        <!-- Фоновое изображение -->
        <div class="absolute inset-0 opacity-30">
          <img 
            src="https://images.unsplash.com/photo-1541643600914-78b084683601?w=800&h=400&fit=crop" 
            alt="Perfume collection"
            class="w-full h-full object-cover"
          />
        </div>
        
        <!-- Контент -->
        <div class="relative z-10">
          <div class="mb-4">
            <span class="bg-white text-purple-600 px-3 py-1 rounded-full text-sm font-bold">Новинка</span>
          </div>
          <h3 class="text-2xl md:text-3xl font-bold mb-2">Новая коллекция</h3>
          <p class="mb-6 text-lg">Эксклюзивная парфюмерия сезона</p>
          <router-link to="/new">
            <button class="bg-white text-purple-600 px-6 py-2 rounded-full hover:bg-gray-100 transition font-medium">
              Смотреть
            </button>
          </router-link>
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
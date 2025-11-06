<template>
  <div>
    <!-- Верхняя полоска -->
    <div class="bg-gray-900 text-white py-2">
      <div class="max-w-7xl mx-auto px-4 flex justify-between items-center text-sm">
        <div class="flex items-center gap-6">
          <div class="flex items-center gap-2">
            <span>📍</span>
            <span>Астана</span>
          </div>
          <div class="flex items-center gap-2">
            <span>📞</span>
            <span>8 777 555-35-35</span>
          </div>
        </div>
        <div class="hidden md:flex gap-4">
          <router-link to="/delivery" class="hover:text-pink-400 transition">Доставка</router-link>
          <router-link to="/payment" class="hover:text-pink-400 transition">Оплата</router-link>
          <router-link to="/about" class="hover:text-pink-400 transition">О нас</router-link>
        </div>
      </div>
    </div>

    <!-- Основной Header -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
      <div class="max-w-7xl mx-auto px-4 py-4">
        <div class="flex items-center justify-between gap-4">
          <!-- Логотип -->
          <div class="flex items-center gap-4">
            <router-link
              to="/"
              class="text-2xl md:text-3xl font-bold bg-gradient-to-r from-pink-500 via-purple-500 to-pink-600 bg-clip-text text-transparent whitespace-nowrap cursor-pointer"
            >
              Glow-Up
            </router-link>
            <button
              class="lg:hidden p-2 text-2xl"
              @click="isMenuOpen = !isMenuOpen"
            >
              {{ isMenuOpen ? '✕' : '☰' }}
            </button>
          </div>

          <!-- Поиск -->
          <div class="hidden md:flex items-center bg-gray-100 rounded-full px-4 py-2 flex-1 max-w-2xl">
            <span class="text-gray-400">🔍</span>
            <input 
              type="text" 
              placeholder="Поиск косметики, парфюмерии и ухода"
              class="bg-transparent border-none outline-none ml-2 w-full text-sm"
            />
          </div>

          <!-- Иконки -->
          <div class="flex items-center gap-2">
            <router-link to="/profile" class="p-2 hover:bg-gray-100 rounded-full transition text-2xl">
              👤
            </router-link>
            
            <router-link to="/favorites" class="p-2 hover:bg-gray-100 rounded-full transition relative text-2xl">
              ❤️
              <span 
                v-if="favoritesCount > 0"
                class="absolute -top-1 -right-1 bg-pink-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center"
              >
                {{ favoritesCount }}
              </span>
            </router-link>
            
            <router-link to="/cart" class="p-2 hover:bg-gray-100 rounded-full transition relative text-2xl">
              🛒
              <span 
                v-if="cartCount > 0"
                class="absolute -top-1 -right-1 bg-pink-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center"
              >
                {{ cartCount }}
              </span>
            </router-link>
          </div>
        </div>

        <!-- Навигация -->
        <nav class="hidden lg:flex gap-8 mt-4 pt-4 border-t">
          <router-link to="/catalog" class="text-gray-700 hover:text-pink-600 transition font-medium">Каталог</router-link>
          <router-link to="/sales" class="text-pink-600 font-medium">🔥 Акции</router-link>
          <router-link to="/new" class="text-gray-700 hover:text-pink-600 transition font-medium">Новинки</router-link>
        </nav>

        <!-- Мобильное меню -->
        <nav v-if="isMenuOpen" class="lg:hidden mt-4 pt-4 border-t flex flex-col gap-3">
          <router-link to="/catalog" class="text-gray-700 hover:text-pink-600 transition" @click="isMenuOpen = false">Каталог</router-link>
          <router-link to="/sales" class="text-pink-600" @click="isMenuOpen = false">🔥 Акции</router-link>
          <router-link to="/new" class="text-gray-700 hover:text-pink-600 transition" @click="isMenuOpen = false">Новинки</router-link>
        </nav>
      </div>
    </header>
  </div>
</template>

<script>
export default {
  name: 'Header',
  props: {
    cartCount: { type: Number, default: 0 },
    favoritesCount: { type: Number, default: 0 }
  },
  data() {
    return { isMenuOpen: false }
  }
}
</script>

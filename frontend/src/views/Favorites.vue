<template>
  <div class="min-h-screen bg-gray-50 flex flex-col items-center justify-center text-center px-4">
    <div class="bg-white rounded-2xl shadow-md p-10 max-w-lg w-full">
      <span class="text-6xl mb-4 block">❤️</span>
      <h1 class="text-3xl font-bold text-gray-900 mb-4">Ваше избранное</h1>
      <p class="text-gray-600 mb-8">
        Здесь будут отображаться товары, которые вы добавите в избранное.
      </p>
      <router-link to="/catalog">
        <button
          class="bg-pink-600 text-white px-8 py-3 rounded-full hover:bg-pink-700 transition"
        >
          Перейти в каталог
        </button>
      </router-link>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Favorites'
}
</script>

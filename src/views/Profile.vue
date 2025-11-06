<template>
  <div class="min-h-screen bg-gray-50">
  
    
    <section class="max-w-7xl mx-auto px-4 py-12">
      <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-8">👤 Личный кабинет</h1>
      <div class="bg-white rounded-xl p-12 text-center">
        <span class="text-6xl mb-4 block">👤</span>
        <h2 class="text-2xl font-bold mb-4">Войдите в аккаунт</h2>
        <p class="text-gray-600 mb-6">Для доступа к личному кабинету необходимо авторизоваться</p>
        <button class="bg-pink-600 text-white px-8 py-3 rounded-full hover:bg-pink-700 transition">
          Войти
        </button>
      </div>
    </section>
    
   
  </div>
</template>

<script>
import Header from '../components/Header.vue'
import Footer from '../components/Footer.vue'

export default {
  name: 'Profile',
  components: { Header, Footer }
}
</script>
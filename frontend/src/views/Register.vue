<template>
  <div class="min-h-screen bg-gray-50">
    <Header :cartCount="0" :favoritesCount="0" />
    
    <section class="max-w-md mx-auto px-4 py-12">
      <div class="bg-white rounded-2xl shadow-lg p-8">
        <div class="text-center mb-8">
          <div class="w-20 h-20 bg-gradient-to-br from-pink-100 to-purple-100 rounded-full mx-auto mb-4 flex items-center justify-center">
            <span class="text-4xl">✨</span>
          </div>
          <h1 class="text-3xl font-bold text-gray-900 mb-2">Регистрация</h1>
          <p class="text-gray-600">Создайте аккаунт для покупок</p>
        </div>

        <form @submit.prevent="handleRegister" class="space-y-5">
          <!-- Name -->
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
              Имя
            </label>
            <input 
              v-model="name"
              type="text" 
              required
              placeholder="Ваше имя"
              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent outline-none transition"
            />
          </div>

          <!-- Email -->
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
              Email
            </label>
            <input 
              v-model="email"
              type="email" 
              required
              placeholder="example@email.com"
              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent outline-none transition"
            />
          </div>

          <!-- Phone -->
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
              Телефон
            </label>
            <input 
              v-model="phone"
              type="tel" 
              required
              placeholder="+7 (___) ___-__-__"
              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent outline-none transition"
            />
          </div>

          <!-- Password -->
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
              Пароль
            </label>
            <input 
              v-model="password"
              type="password" 
              required
              placeholder="Минимум 6 символов"
              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent outline-none transition"
            />
          </div>

          <!-- Confirm Password -->
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
              Подтвердите пароль
            </label>
            <input 
              v-model="confirmPassword"
              type="password" 
              required
              placeholder="Повторите пароль"
              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent outline-none transition"
            />
          </div>

          <!-- Checkbox -->
          <div class="flex items-start">
            <input 
              v-model="agreeToTerms"
              type="checkbox" 
              required
              class="mt-1 w-4 h-4 text-pink-600 border-gray-300 rounded focus:ring-pink-500"
            />
            <label class="ml-2 text-sm text-gray-600">
              Я согласен с 
              <a href="#" class="text-pink-600 hover:text-pink-700">условиями использования</a>
              и 
              <a href="#" class="text-pink-600 hover:text-pink-700">политикой конфиденциальности</a>
            </label>
          </div>

          <!-- Submit Button -->
          <button 
            type="submit"
            class="w-full bg-pink-600 text-white py-3 rounded-lg hover:bg-pink-700 transition font-medium text-lg"
          >
            Зарегистрироваться
          </button>
        </form>

        <!-- Divider -->
        <div class="relative my-6">
          <div class="absolute inset-0 flex items-center">
            <div class="w-full border-t border-gray-300"></div>
          </div>
          <div class="relative flex justify-center text-sm">
            <span class="px-4 bg-white text-gray-500">или</span>
          </div>
        </div>

        <!-- Social Register -->
        <div class="space-y-3">
          <button class="w-full flex items-center justify-center gap-3 px-4 py-3 border border-gray-300 rounded-lg hover:bg-gray-50 transition">
            <span class="text-xl">🔵</span>
            <span class="font-medium">Регистрация через Google</span>
          </button>
        </div>

        <!-- Login Link -->
        <div class="text-center mt-6">
          <p class="text-gray-600">
            Уже есть аккаунт? 
            <router-link to="/login" class="text-pink-600 hover:text-pink-700 font-medium">
              Войти
            </router-link>
          </p>
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
  name: 'Register',
  components: {
    Header,
    Footer
  },
  data() {
    return {
      name: '',
      email: '',
      phone: '',
      password: '',
      confirmPassword: '',
      agreeToTerms: false
    }
  },
  methods: {
    handleRegister() {
      if (this.password !== this.confirmPassword) {
        alert('Пароли не совпадают!')
        return
      }
      
      // Здесь будет логика регистрации
      alert(`Регистрация: ${this.name}`)
      // После успешной регистрации перенаправляем на вход
      this.$router.push('/login')
    }
  }
}
</script>
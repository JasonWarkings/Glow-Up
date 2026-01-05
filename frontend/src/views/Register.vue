<template>
  <div class="min-h-screen bg-gray-50 flex items-center justify-center">
    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
      <h1 class="text-2xl font-bold mb-4 text-center">Регистрация</h1>

      <form @submit.prevent="handleRegister" class="space-y-4">
        <input v-model="name" type="text" placeholder="Имя" class="input" required />
        <input v-model="email" type="email" placeholder="Email" class="input" required />
        <input v-model="phone" type="tel" placeholder="Телефон" class="input" />
        <input v-model="password" type="password" placeholder="Пароль" class="input" required />
        <input v-model="confirmPassword" type="password" placeholder="Повторите пароль" class="input" required />
        <button type="submit" class="w-full bg-pink-600 text-white py-2 rounded-lg hover:bg-pink-700 transition">Зарегистрироваться</button>
      </form>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'Register',
  data() {
    return {
      name: '',
      email: '',
      phone: '',
      password: '',
      confirmPassword: ''
    }
  },
  methods: {
    async handleRegister() {
      if (this.password !== this.confirmPassword) {
        alert('Пароли не совпадают');
        return;
      }

      try {
        const res = await axios.post('http://localhost:8000/api/register', {
          name: this.name,
          email: this.email,
          phone: this.phone,
          password: this.password
        });

        // Сохраняем токен и пользователя в localStorage
        localStorage.setItem('token', res.data.token);
        localStorage.setItem('user', JSON.stringify(res.data.user));

        alert('Регистрация прошла успешно');
        this.$router.push('/login');
      } catch (e) {
        alert(e.response?.data?.message || 'Ошибка регистрации');
        console.error(e);
      }
    }
  }
}
</script>

<style>
.input {
  width: 100%;
  padding: 0.75rem 1rem;
  border: 1px solid #d1d5db;
  border-radius: 0.5rem;
  outline: none;
}
.input:focus {
  border-color: #ec4899;
  box-shadow: 0 0 0 2px rgba(236, 72, 153, 0.3);
}
</style>

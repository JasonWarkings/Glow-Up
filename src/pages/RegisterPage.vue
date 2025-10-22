<template>
  <div class="register-page">
    <h1 class="title">Регистрация</h1>
    <form @submit.prevent="handleSubmit" class="register-form">
      <label>
        Имя
        <input type="text" v-model="name" required />
      </label>

      <label>
        Email
        <input type="email" v-model="email" required />
      </label>

      <label>
        Пароль
        <input type="password" v-model="password" required />
      </label>

      <button type="submit" class="submit-button">Зарегистрироваться</button>
    </form>
  </div>
</template>

<script>
export default {
  name: 'RegisterPage',
  data() {
    return {
      name: '',
      email: '',
      password: ''
    }
  },
  methods: {
    handleSubmit() {
      // Здесь можно добавить логику отправки данных на сервер
      console.log('Регистрация:', this.name, this.email, this.password)
      alert('Спасибо за регистрацию, ' + this.name + '!')
      this.$router.push('/catalog') // Переход в каталог после регистрации
    }
  }
}
</script>

<style scoped>
.register-page {
  max-width: 400px;
  margin: 60px auto;
  padding: 30px;
  background-color: #fdf6ff;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

.title {
  text-align: center;
  font-size: 28px;
  color: #a66bbe;
  margin-bottom: 24px;
}

.register-form label {
  display: block;
  margin-bottom: 16px;
  font-weight: bold;
  color: #444;
}

.register-form input {
  width: 100%;
  padding: 10px;
  margin-top: 6px;
  border: 1px solid #ccc;
  border-radius: 6px;
}

.submit-button {
  width: 100%;
  padding: 12px;
  background-color: #a66bbe;
  color: #fff;
  font-weight: bold;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.submit-button:hover {
  background-color: #8e57a8;
}
</style>

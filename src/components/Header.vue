//Header.vue
<template>
  <header class="header">
    <h1 class="logo">GlowUp</h1>
    <nav>
      <a href="/">Главная</a>
      <a href="/catalog">Каталог</a>
      <a href="/cart">Корзина</a>
      <a href="/profile">Профиль</a>
    </nav>
  </header>
</template>

<style scoped>
.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 25px 70px;
  background-color: #A98BDB;
}
.logo {
  font-size: 28px;
  font-weight: bold;
}
nav a {
  margin-left: 20px;
  text-decoration: none;
  color: #000;
}
nav a:hover {
  text-decoration: underline;
}
</style>

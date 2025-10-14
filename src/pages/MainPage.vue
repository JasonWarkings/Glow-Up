<template>
  <div class="main-page">
    <section class="hero">
      <h1>Добро пожаловать в GlowUp</h1>
      <p>Открой для себя косметику, которая подчеркнёт твою естественную красоту ✨</p>
      <button class="shop-btn">Перейти в каталог</button>
    </section>

    <section class="features">
      <div class="feature">
        <h3>💄 Лучшие бренды</h3>
        <p>Только проверенные бренды с мировым именем.</p>
      </div>
      <div class="feature">
        <h3>🚚 Быстрая доставка</h3>
        <p>Доставляем по всей стране прямо к двери.</p>
      </div>
      <div class="feature">
        <h3>💖 Удобный выбор</h3>
        <p>Фильтры по типу кожи, цвету и цене помогут подобрать идеально.</p>
      </div>
    </section>
  </div>
</template>

<style scoped>
.main-page {
  text-align: center;
  font-family: 'Poppins', sans-serif;
  color: #333;
}

/* Верхний баннер */
.hero {
  background-color: #ffe6ea;
  padding: 80px 20px;
  border-radius: 10px;
  margin: 30px;
}

.hero h1 {
  font-size: 2.5rem;
  color: #b84b6f;
  margin-bottom: 10px;
}

.hero p {
  color: #5e5e5e;
  font-size: 1.1rem;
  margin-bottom: 20px;
}

.shop-btn {
  background-color: #e46a8b;
  border: none;
  color: white;
  padding: 12px 30px;
  border-radius: 25px;
  font-size: 1rem;
  cursor: pointer;
  transition: 0.3s;
}

.shop-btn:hover {
  background-color: #d15174;
}

/* Преимущества */
.features {
  display: flex;
  justify-content: space-around;
  margin: 60px 0;
  flex-wrap: wrap;
}

.feature {
  background-color: #fff5f7;
  padding: 20px;
  border-radius: 12px;
  width: 280px;
  margin: 10px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}

.feature h3 {
  color: #b84b6f;
  margin-bottom: 10px;
}
</style>

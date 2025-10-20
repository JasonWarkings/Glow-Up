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
    <section class="promo-section">
  <h2>🎁 Акции и скидки</h2>
  <div class="promo-grid">
    <div class="promo-card">
      <h3>✨ Скидка 20% на первый заказ</h3>
      <p>Зарегистрируйся и получи промокод на скидку. GlowUp приветствует новых клиентов!</p>
      <button  class="promo-button">Получить промокод</button>
    </div>
    <div class="promo-card">
      <h3>💄 Осенняя распродажа</h3>
      <p>Только до 31 декабря — скидки до 50% на топовые бренды.</p>
      <button class="promo-button">Смотреть товары</button>
    </div>
    <div class="promo-card">
      <h3>🚚 Бесплатная доставка</h3>
      <p>При заказе от 10 000 ₸ — доставка за наш счёт!</p>
      <button class="promo-button">Условия акции</button>
    </div>
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
  background-color:#d0bbf7;
  padding: 80px 20px;
  border-radius: 10px;
  margin: 30px;
}
.promo-section {
  padding: 40px 20px;
  background-color: #f5f3ff;
  text-align: center;
}

.promo-grid {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  justify-content: center;
  margin-top: 20px;
}

.promo-card {
  background: white;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(168, 85, 247, 0.1);
  padding: 24px;
  max-width: 300px;
  flex: 1 1 280px;
}

.promo-card h3 {
  color: #7e22ce;
  margin-bottom: 10px;
}

.promo-card p {
  font-size: 15px;
  margin-bottom: 16px;
}

.promo-button {
  background: linear-gradient(135deg, #c084fc, #a855f7);
  color: white;
  border: none;
  padding: 12px 24px;
  border-radius: 8px;
  font-size: 16px;
  font-weight: 600;
  cursor: pointer;
  transition: transform 0.2s ease, box-shadow 0.3s ease;
}

.promo-button:hover {
  transform: scale(1.05);
  box-shadow: 0 8px 16px rgba(168, 85, 247, 0.3);
}

/* 📱 Адаптация под мобильные устройства */
@media (max-width: 600px) {
  .promo-grid {
    flex-direction: column;
    align-items: center;
  }

  .promo-card {
    max-width: 100%;
  }
}

.hero h1 {
  font-size: 3.0rem;
  color:#4A4A4A;
  margin-bottom: 10px;
}

.hero p {
  color:#4A4A4A;
  font-size: 1.1rem;
  margin-bottom: 20px;
}

.shop-btn {
  background-color: #E7DDFF;
  border: none;
  color: #b25ed3;
  padding: 12px 30px;
  border-radius: 25px;
  font-size: 1rem;
  cursor: pointer;
  transition: 0.3s;
}

.shop-btn:hover {
  background-color:#cab1f9;
}

/* Преимущества */
.features {
  display: flex;
  justify-content: space-around;
  margin: 60px 0;
  flex-wrap: wrap;
}

.feature {
  background-color:#d0bbf8;
  padding: 20px;
  border-radius: 12px;
  width: 280px;
  margin: 10px;
  box-shadow: 0 2px 8px #4A4A4A(0,0,0,0.05);
}

.feature h3 {
  color: #4A4A4A;
  margin-bottom: 10px;
}
</style>

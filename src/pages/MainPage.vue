<template>
  <div class="main-page">
    <!-- Приветствие -->
    <section class="hero">
      <h1>Добро пожаловать в GlowUp</h1>
      <p>Открой для себя косметику, которая подчеркнёт твою естественную красоту ✨</p>
     <router-link to="/catalog" class="catalog-button">
  Перейти в каталог
</router-link>

    </section>

    

    <!-- Преимущества -->
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
      <div class="feature">
        <h3>💳 Безопасная оплата</h3>
        <p>Все транзакции защищены, а способы оплаты — на твой выбор.</p>
      </div>
    </section>

    <!-- Акции -->
    <section class="promo-section">
      <h2>🎁 Акции и скидки</h2>
      <div class="promo-grid">
        <div class="promo-card">
          <h3>✨ Скидка 20% на первый заказ</h3>
          <p>Зарегистрируйся и получи промокод на скидку. GlowUp приветствует новых клиентов!</p>
         <router-link to="/register" class="promo-button">
  Получить промокод
</router-link>

        </div>
        <div class="promo-card">
          <h3>💄 Осенняя распродажа</h3>
          <p>Только до 31 декабря — скидки до 50% на топовые бренды.</p>
         <router-link to="/catalog" class="promo-button">
  Смотреть товары
</router-link>

        </div>
        <div class="promo-card">
          <h3>🚚 Бесплатная доставка</h3>
          <p>При заказе от 10 000 ₸ — доставка за наш счёт!</p>
         <router-link to="/promo-terms" class="promo-button">
  Условия акции
</router-link>

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

/* Hero */
.hero {
  background-color: #d0bbf7;
  padding: 80px 20px;
  border-radius: 10px;
  margin: 30px auto;
  max-width: 1200px;
  box-shadow: none;
}

.hero h1 {
  font-size: 3rem;
  color: #4A4A4A;
  margin-bottom: 10px;
}

.hero p {
  font-size: 1.1rem;
  color: #4A4A4A;
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
  background-color: #cab1f9;
}

/* Features */
.features {
  display: flex;
  justify-content: center;
  gap: 16px;
  flex-wrap: nowrap;
  overflow-x: auto;
  padding: 0 10px;
  margin: 60px 0;
}

.feature {
  flex: 0 0 220px;
  background-color: #d0bbf8;
  padding: 16px;
  border-radius: 12px;
  text-align: center;
}

.feature h3 {
  color: #4A4A4A;
  margin-bottom: 10px;
}

.feature p {
  font-size: 15px;
  color: #444;
}

/* Promo Section */
.promo-section {
  padding: 10px 20px;
  background-color: transparent;
  text-align: center;
  margin-top: 0;
}

.promo-grid {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  justify-content: center;
  margin-top: 20px;
}

.promo-card {
  background: #d0bbf8;
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

.catalog-button {
  display: inline-block;
  padding: 12px 24px;
  background-color: #e286f3; /* розовый, как на баннере */
  color: #fff;
  font-weight: bold;
  border-radius: 8px;
  text-decoration: none;
  transition: background-color 0.3s ease;
}
.catalog-button:hover {
  background-color: #d06fb2;
}

/* Адаптация */
@media (max-width: 600px) {
  .features {
    flex-wrap: wrap;
    justify-content: center;
    overflow-x: unset;
  }

  .feature {
    flex: 1 1 100%;
    max-width: 300px;
    margin-bottom: 20px;
  }

  .promo-grid {
    flex-direction: column;
    align-items: center;
  }

  .promo-card {
    max-width: 100%;
  }
}
</style>

<template>
  <main class="promo-page">
    <h1>🎁 Акции и скидки</h1>
    <p class="intro-text">Лови лучшие предложения на косметику от GlowUp — экономь красиво!</p>

    <div class="promo-grid">
      <PromoCard
        title="✨ Скидка 20% на первый заказ"
        description="Зарегистрируйся и получи промокод. GlowUp приветствует новых клиентов!"
        buttonText="Получить промокод"
      />
      <PromoCard
        title="💄 Осенняя распродажа"
        description="Только до 31 октября — скидки до 50% на топовые бренды."
        buttonText="Смотреть товары"
      />
      <PromoCard
        title="🚚 Бесплатная доставка"
        description="При заказе от 10 000 ₸ — доставка за наш счёт!"
        buttonText="Условия акции"
      />
    </div>
  </main>
</template>

<script setup>
import PromoCard from "@/pages/SalesPage.vue"
</script>



<style scoped>
.promo-page {
  padding: 40px 20px;
  text-align: center;
  background-color: #faf5ff;
}

.intro-text {
  font-size: 18px;
  margin-bottom: 30px;
  color: #6b21a8;
}

.promo-grid {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  justify-content: center;
}

/* 📱 Адаптация под мобильные устройства */
@media (max-width: 600px) {
  .promo-grid {
    flex-direction: column;
    align-items: center;
  }
}
</style>


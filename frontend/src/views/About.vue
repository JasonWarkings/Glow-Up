<template>
  <div class="min-h-screen bg-gray-50">
  
    
    <section class="max-w-7xl mx-auto px-4 py-12">
      <!-- Главный баннер -->
      <div class="bg-gradient-to-r from-pink-500 via-purple-500 to-pink-600 rounded-3xl p-12 md:p-16 text-white text-center mb-12">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">О магазине Glow-Up</h1>
        <p class="text-xl md:text-2xl max-w-3xl mx-auto">
          Ваш путь к красоте начинается здесь
        </p>
      </div>

      <!-- Наша история -->
      <div class="bg-white rounded-2xl p-8 md:p-12 mb-8 shadow-md">
        <div class="grid md:grid-cols-2 gap-12 items-center">
          <div>
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Наша история</h2>
            <div class="space-y-4 text-gray-700">
              <p class="text-lg">
                <strong>Glow-Up</strong> — это не просто магазин косметики. Это место, где каждый может найти 
                идеальные продукты для ухода за собой и почувствовать себя особенным.
              </p>
              <p>
                С <strong>2023 года</strong> мы помогаем тысячам клиентов в Казахстане открывать для себя 
                мир премиальной косметики и парфюмерии. Наша команда тщательно отбирает каждый бренд, 
                работая только с официальными дистрибьюторами.
              </p>
              <p>
                Мы верим, что красота — это не роскошь, а доступное удовольствие. Поэтому предлагаем 
                конкурентные цены, удобную доставку и честный сервис.
              </p>
            </div>
          </div>
          <div class="relative">
            <img 
              src="https://images.unsplash.com/photo-1522335789203-aabd1fc54bc9?w=600&h=400&fit=crop"
              alt="Glow-Up store"
              class="rounded-2xl shadow-2xl"
            />
            <div class="absolute -bottom-6 -right-6 bg-pink-500 text-white p-6 rounded-2xl shadow-xl">
              <div class="text-4xl font-bold">3+</div>
              <div class="text-sm">года на рынке</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Цифры -->
      <div class="grid md:grid-cols-4 gap-6 mb-12">
        <div class="bg-gradient-to-br from-pink-100 to-purple-100 rounded-2xl p-8 text-center">
          <div class="text-5xl mb-4">🏆</div>
          <div class="text-4xl font-bold text-gray-900 mb-2">10 000+</div>
          <p class="text-gray-700 font-medium">Довольных клиентов</p>
        </div>

        <div class="bg-gradient-to-br from-purple-100 to-pink-100 rounded-2xl p-8 text-center">
          <div class="text-5xl mb-4">✨</div>
          <div class="text-4xl font-bold text-gray-900 mb-2">500+</div>
          <p class="text-gray-700 font-medium">Брендов в каталоге</p>
        </div>

        <div class="bg-gradient-to-br from-pink-100 to-purple-100 rounded-2xl p-8 text-center">
          <div class="text-5xl mb-4">🚚</div>
          <div class="text-4xl font-bold text-gray-900 mb-2">24/7</div>
          <p class="text-gray-700 font-medium">Доставка по Казахстану</p>
        </div>

        <div class="bg-gradient-to-br from-purple-100 to-pink-100 rounded-2xl p-8 text-center">
          <div class="text-5xl mb-4">⭐</div>
          <div class="text-4xl font-bold text-gray-900 mb-2">4.9/5</div>
          <p class="text-gray-700 font-medium">Средний рейтинг</p>
        </div>
      </div>

      <!-- Наши ценности -->
      <div class="bg-white rounded-2xl p-8 md:p-12 mb-8 shadow-md">
        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Наши ценности</h2>
        <div class="grid md:grid-cols-3 gap-8">
          <div class="text-center">
            <div class="bg-pink-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
              <span class="text-4xl">💯</span>
            </div>
            <h3 class="text-xl font-bold mb-3">100% Оригинал</h3>
            <p class="text-gray-600">
              Работаем только с официальными дистрибьюторами. Каждый товар имеет сертификат качества.
            </p>
          </div>

          <div class="text-center">
            <div class="bg-purple-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
              <span class="text-4xl">❤️</span>
            </div>
            <h3 class="text-xl font-bold mb-3">Забота о клиентах</h3>
            <p class="text-gray-600">
              Наша команда всегда на связи. Поможем с выбором, проконсультируем и решим любой вопрос.
            </p>
          </div>

          <div class="text-center">
            <div class="bg-pink-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
              <span class="text-4xl">⚡</span>
            </div>
            <h3 class="text-xl font-bold mb-3">Быстрая доставка</h3>
            <p class="text-gray-600">
              Отправляем заказы в день оформления. Доставка по Астане и Алматы за 1-2 дня.
            </p>
          </div>
        </div>
      </div>

      <!-- Наши преимущества -->
      <div class="bg-white rounded-2xl p-8 md:p-12 mb-8 shadow-md">
        <h2 class="text-3xl font-bold text-gray-900 mb-8">Почему выбирают нас</h2>
        <div class="space-y-6">
          <div class="flex items-start gap-4 p-6 bg-pink-50 rounded-xl">
            <div class="bg-pink-500 text-white p-3 rounded-full text-2xl flex-shrink-0">✓</div>
            <div>
              <h3 class="font-bold text-lg mb-2">Широкий ассортимент</h3>
              <p class="text-gray-700">
                Более 500 брендов косметики и парфюмерии: от люксовых до масс-маркета. 
                Новинки появляются еженедельно.
              </p>
            </div>
          </div>

          <div class="flex items-start gap-4 p-6 bg-purple-50 rounded-xl">
            <div class="bg-purple-500 text-white p-3 rounded-full text-2xl flex-shrink-0">✓</div>
            <div>
              <h3 class="font-bold text-lg mb-2">Выгодные цены</h3>
              <p class="text-gray-700">
                Конкурентные цены благодаря прямым поставкам от производителей. 
                Регулярные акции и скидки до 50%.
              </p>
            </div>
          </div>

          <div class="flex items-start gap-4 p-6 bg-pink-50 rounded-xl">
            <div class="bg-pink-500 text-white p-3 rounded-full text-2xl flex-shrink-0">✓</div>
            <div>
              <h3 class="font-bold text-lg mb-2">Бесплатная доставка</h3>
              <p class="text-gray-700">
                При заказе от 15 000 ₸ доставка по всему Казахстану бесплатная. 
                Работаем с лучшими службами доставки.
              </p>
            </div>
          </div>

          <div class="flex items-start gap-4 p-6 bg-purple-50 rounded-xl">
            <div class="bg-purple-500 text-white p-3 rounded-full text-2xl flex-shrink-0">✓</div>
            <div>
              <h3 class="font-bold text-lg mb-2">Программа лояльности</h3>
              <p class="text-gray-700">
                Накапливайте бонусы с каждой покупки и оплачивайте ими до 30% следующего заказа. 
                Эксклюзивные предложения для постоянных клиентов.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>


export default {
  name: "AboutPage",
  components: {

  },
};
</script>

<style scoped>

</style>

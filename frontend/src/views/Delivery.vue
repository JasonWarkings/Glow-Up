<template>
  <div class="min-h-screen bg-gray-50">
   
    
    <section class="max-w-7xl mx-auto px-4 py-12">
      <!-- Заголовок -->
      <div class="mb-8">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">🚚 Доставка</h1>
        <p class="text-gray-600 text-lg">Удобные способы получения заказа</p>
      </div>

      <!-- Баннер с быстрой доставкой -->
      <div class="bg-gradient-to-r from-pink-500 to-purple-600 rounded-2xl p-8 text-white mb-8">
        <div class="flex flex-col md:flex-row items-center justify-between gap-6">
          <div>
            <h2 class="text-2xl md:text-3xl font-bold mb-2">🎉 Бесплатная доставка</h2>
            <p class="text-lg">При заказе от 15 000 ₸ доставка бесплатная по всему Казахстану!</p>
          </div>
          <div class="flex items-center gap-4">
            <div class="text-center">
              <div class="text-4xl font-bold">1-2</div>
              <div class="text-sm">дня доставка</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Способы доставки -->
      <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Способы доставки</h2>
        
        <div class="grid md:grid-cols-2 gap-6">
          <!-- Курьерская доставка -->
          <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition">
            <div class="flex items-start gap-4 mb-4">
              <div class="bg-pink-100 p-3 rounded-full">
                <span class="text-3xl">🚚</span>
              </div>
              <div class="flex-1">
                <h3 class="text-xl font-bold mb-2">Курьерская доставка</h3>
                <p class="text-gray-600 mb-3">Доставка по Астане и Алматы</p>
                
                <div class="space-y-2 text-sm">
                  <div class="flex items-center gap-2">
                    <span class="text-pink-600">⏱</span>
                    <span><strong>Срок:</strong> 1-2 дня</span>
                  </div>
                  <div class="flex items-center gap-2">
                    <span class="text-pink-600">💰</span>
                    <span><strong>Стоимость:</strong> 1500 ₸</span>
                  </div>
                  <div class="flex items-center gap-2">
                    <span class="text-pink-600">🎁</span>
                    <span><strong>Бесплатно:</strong> от 15 000 ₸</span>
                  </div>
                  <div class="flex items-center gap-2">
                    <span class="text-pink-600">🕐</span>
                    <span><strong>Время:</strong> с 10:00 до 20:00</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="bg-pink-50 p-4 rounded-lg mt-4">
              <p class="text-sm text-gray-700">
                ✓ Курьер свяжется за час до доставки<br/>
                ✓ Оплата наличными или картой курьеру<br/>
                ✓ Можно примерить перед оплатой
              </p>
            </div>
          </div>

          <!-- Пункты выдачи -->
          <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition">
            <div class="flex items-start gap-4 mb-4">
              <div class="bg-purple-100 p-3 rounded-full">
                <span class="text-3xl">🏪</span>
              </div>
              <div class="flex-1">
                <h3 class="text-xl font-bold mb-2">Пункты выдачи</h3>
                <p class="text-gray-600 mb-3">Самовывоз из пунктов CDEK</p>
                
                <div class="space-y-2 text-sm">
                  <div class="flex items-center gap-2">
                    <span class="text-purple-600">⏱</span>
                    <span><strong>Срок:</strong> 2-5 дней</span>
                  </div>
                  <div class="flex items-center gap-2">
                    <span class="text-purple-600">💰</span>
                    <span><strong>Стоимость:</strong> 800 ₸</span>
                  </div>
                  <div class="flex items-center gap-2">
                    <span class="text-purple-600">🎁</span>
                    <span><strong>Бесплатно:</strong> от 10 000 ₸</span>
                  </div>
                  <div class="flex items-center gap-2">
                    <span class="text-purple-600">📍</span>
                    <span><strong>Пунктов:</strong> 150+ по Казахстану</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="bg-purple-50 p-4 rounded-lg mt-4">
              <p class="text-sm text-gray-700">
                ✓ Хранение 5 дней бесплатно<br/>
                ✓ SMS уведомление о прибытии<br/>
                ✓ Удобный график работы
              </p>
            </div>
          </div>

          <!-- Постаматы -->
          <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition">
            <div class="flex items-start gap-4 mb-4">
              <div class="bg-pink-100 p-3 rounded-full">
                <span class="text-3xl">📦</span>
              </div>
              <div class="flex-1">
                <h3 class="text-xl font-bold mb-2">Постаматы</h3>
                <p class="text-gray-600 mb-3">Круглосуточная выдача заказов</p>
                
                <div class="space-y-2 text-sm">
                  <div class="flex items-center gap-2">
                    <span class="text-pink-600">⏱</span>
                    <span><strong>Срок:</strong> 2-5 дней</span>
                  </div>
                  <div class="flex items-center gap-2">
                    <span class="text-pink-600">💰</span>
                    <span><strong>Стоимость:</strong> 1000 ₸</span>
                  </div>
                  <div class="flex items-center gap-2">
                    <span class="text-pink-600">🎁</span>
                    <span><strong>Бесплатно:</strong> от 15 000 ₸</span>
                  </div>
                  <div class="flex items-center gap-2">
                    <span class="text-pink-600">🕐</span>
                    <span><strong>Доступ:</strong> 24/7</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="bg-pink-50 p-4 rounded-lg mt-4">
              <p class="text-sm text-gray-700">
                ✓ Получение в любое время суток<br/>
                ✓ Быстрая выдача за 2 минуты<br/>
                ✓ Хранение 3 дня бесплатно
              </p>
            </div>
          </div>

          <!-- Самовывоз из магазина -->
          <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition">
            <div class="flex items-start gap-4 mb-4">
              <div class="bg-purple-100 p-3 rounded-full">
                <span class="text-3xl">🛍</span>
              </div>
              <div class="flex-1">
                <h3 class="text-xl font-bold mb-2">Самовывоз из магазина</h3>
                <p class="text-gray-600 mb-3">Забрать из нашего магазина</p>
                
                <div class="space-y-2 text-sm">
                  <div class="flex items-center gap-2">
                    <span class="text-purple-600">⏱</span>
                    <span><strong>Срок:</strong> в день заказа</span>
                  </div>
                  <div class="flex items-center gap-2">
                    <span class="text-purple-600">💰</span>
                    <span><strong>Стоимость:</strong> бесплатно</span>
                  </div>
                  <div class="flex items-center gap-2">
                    <span class="text-purple-600">📍</span>
                    <span><strong>Адрес:</strong> г. Астана, ул. Кабанбай батыра 1</span>
                  </div>
                  <div class="flex items-center gap-2">
                    <span class="text-purple-600">🕐</span>
                    <span><strong>Время:</strong> Пн-Вс 10:00-21:00</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="bg-purple-50 p-4 rounded-lg mt-4">
              <p class="text-sm text-gray-700">
                ✓ Готовность заказа в течение 2 часов<br/>
                ✓ Консультация продавца<br/>
                ✓ Возможность обмена на месте
              </p>
            </div>
          </div>
        </div>
      </div>

      <!-- Города доставки -->
      <div class="bg-white rounded-xl p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">География доставки</h2>
        <div class="grid md:grid-cols-3 gap-6">
          <div>
            <h3 class="font-bold mb-3 text-lg">🏙 Крупные города (1-2 дня)</h3>
            <ul class="space-y-2 text-gray-700">
              <li>• Астана</li>
              <li>• Алматы</li>
              <li>• Шымкент</li>
              <li>• Караганда</li>
              <li>• Актобе</li>
            </ul>
          </div>
          <div>
            <h3 class="font-bold mb-3 text-lg">🏘 Областные центры (3-5 дней)</h3>
            <ul class="space-y-2 text-gray-700">
              <li>• Атырау</li>
              <li>• Актау</li>
              <li>• Павлодар</li>
              <li>• Усть-Каменогорск</li>
              <li>• Костанай</li>
            </ul>
          </div>
          <div>
            <h3 class="font-bold mb-3 text-lg">🏡 Другие города (5-7 дней)</h3>
            <ul class="space-y-2 text-gray-700">
              <li>• Талдыкорган</li>
              <li>• Петропавловск</li>
              <li>• Семей</li>
              <li>• Туркестан</li>
              <li>• И другие города</li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Часто задаваемые вопросы -->
      <div class="bg-white rounded-xl p-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">❓ Часто задаваемые вопросы</h2>
        <div class="space-y-4">
          <details class="border-b pb-4">
            <summary class="font-semibold cursor-pointer hover:text-pink-600 transition">
              Как отследить мой заказ?
            </summary>
            <p class="mt-2 text-gray-600">
              После отправки заказа вам придет SMS с трек-номером. Вы сможете отследить доставку на сайте транспортной компании или в личном кабинете.
            </p>
          </details>

          <details class="border-b pb-4">
            <summary class="font-semibold cursor-pointer hover:text-pink-600 transition">
              Можно ли изменить адрес доставки?
            </summary>
            <p class="mt-2 text-gray-600">
              Да, вы можете изменить адрес доставки до момента отправки заказа. Свяжитесь с нашей службой поддержки по телефону 8 777 555-35-35.
            </p>
          </details>

          <details class="border-b pb-4">
            <summary class="font-semibold cursor-pointer hover:text-pink-600 transition">
              Что делать если товар не подошел?
            </summary>
            <p class="mt-2 text-gray-600">
              В течение 30 дней с момента получения вы можете вернуть товар. Возврат оформляется бесплатно. Подробнее по номеру телефона 8 777 555 35 35
            </p>
          </details>

          <details class="border-b pb-4">
            <summary class="font-semibold cursor-pointer hover:text-pink-600 transition">
              Какие способы оплаты доступны?
            </summary>
            <p class="mt-2 text-gray-600">
              Вы можете оплатить заказ картой онлайн, наличными курьеру, картой при получении или через Kaspi QR. Подробнее в разделе "Оплата".
            </p>
          </details>

          <details class="pb-4">
            <summary class="font-semibold cursor-pointer hover:text-pink-600 transition">
              Доставляете ли вы в отдаленные районы?
            </summary>
            <p class="mt-2 text-gray-600">
              Да, мы доставляем во все населенные пункты Казахстана. Срок доставки может составлять до 10 дней в зависимости от удаленности.
            </p>
          </details>
        </div>
      </div>

      <!-- Контактная информация -->
      <div class="bg-gradient-to-r from-pink-100 to-purple-100 rounded-2xl p-8 mt-8">
        <div class="text-center">
          <h2 class="text-2xl font-bold text-gray-900 mb-4">Остались вопросы?</h2>
          <p class="text-gray-700 mb-6">Наша служба поддержки работает для вас 24/7</p>
          <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="tel:+77005553535" class="bg-pink-600 text-white px-8 py-3 rounded-full hover:bg-pink-700 transition font-medium">
              📞 8 777 555-35-35
            </a>
            <a href="mailto:support@glowup.kz" class="bg-white text-pink-600 px-8 py-3 rounded-full hover:bg-gray-100 transition font-medium">
              ✉ info@glowup.kz
            </a>
          </div>
        </div>
      </div>
    </section>
    
  </div>
</template>

<script>

export default {
  name: 'Delivery',
  components: {

  }
}
</script>
<template>
  <div class="min-h-screen bg-gray-50">

    
    <section class="max-w-7xl mx-auto px-4 py-12">
      <!-- Заголовок -->
      <div class="mb-8">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">💳 Оплата</h1>
        <p class="text-gray-600 text-lg">Удобные и безопасные способы оплаты</p>
      </div>

      <!-- Баннер безопасности -->
      <div class="bg-gradient-to-r from-green-500 to-emerald-600 rounded-2xl p-8 text-white mb-8">
        <div class="flex flex-col md:flex-row items-center justify-between gap-6">
          <div>
            <h2 class="text-2xl md:text-3xl font-bold mb-2">🔒 100% безопасные платежи</h2>
            <p class="text-lg">Все платежи защищены по стандарту PCI DSS. Ваши данные в безопасности!</p>
          </div>
          <div class="flex gap-4 text-4xl">
            <span>🛡️</span>
            <span>✓</span>
            <span>🔐</span>
          </div>
        </div>
      </div>

      <!-- Способы оплаты -->
      <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Способы оплаты</h2>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
          <!-- Банковские карты -->
          <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition">
            <div class="bg-gradient-to-br from-blue-100 to-purple-100 p-4 rounded-xl mb-4 text-center">
              <span class="text-5xl">💳</span>
            </div>
            <h3 class="text-xl font-bold mb-3">Банковские карты</h3>
            <p class="text-gray-600 mb-4">Visa, Mastercard, МИР</p>
            
            <div class="space-y-2 text-sm mb-4">
              <div class="flex items-center gap-2">
                <span class="text-green-600">✓</span>
                <span>Мгновенное зачисление</span>
              </div>
              <div class="flex items-center gap-2">
                <span class="text-green-600">✓</span>
                <span>Безопасная оплата</span>
              </div>
              <div class="flex items-center gap-2">
                <span class="text-green-600">✓</span>
                <span>Возврат на карту</span>
              </div>
              <div class="flex items-center gap-2">
                <span class="text-green-600">✓</span>
                <span>Рассрочка 0-0-12</span>
              </div>
            </div>

            <div class="bg-blue-50 p-3 rounded-lg">
              <p class="text-xs text-gray-700">
                Поддержка карт всех казахстанских и международных банков
              </p>
            </div>
          </div>

          <!-- Kaspi -->
          <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition border-2 border-pink-500">
            <div class="absolute -top-3 left-1/2 transform -translate-x-1/2 bg-pink-500 text-white px-3 py-1 rounded-full text-xs font-bold">
            
            </div>
            <div class="bg-gradient-to-br from-red-100 to-pink-100 p-4 rounded-xl mb-4 text-center">
              <span class="text-5xl">🏦</span>
            </div>
            <h3 class="text-xl font-bold mb-3">Kaspi QR / Kaspi Pay</h3>
            <p class="text-gray-600 mb-4">Быстрая оплата через Kaspi</p>
            
            <div class="space-y-2 text-sm mb-4">
              <div class="flex items-center gap-2">
                <span class="text-pink-600">✓</span>
                <span>Оплата QR-кодом</span>
              </div>
              <div class="flex items-center gap-2">
                <span class="text-pink-600">✓</span>
                <span>Kaspi рассрочка 3-12 мес</span>
              </div>
              <div class="flex items-center gap-2">
                <span class="text-pink-600">✓</span>
                <span>Kaspi Кредит</span>
              </div>
              <div class="flex items-center gap-2">
                <span class="text-pink-600">✓</span>
                <span>Без комиссии</span>
              </div>
            </div>

            <div class="bg-pink-50 p-3 rounded-lg">
              <p class="text-xs text-gray-700">
                Самый быстрый способ оплаты для пользователей Kaspi
              </p>
            </div>
          </div>

          <!-- Наличные -->
          <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition">
            <div class="bg-gradient-to-br from-green-100 to-emerald-100 p-4 rounded-xl mb-4 text-center">
              <span class="text-5xl">💵</span>
            </div>
            <h3 class="text-xl font-bold mb-3">Наличными</h3>
            <p class="text-gray-600 mb-4">При получении заказа</p>
            
            <div class="space-y-2 text-sm mb-4">
              <div class="flex items-center gap-2">
                <span class="text-green-600">✓</span>
                <span>Оплата курьеру</span>
              </div>
              <div class="flex items-center gap-2">
                <span class="text-green-600">✓</span>
                <span>Оплата в пункте выдачи</span>
              </div>
              <div class="flex items-center gap-2">
                <span class="text-green-600">✓</span>
                <span>Проверка перед оплатой</span>
              </div>
              <div class="flex items-center gap-2">
                <span class="text-green-600">✓</span>
                <span>Без комиссии</span>
              </div>
            </div>

            <div class="bg-green-50 p-3 rounded-lg">
              <p class="text-xs text-gray-700">
                Осмотрите товар перед оплатой
              </p>
            </div>
          </div>

          <!-- Электронные кошельки -->
          <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition">
            <div class="bg-gradient-to-br from-purple-100 to-pink-100 p-4 rounded-xl mb-4 text-center">
              <span class="text-5xl">📱</span>
            </div>
            <h3 class="text-xl font-bold mb-3">Электронные кошельки</h3>
            <p class="text-gray-600 mb-4">СБП, ЮMoney, QIWI</p>
            
            <div class="space-y-2 text-sm mb-4">
              <div class="flex items-center gap-2">
                <span class="text-purple-600">✓</span>
                <span>Быстрая оплата</span>
              </div>
              <div class="flex items-center gap-2">
                <span class="text-purple-600">✓</span>
                <span>Без комиссии</span>
              </div>
              <div class="flex items-center gap-2">
                <span class="text-purple-600">✓</span>
                <span>Оплата с телефона</span>
              </div>
              <div class="flex items-center gap-2">
                <span class="text-purple-600">✓</span>
                <span>Моментальное зачисление</span>
              </div>
            </div>

            <div class="bg-purple-50 p-3 rounded-lg">
              <p class="text-xs text-gray-700">
                Удобно для постоянных покупателей
              </p>
            </div>
          </div>

          <!-- Подарочные карты -->
          <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition">
            <div class="bg-gradient-to-br from-yellow-100 to-orange-100 p-4 rounded-xl mb-4 text-center">
              <span class="text-5xl">🎁</span>
            </div>
            <h3 class="text-xl font-bold mb-3">Подарочные карты</h3>
            <p class="text-gray-600 mb-4">Электронные сертификаты</p>
            
            <div class="space-y-2 text-sm mb-4">
              <div class="flex items-center gap-2">
                <span class="text-orange-600">✓</span>
                <span>Полная оплата</span>
              </div>
              <div class="flex items-center gap-2">
                <span class="text-orange-600">✓</span>
                <span>Частичная оплата</span>
              </div>
              <div class="flex items-center gap-2">
                <span class="text-orange-600">✓</span>
                <span>Совместимы с акциями</span>
              </div>
              <div class="flex items-center gap-2">
                <span class="text-orange-600">✓</span>
                <span>Срок действия 1 год</span>
              </div>
            </div>

            <div class="bg-orange-50 p-3 rounded-lg">
              <p class="text-xs text-gray-700">
                Идеальный подарок для близких
              </p>
            </div>
          </div>

          <!-- Оплата в рассрочку -->
          <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition">
            <div class="bg-gradient-to-br from-indigo-100 to-blue-100 p-4 rounded-xl mb-4 text-center">
              <span class="text-5xl">📊</span>
            </div>
            <h3 class="text-xl font-bold mb-3">Рассрочка</h3>
            <p class="text-gray-600 mb-4">0% без переплаты</p>
            
            <div class="space-y-2 text-sm mb-4">
              <div class="flex items-center gap-2">
                <span class="text-blue-600">✓</span>
                <span>Kaspi Рассрочка 3-12 мес</span>
              </div>
              <div class="flex items-center gap-2">
                <span class="text-blue-600">✓</span>
                <span>Халва 0-0-12</span>
              </div>
              <div class="flex items-center gap-2">
                <span class="text-blue-600">✓</span>
                <span>Без первоначального взноса</span>
              </div>
              <div class="flex items-center gap-2">
                <span class="text-blue-600">✓</span>
                <span>Одобрение за 5 минут</span>
              </div>
            </div>

            <div class="bg-blue-50 p-3 rounded-lg">
              <p class="text-xs text-gray-700">
                Покупайте сейчас - платите частями
              </p>
            </div>
          </div>
        </div>
      </div>

      <!-- Информация о рассрочке -->
      <div class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-2xl p-8 text-white mb-8">
        <h2 class="text-2xl font-bold mb-4">📊 Рассрочка 0-0-12</h2>
        <div class="grid md:grid-cols-3 gap-6">
          <div>
            <div class="text-3xl font-bold mb-2">0%</div>
            <p>Переплата</p>
          </div>
          <div>
            <div class="text-3xl font-bold mb-2">0 ₸</div>
            <p>Первый взнос</p>
          </div>
          <div>
            <div class="text-3xl font-bold mb-2">12 мес</div>
            <p>Срок рассрочки</p>
          </div>
        </div>
        <p class="mt-4 text-sm opacity-90">
          Рассрочка доступна для заказов от 10 000 ₸. Оформление онлайн за 5 минут.
        </p>
      </div>

      <!-- Возврат и обмен -->
      <div class="bg-white rounded-xl p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">🔄 Возврат и обмен</h2>
        
        <div class="grid md:grid-cols-2 gap-8">
          <div>
            <h3 class="font-bold text-lg mb-4 flex items-center gap-2">
              <span class="text-2xl">↩️</span>
              Возврат товара
            </h3>
            <div class="space-y-3 text-gray-700">
              <p>
                <strong>Срок:</strong> В течение 30 дней с момента получения
              </p>
              <p>
                <strong>Условия:</strong> Товар не использовался, сохранена упаковка и чек
              </p>
              <p>
                <strong>Возврат денег:</strong> 3-5 рабочих дней на карту или кошелек
              </p>
              <p>
                <strong>Доставка возврата:</strong> Бесплатно при браке, за ваш счет если не подошел
              </p>
            </div>
          </div>

          <div>
            <h3 class="font-bold text-lg mb-4 flex items-center gap-2">
              <span class="text-2xl">🔁</span>
              Обмен товара
            </h3>
            <div class="space-y-3 text-gray-700">
              <p>
                <strong>Срок:</strong> В течение 14 дней с момента покупки
              </p>
              <p>
                <strong>Условия:</strong> Товар в оригинальной упаковке с бирками
              </p>
              <p>
                <strong>Обмен:</strong> На аналогичный товар или другой из ассортимента
              </p>
              <p>
                <strong>Доставка обмена:</strong> Бесплатная доставка нового товара
              </p>
            </div>
          </div>
        </div>

        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mt-6">
          <p class="font-semibold text-yellow-800 mb-2">⚠️ Важно знать:</p>
          <ul class="text-sm text-yellow-700 space-y-1">
            <li>• Косметика не подлежит возврату если нарушена упаковка</li>
            <li>• Парфюмерия возвращается только при производственном браке</li>
            <li>• При обмене учитывается текущая цена товара</li>
          </ul>
        </div>
      </div>

      <!-- Гарантия качества -->
      <div class="bg-white rounded-xl p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">✨ Гарантия качества</h2>
        
        <div class="grid md:grid-cols-3 gap-6">
          <div class="text-center">
            <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
              <span class="text-3xl">✓</span>
            </div>
            <h3 class="font-bold mb-2">100% оригинал</h3>
            <p class="text-sm text-gray-600">
              Работаем только с официальными дистрибьюторами
            </p>
          </div>

          <div class="text-center">
            <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
              <span class="text-3xl">🛡️</span>
            </div>
            <h3 class="font-bold mb-2">Сертификаты</h3>
            <p class="text-sm text-gray-600">
              Вся продукция имеет сертификаты качества
            </p>
          </div>

          <div class="text-center">
            <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
              <span class="text-3xl">📦</span>
            </div>
            <h3 class="font-bold mb-2">Проверка при получении</h3>
            <p class="text-sm text-gray-600">
              Осмотрите товар перед оплатой курьеру
            </p>
          </div>
        </div>
      </div>

      <!-- FAQ -->
      <div class="bg-white rounded-xl p-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">❓ Частые вопросы об оплате</h2>
        <div class="space-y-4">
          <details class="border-b pb-4">
            <summary class="font-semibold cursor-pointer hover:text-pink-600 transition">
              Безопасно ли оплачивать картой онлайн?
            </summary>
            <p class="mt-2 text-gray-600">
              Да, абсолютно безопасно. Мы используем защищенное соединение по стандарту PCI DSS. 
              Данные вашей карты передаются напрямую в банк, мы их не храним.
            </p>
          </details>

          <details class="border-b pb-4">
            <summary class="font-semibold cursor-pointer hover:text-pink-600 transition">
              Можно ли оплатить часть заказа картой, часть наличными?
            </summary>
            <p class="mt-2 text-gray-600">
              Нет, заказ оплачивается полностью одним способом. Но вы можете использовать 
              подарочную карту + любой другой способ оплаты.
            </p>
          </details>

          <details class="border-b pb-4">
            <summary class="font-semibold cursor-pointer hover:text-pink-600 transition">
              Сколько действует рассрочка?
            </summary>
            <p class="mt-2 text-gray-600">
              Рассрочка доступна от 3 до 12 месяцев в зависимости от суммы заказа. 
              Для заказов от 50 000 ₸ доступна рассрочка на 12 месяцев.
            </p>
          </details>

          <details class="border-b pb-4">
            <summary class="font-semibold cursor-pointer hover:text-pink-600 transition">
              Когда вернутся деньги при возврате?
            </summary>
            <p class="mt-2 text-gray-600">
              Деньги возвращаются в течение 3-5 рабочих дней после получения товара на наш склад. 
              Возврат происходит тем же способом, которым была оплата.
            </p>
          </details>

          <details class="pb-4">
            <summary class="font-semibold cursor-pointer hover:text-pink-600 transition">
              Есть ли комиссия при оплате?
            </summary>
            <p class="mt-2 text-gray-600">
              Нет, мы не берем комиссию за оплату любым способом. Вы платите только стоимость 
              товара и доставки (если не бесплатная).
            </p>
          </details>
        </div>
      </div>

      <!-- Контакты поддержки -->
      <div class="bg-gradient-to-r from-pink-100 to-purple-100 rounded-2xl p-8 mt-8">
        <div class="text-center">
          <h2 class="text-2xl font-bold text-gray-900 mb-4">Нужна помощь с оплатой?</h2>
          <p class="text-gray-700 mb-6">Наши специалисты помогут выбрать удобный способ оплаты</p>
          <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="tel:+77005553535" class="bg-pink-600 text-white px-8 py-3 rounded-full hover:bg-pink-700 transition font-medium">
              📞 8 777 555-35-35
            </a>
            
          </div>
        </div>
      </div>
    </section>

  </div>
</template>

<script>


export default {
  name: 'Payment',
  components: {
   
  }
}
</script>
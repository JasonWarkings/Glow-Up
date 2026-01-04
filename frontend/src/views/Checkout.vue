<template>
  <div class="min-h-screen bg-gray-50">
 
    
    <section class="max-w-7xl mx-auto px-4 py-12">
      <!-- Breadcrumbs -->
      <div class="mb-6 flex items-center gap-2 text-sm">
        <router-link to="/cart" class="text-gray-600 hover:text-pink-600">Корзина</router-link>
        <span class="text-gray-400">→</span>
        <span class="text-pink-600 font-medium">Оформление заказа</span>
      </div>

      <!-- Заголовок -->
      <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-8">🛍️ Оформление заказа</h1>

      <div class="grid lg:grid-cols-3 gap-8">
        <!-- Левая колонка - Форма -->
        <div class="lg:col-span-2 space-y-6">
          <!-- Контактные данные -->
          <div class="bg-white rounded-xl p-6 shadow-md">
            <h2 class="text-xl font-bold mb-4 flex items-center gap-2">
              <span>👤</span> Контактные данные
            </h2>
            <div class="space-y-4">
              <div class="grid md:grid-cols-2 gap-4">
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-2">
                    Имя *
                  </label>
                  <input 
                    v-model="orderForm.firstName"
                    type="text" 
                    required
                    placeholder="Ваше имя"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent outline-none"
                  />
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-2">
                    Фамилия *
                  </label>
                  <input 
                    v-model="orderForm.lastName"
                    type="text" 
                    required
                    placeholder="Ваша фамилия"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent outline-none"
                  />
                </div>
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                  Телефон *
                </label>
                <input 
                  v-model="orderForm.phone"
                  type="tel" 
                  required
                  placeholder="+7 (___) ___-__-__"
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent outline-none"
                />
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                  Email *
                </label>
                <input 
                  v-model="orderForm.email"
                  type="email" 
                  required
                  placeholder="example@email.com"
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent outline-none"
                />
                <p class="text-xs text-gray-500 mt-1">На этот email придет подтверждение заказа</p>
              </div>
            </div>
          </div>

          <!-- Способ доставки -->
          <div class="bg-white rounded-xl p-6 shadow-md">
            <h2 class="text-xl font-bold mb-4 flex items-center gap-2">
              <span>🚚</span> Способ доставки
            </h2>
            <div class="space-y-3">
              <label 
                v-for="delivery in deliveryMethods" 
                :key="delivery.id"
                class="flex items-start gap-4 p-4 border-2 rounded-lg cursor-pointer transition"
                :class="orderForm.delivery === delivery.id ? 'border-pink-500 bg-pink-50' : 'border-gray-200 hover:border-pink-300'"
              >
                <input 
                  v-model="orderForm.delivery"
                  type="radio" 
                  :value="delivery.id"
                  class="mt-1"
                />
                <div class="flex-1">
                  <div class="flex items-center justify-between mb-1">
                    <span class="font-semibold">{{ delivery.name }}</span>
                    <span class="text-pink-600 font-bold">{{ delivery.price }} ₸</span>
                  </div>
                  <p class="text-sm text-gray-600">{{ delivery.description }}</p>
                  <p class="text-xs text-gray-500 mt-1">Срок: {{ delivery.time }}</p>
                </div>
              </label>
            </div>
          </div>

          <!-- Адрес доставки -->
          <div v-if="orderForm.delivery !== 'pickup'" class="bg-white rounded-xl p-6 shadow-md">
            <h2 class="text-xl font-bold mb-4 flex items-center gap-2">
              <span>📍</span> Адрес доставки
            </h2>
            <div class="space-y-4">
              <div class="grid md:grid-cols-2 gap-4">
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-2">
                    Город *
                  </label>
                  <select 
                    v-model="orderForm.city"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent outline-none"
                  >
                    <option value="">Выберите город</option>
                    <option value="astana">Астана</option>
                    <option value="almaty">Алматы</option>
                    <option value="shymkent">Шымкент</option>
                    <option value="karaganda">Караганда</option>
                    <option value="aktobe">Актобе</option>
                  </select>
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-2">
                    Индекс
                  </label>
                  <input 
                    v-model="orderForm.zip"
                    type="text" 
                    placeholder="010000"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent outline-none"
                  />
                </div>
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                  Улица *
                </label>
                <input 
                  v-model="orderForm.street"
                  type="text" 
                  required
                  placeholder="Название улицы"
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent outline-none"
                />
              </div>

              <div class="grid grid-cols-3 gap-4">
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-2">
                    Дом *
                  </label>
                  <input 
                    v-model="orderForm.house"
                    type="text" 
                    required
                    placeholder="№"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent outline-none"
                  />
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-2">
                    Квартира
                  </label>
                  <input 
                    v-model="orderForm.apartment"
                    type="text" 
                    placeholder="№"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent outline-none"
                  />
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-2">
                    Подъезд
                  </label>
                  <input 
                    v-model="orderForm.entrance"
                    type="text" 
                    placeholder="№"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent outline-none"
                  />
                </div>
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                  Комментарий к заказу
                </label>
                <textarea 
                  v-model="orderForm.comment"
                  rows="3"
                  placeholder="Укажите удобное время доставки, код домофона и другие детали"
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent outline-none resize-none"
                ></textarea>
              </div>
            </div>
          </div>

          <!-- Способ оплаты -->
          <div class="bg-white rounded-xl p-6 shadow-md">
            <h2 class="text-xl font-bold mb-4 flex items-center gap-2">
              <span>💳</span> Способ оплаты
            </h2>
            <div class="space-y-3">
              <label 
                v-for="payment in paymentMethods" 
                :key="payment.id"
                class="flex items-start gap-4 p-4 border-2 rounded-lg cursor-pointer transition"
                :class="orderForm.payment === payment.id ? 'border-pink-500 bg-pink-50' : 'border-gray-200 hover:border-pink-300'"
              >
                <input 
                  v-model="orderForm.payment"
                  type="radio" 
                  :value="payment.id"
                  class="mt-1"
                />
                <div class="flex-1">
                  <div class="flex items-center gap-2 mb-1">
                    <span class="text-xl">{{ payment.icon }}</span>
                    <span class="font-semibold">{{ payment.name }}</span>
                  </div>
                  <p class="text-sm text-gray-600">{{ payment.description }}</p>
                </div>
              </label>
            </div>
          </div>

          <!-- Промокод -->
          <div class="bg-white rounded-xl p-6 shadow-md">
            <h2 class="text-xl font-bold mb-4 flex items-center gap-2">
              <span>🎟️</span> Промокод
            </h2>
            <div class="flex gap-3">
              <input 
                v-model="promoCode"
                type="text" 
                placeholder="Введите промокод"
                class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent outline-none"
              />
              <button 
                @click="applyPromoCode"
                class="px-6 py-3 bg-pink-600 text-white rounded-lg hover:bg-pink-700 transition font-medium"
              >
                Применить
              </button>
            </div>
            <p v-if="promoApplied" class="text-green-600 text-sm mt-2">✓ Промокод применен! Скидка 10%</p>
          </div>
        </div>

        <!-- Правая колонка - Итого -->
        <div class="lg:col-span-1">
          <div class="bg-white rounded-xl p-6 shadow-md sticky top-24">
            <h2 class="text-xl font-bold mb-4">Ваш заказ</h2>
            
            <!-- Товары -->
            <div class="space-y-3 mb-4 max-h-60 overflow-y-auto">
              <div v-for="item in cartItems" :key="item.id" class="flex gap-3 pb-3 border-b">
                <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center">
                  <span class="text-2xl">{{ item.icon }}</span>
                </div>
                <div class="flex-1">
                  <h3 class="font-medium text-sm">{{ item.name }}</h3>
                  <p class="text-xs text-gray-500">{{ item.brand }}</p>
                  <div class="flex justify-between items-center mt-1">
                    <span class="text-xs text-gray-600">{{ item.quantity }} шт</span>
                    <span class="font-bold text-sm">{{ item.price }} ₸</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Расчет -->
            <div class="space-y-2 py-4 border-t">
              <div class="flex justify-between text-sm">
                <span class="text-gray-600">Товары ({{ totalItems }} шт):</span>
                <span class="font-semibold">{{ subtotal }} ₸</span>
              </div>
              <div class="flex justify-between text-sm">
                <span class="text-gray-600">Доставка:</span>
                <span class="font-semibold">{{ deliveryCost }} ₸</span>
              </div>
              <div v-if="promoApplied" class="flex justify-between text-sm text-green-600">
                <span>Скидка:</span>
                <span class="font-semibold">-{{ discount }} ₸</span>
              </div>
            </div>

            <!-- Итого -->
            <div class="border-t pt-4 mb-6">
              <div class="flex justify-between items-center">
                <span class="text-lg font-bold">Итого:</span>
                <span class="text-2xl font-bold text-pink-600">{{ total }} ₸</span>
              </div>
            </div>

            <!-- Кнопка оформления -->
            <button 
              @click="submitOrder"
              class="w-full bg-pink-600 text-white py-4 rounded-lg hover:bg-pink-700 transition font-bold text-lg mb-4"
            >
              Оформить заказ
            </button>

            <div class="text-xs text-gray-500 text-center">
              Нажимая кнопку, вы соглашаетесь с 
              <a href="#" class="text-pink-600 hover:underline">условиями использования</a>
            </div>

            <!-- Безопасность -->
            <div class="mt-6 p-4 bg-green-50 rounded-lg">
              <div class="flex items-center gap-2 text-sm text-green-700">
                <span class="text-xl">🔒</span>
                <span class="font-medium">Безопасная оплата</span>
              </div>
              <p class="text-xs text-gray-600 mt-1">Ваши данные защищены SSL-шифрованием</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    
 
  </div>
</template>

<script>


export default {
  name: 'Checkout',
  components: {
  
  },
  data() {
    return {
      orderForm: {
        firstName: '',
        lastName: '',
        phone: '',
        email: '',
        delivery: 'courier',
        city: '',
        zip: '',
        street: '',
        house: '',
        apartment: '',
        entrance: '',
        comment: '',
        payment: 'card'
      },
      promoCode: '',
      promoApplied: false,
      cartItems: [
        { id: 1, name: 'Увлажняющий крем', brand: 'La Roche-Posay', price: 2890, quantity: 1, icon: '✨' },
        { id: 2, name: 'Тушь для ресниц', brand: "L'Oréal Paris", price: 1490, quantity: 2, icon: '💄' }
      ],
      deliveryMethods: [
        { id: 'courier', name: 'Курьерская доставка', price: 1500, description: 'Доставка по городу', time: '1-2 дня' },
        { id: 'pickup', name: 'Пункты выдачи', price: 800, description: 'Самовывоз из пункта CDEK', time: '2-5 дней' },
        { id: 'post', name: 'Постамат', price: 1000, description: 'Круглосуточная выдача', time: '2-5 дней' },
        { id: 'store', name: 'Самовывоз из магазина', price: 0, description: 'Бесплатно', time: 'в день заказа' }
      ],
      paymentMethods: [
        { id: 'card', name: 'Банковская карта', icon: '💳', description: 'Visa, Mastercard, МИР' },
        { id: 'kaspi', name: 'Kaspi QR', icon: '🏦', description: 'Оплата через Kaspi' },
        { id: 'cash', name: 'Наличными', icon: '💵', description: 'При получении заказа' },
        { id: 'wallet', name: 'Электронный кошелек', icon: '📱', description: 'СБП, ЮMoney' }
      ]
    }
  },
  computed: {
    subtotal() {
      return this.cartItems.reduce((sum, item) => sum + (item.price * item.quantity), 0)
    },
    deliveryCost() {
      const method = this.deliveryMethods.find(d => d.id === this.orderForm.delivery)
      return method ? (this.subtotal >= 15000 ? 0 : method.price) : 0
    },
    discount() {
      return this.promoApplied ? Math.round(this.subtotal * 0.1) : 0
    },
    total() {
      return this.subtotal + this.deliveryCost - this.discount
    },
    totalItems() {
      return this.cartItems.reduce((sum, item) => sum + item.quantity, 0)
    }
  },
  methods: {
    applyPromoCode() {
      if (this.promoCode.toLowerCase() === 'glowup10') {
        this.promoApplied = true
      } else {
        alert('Неверный промокод')
      }
    },
    submitOrder() {
      // Валидация
      if (!this.orderForm.firstName || !this.orderForm.phone || !this.orderForm.email) {
        alert('Заполните обязательные поля')
        return
      }
      
      alert(`Заказ оформлен!\nСумма: ${this.total} ₸\nСпособ доставки: ${this.orderForm.delivery}\nСпособ оплаты: ${this.orderForm.payment}`)
      this.$router.push('/profile')
    }
  }
}
</script>
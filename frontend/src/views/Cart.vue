<template>
  <div class="min-h-screen bg-gray-50">
    <section class="max-w-7xl mx-auto px-4 py-12">
      <h1 class="text-3xl font-bold mb-8">🛒 Корзина</h1>

      <div v-if="cartEmpty" class="bg-white rounded-xl p-12 text-center">
        <span class="text-6xl mb-4 block">🛍️</span>
        <h2 class="text-2xl font-bold mb-4">Корзина пуста</h2>
        <p class="text-gray-600 mb-6">Добавьте товары из каталога</p>
        <router-link to="/catalog">
          <button class="bg-pink-600 text-white px-8 py-3 rounded-full hover:bg-pink-700">
            Перейти в каталог
          </button>
        </router-link>
      </div>

      <div v-else class="grid lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-4">
          <div v-for="item in cartItems" :key="item.id" class="bg-white rounded-xl p-6 shadow-md">
            <div class="flex gap-4">
              <div class="w-24 h-24 bg-gray-100 rounded-lg flex items-center justify-center overflow-hidden">
                <img :src="item.image || fallbackImage" :alt="item.name" class="w-full h-full object-cover"/>
              </div>
              <div class="flex-1">
                <h3 class="font-bold text-lg mb-1">{{ item.name }}</h3>
                <p class="text-sm text-gray-500 mb-2">{{ item.brand }}</p>
                <div class="flex items-center justify-between">
                  <div class="flex items-center gap-3">
                    <button @click="decreaseQuantity(item.id)" class="w-8 h-8 bg-gray-200 rounded-full hover:bg-gray-300">-</button>
                    <span class="font-semibold">{{ item.quantity }}</span>
                    <button @click="increaseQuantity(item.id)" class="w-8 h-8 bg-gray-200 rounded-full hover:bg-gray-300">+</button>
                  </div>
                  <div class="text-right">
                    <div class="text-xl font-bold text-pink-600">{{ item.price * item.quantity }} ₸</div>
                    <button @click="removeItem(item.id)" class="text-sm text-red-500 hover:text-red-700">Удалить</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="lg:col-span-1">
          <div class="bg-white rounded-xl p-6 sticky top-24">
            <h3 class="font-bold text-xl mb-4">Итого</h3>
            <div class="space-y-2 mb-4">
              <div class="flex justify-between">
                <span class="text-gray-600">Товары ({{ totalItems }} шт):</span>
                <span class="font-semibold">{{ subtotal }} ₸</span>
              </div>
              <div class="flex justify-between">
                <span class="text-gray-600">Доставка:</span>
                <span class="font-semibold">{{ deliveryCost }} ₸</span>
              </div>
            </div>
            <div class="border-t pt-4 mb-4">
              <div class="flex justify-between text-xl font-bold">
                <span>К оплате:</span>
                <span class="text-pink-600">{{ total }} ₸</span>
              </div>
            </div>
            <router-link to="/checkout">
              <button class="w-full bg-pink-600 text-white py-3 rounded-lg hover:bg-pink-700 mb-3">Оформить заказ</button>
            </router-link>
            <router-link to="/catalog">
              <button class="w-full bg-gray-200 text-gray-700 py-3 rounded-lg hover:bg-gray-300">Продолжить покупки</button>
            </router-link>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: 'Cart',
  data() {
    return {
      cartItems: [],
      cartEmpty: false,
      apiBase: "http://localhost:8000",
      fallbackImage: "https://source.unsplash.com/100x100/?cosmetics"
    }
  },
  mounted() {
    this.fetchCart();
  },
  computed: {
    subtotal() {
      return this.cartItems.reduce((sum, item) => sum + item.price * item.quantity, 0);
    },
    deliveryCost() {
      return this.subtotal >= 15000 ? 0 : 1500;
    },
    total() {
      return this.subtotal + this.deliveryCost;
    },
    totalItems() {
      return this.cartItems.reduce((sum, item) => sum + item.quantity, 0);
    }
  },
  methods: {
    async fetchCart() {
      try {
        const res = await axios.get(`${this.apiBase}/api/cart`);
        this.cartItems = res.data.map(item => ({
          ...item,
          image: item.image ? `${this.apiBase}/storage/${item.image}` : null
        }));
        this.cartEmpty = this.cartItems.length === 0;
      } catch(e) {
        console.error("Ошибка получения корзины:", e);
      }
    },
    async increaseQuantity(id) {
      const item = this.cartItems.find(i => i.id === id);
      if (!item) return;
      await axios.post(`${this.apiBase}/api/cart/update/${id}`, { quantity: item.quantity + 1 });
      await this.fetchCart();
    },
    async decreaseQuantity(id) {
      const item = this.cartItems.find(i => i.id === id);
      if (!item) return;
      if (item.quantity <= 1) {
        await axios.delete(`${this.apiBase}/api/cart/remove/${id}`);
      } else {
        await axios.post(`${this.apiBase}/api/cart/update/${id}`, { quantity: item.quantity - 1 });
      }
      await this.fetchCart();
    },
    async removeItem(id) {
      await axios.delete(`${this.apiBase}/api/cart/remove/${id}`);
      await this.fetchCart();
    }
  }
}
</script>

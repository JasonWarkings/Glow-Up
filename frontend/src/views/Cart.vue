<template>
  <div class="min-h-screen bg-gray-50 flex flex-col">
    <main class="flex-grow">
      <section class="max-w-4xl mx-auto px-4 py-12">
        <h1 class="text-3xl font-bold text-gray-900 mb-6 text-center">
          Корзина
        </h1>

        <div v-if="cartItems.length === 0" class="text-center text-gray-600">
          Корзина пуста
        </div>

        <div v-else>
          <div v-for="item in cartItems" :key="item.id" class="flex items-center justify-between bg-white p-4 rounded-xl shadow mb-4">
            <img :src="item.image ? '/storage/' + item.image : 'https://source.unsplash.com/100x100/?cosmetics'" class="w-24 h-24 object-cover rounded" />
            <div class="flex-1 ml-4">
              <h3 class="text-lg font-semibold">{{ item.title }}</h3>
              <p class="text-gray-600">{{ item.brand }}</p>
              <p class="text-pink-600 font-bold mt-1">{{ item.price }} ₸</p>
            </div>
            <div class="flex items-center gap-2">
              <button @click="decreaseQuantity(item.id)" class="px-2 py-1 bg-gray-200 rounded">-</button>
              <span>{{ item.quantity }}</span>
              <button @click="increaseQuantity(item.id)" class="px-2 py-1 bg-gray-200 rounded">+</button>
              <button @click="removeItem(item.id)" class="ml-4 text-red-500">Удалить</button>
            </div>
          </div>

          <div class="text-right mt-6">
            <p>Сумма: <span class="font-bold">{{ subtotal }} ₸</span></p>
            <p>Доставка: <span class="font-bold">{{ deliveryCost }} ₸</span></p>
            <p>Итого: <span class="font-bold">{{ total }} ₸</span></p>
          </div>
        </div>
      </section>
    </main>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "Cart",
  data() {
    return {
      cartItems: [],
    };
  },
  mounted() {
    this.fetchCart();
  },
  computed: {
    subtotal() {
      return this.cartItems.reduce((sum, i) => sum + i.price * i.quantity, 0);
    },
    deliveryCost() {
      return this.subtotal >= 15000 ? 0 : 1500;
    },
    total() {
      return this.subtotal + this.deliveryCost;
    },
  },
  methods: {
    async fetchCart() {
      try {
        const res = await axios.get("http://localhost:8000/api/cart");
        this.cartItems = res.data;
      } catch (e) {
        console.error("Ошибка при получении корзины:", e);
      }
    },

    async increaseQuantity(id) {
      const item = this.cartItems.find(i => i.id === id);
      await axios.post(`http://localhost:8000/api/cart/update/${id}`, { quantity: item.quantity + 1 });
      this.fetchCart();
    },

    async decreaseQuantity(id) {
      const item = this.cartItems.find(i => i.id === id);
      if (item.quantity <= 1) return;
      await axios.post(`http://localhost:8000/api/cart/update/${id}`, { quantity: item.quantity - 1 });
      this.fetchCart();
    },

    async removeItem(id) {
      await axios.delete(`http://localhost:8000/api/cart/remove/${id}`);
      this.fetchCart();
    },
  },
};
</script>

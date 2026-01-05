<template>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div
        v-for="product in products"
        :key="product.id"
        class="bg-white rounded-lg p-4 shadow-md"
    >
      <img :src="product.image || fallbackImage" class="w-full h-40 object-cover mb-2" />
      <h3 class="font-semibold">{{ product.title }}</h3>
      <p class="text-gray-500 text-sm">{{ product.brand }}</p>
      <div class="flex justify-between items-center mt-2">
        <span class="font-bold">{{ product.price }} ₸</span>
        <button
            @click="addToCart(product.id)"
            class="bg-pink-600 text-white px-3 py-1 rounded hover:bg-pink-700"
        >
          В корзину
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "Catalog",
  data() {
    return {
      products: [],
      fallbackImage: "https://source.unsplash.com/100x100/?cosmetics",
      apiBase: "http://localhost:8000",
    };
  },
  mounted() {
    this.fetchProducts();
  },
  methods: {
    async fetchProducts() {
      try {
        const res = await axios.get(`${this.apiBase}/api/products`);
        this.products = res.data.map(p => ({
          ...p,
          image: p.image ? `${this.apiBase}/storage/${p.image}` : null
        }));
      } catch (e) {
        console.error("Ошибка получения продуктов:", e);
      }
    },
    async addToCart(productId) {
      try {
        // Временно тестовый пользователь, без токена
        await axios.post(`${this.apiBase}/api/cart/add`, { product_id: productId });
        alert("Товар добавлен в корзину!");
      } catch (e) {
        console.error("Ошибка добавления в корзину:", e.response?.data || e);
        alert("Ошибка добавления в корзину");
      }
    }
  }
};
</script>

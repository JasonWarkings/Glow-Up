<template>
  <div class="min-h-screen bg-gray-50 flex flex-col">
    <main class="flex-grow">
      <section class="max-w-7xl mx-auto px-4 py-12">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-10 text-center">
          Каталог товаров
        </h1>

        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
          <div
              v-for="product in products"
              :key="product.id"
              class="bg-white rounded-2xl shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden flex flex-col"
          >
            <div class="relative">
              <img
                  :src="product.image || fallbackImage"
                  :alt="product.title"
                  class="w-full h-60 object-cover"
              />
            </div>
            <div class="p-5 flex flex-col flex-grow">
              <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ product.title }}</h3>
              <p class="text-gray-600 mb-4 flex-grow">{{ product.description || '' }}</p>
              <div class="flex items-center justify-between">
                <span class="text-xl font-bold text-pink-600">{{ product.price }} ₸</span>
                <button
                    @click="addToCart(product)"
                    class="bg-gradient-to-r from-pink-500 to-purple-500 text-white px-4 py-2 rounded-xl hover:opacity-90 transition"
                >
                  В корзину
                </button>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "Catalog",
  data() {
    return {
      products: [],
      cartCount: 0,
      fallbackImage: "https://source.unsplash.com/400x400/?cosmetics",
    };
  },
  mounted() {
    this.fetchProducts();
    this.fetchCartCount();
  },
  methods: {
    async fetchProducts() {
      try {
        const res = await axios.get("http://localhost:8000/api/products");
        this.products = res.data.map(product => ({
          ...product,
          image: product.image
              ? `http://localhost:8000/storage/${product.image}`
              : null,
        }));
      } catch (e) {
        console.error("Ошибка при получении товаров:", e);
      }
    },

    async addToCart(product) {
      const token = localStorage.getItem('token')
      if (!token) {
        alert('Сначала войдите в аккаунт, чтобы добавить товар в корзину')
        return this.$router.push('/login')
      }

      try {
        await axios.post("http://localhost:8000/api/cart/add", {
          product_id: Number(product.id)
        }, {
          headers: {
            'Content-Type': 'application/json'
          }
        });
        alert(`${product.title} добавлен в корзину!`)
      } catch (e) {
        if (e.response && e.response.status === 409) {
          alert("Этот товар уже в корзине!")
        } else {
          alert("Ошибка добавления товара в корзину")
          console.error(e.response?.data || e)
        }
      }
    },


    async fetchCartCount() {
      try {
        const res = await axios.get("http://localhost:8000/api/cart");
        this.cartCount = res.data.length;
      } catch (e) {
        console.error("Ошибка при получении корзины:", e);
      }
    },
  },
};
</script>

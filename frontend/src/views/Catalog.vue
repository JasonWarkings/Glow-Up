<template>
  <div class="min-h-screen bg-gray-50 flex flex-col">
  

    <main class="flex-grow">
      <section class="max-w-7xl mx-auto px-4 py-12">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-10 text-center">
          Каталог товаров
        </h1>

        <!-- Сетка карточек -->
        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
          <div
            v-for="product in products"
            :key="product.id"
            class="bg-white rounded-2xl shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden flex flex-col"
          >
            <div class="relative">
              <img
                :src="product.image"
                :alt="product.name"
                class="w-full h-60 object-cover"
              />
              <button
                class="absolute top-3 right-3 bg-white/80 hover:bg-white text-pink-600 p-2 rounded-full shadow"
              >
                <i class="fas fa-heart"></i>
              </button>
            </div>
            <div class="p-5 flex flex-col flex-grow">
              <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ product.name }}</h3>
              <p class="text-gray-600 mb-4 flex-grow">{{ product.description }}</p>
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


export default {

  data() {
    return {
      cartCount: 0,
      products: [
        {
          id: 1,
          name: 'Матовая помада Velvet Kiss',
          description: 'Нежная текстура, стойкость до 8 часов.',
          price: 2490,
          image: 'https://source.unsplash.com/400x400/?lipstick,makeup',
        },
        {
          id: 2,
          name: 'Увлажняющий крем Glow Skin',
          description: 'С натуральными маслами и витамином Е.',
          price: 3290,
          image: 'https://source.unsplash.com/400x400/?cream,cosmetics',
        },
        {
          id: 3,
          name: 'Тушь для ресниц Volume Lash',
          description: 'Придает объем и длину, не осыпается.',
          price: 2790,
          image: 'https://source.unsplash.com/400x400/?mascara,makeup',
        },
        {
          id: 4,
          name: 'Тональный крем Natural Fit',
          description: 'Легкая формула, подходит для всех типов кожи.',
          price: 3590,
          image: 'https://source.unsplash.com/400x400/?foundation,makeup',
        },
        {
          id: 5,
          name: 'Палетка теней Rose Mood',
          description: '6 оттенков для дневного и вечернего макияжа.',
          price: 4590,
          image: 'https://source.unsplash.com/400x400/?eyeshadow,makeup',
        },
        {
          id: 6,
          name: 'Блеск для губ Shine Glow',
          description: 'Создает эффект влажных губ и ухаживает за ними.',
          price: 1990,
          image: 'https://source.unsplash.com/400x400/?lipgloss,cosmetics',
        },
      ],
    }
  },
  mounted() {
    const cart = JSON.parse(localStorage.getItem('cart')) || []
    this.cartCount = cart.length
  },
  methods: {
    addToCart(product) {
      let cart = JSON.parse(localStorage.getItem('cart')) || []
      const existing = cart.find(item => item.id === product.id)
      if (!existing) {
        cart.push(product)
        localStorage.setItem('cart', JSON.stringify(cart))
        this.cartCount = cart.length
        alert(`${product.name} добавлен в корзину!`)
      } else {
        alert('Этот товар уже в корзине!')
      }
    },
  },
}
</script>

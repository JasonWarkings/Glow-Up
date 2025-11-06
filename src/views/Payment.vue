<template>
  <div class="min-h-screen bg-gray-50">
  
    
    <section class="max-w-7xl mx-auto px-4 py-12">
      <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-8">Оплата</h1>
      <div class="bg-white rounded-xl p-8">
        <h2 class="text-2xl font-bold mb-4">Способы оплаты</h2>
        <p class="text-gray-700">Банковские карты, электронные кошельки, наличные</p>
      </div>
    </section>
    
   
  </div>
</template>

<script>
import Header from '../components/Header.vue'
import Footer from '../components/Footer.vue'

export default {
  name: 'Payment',
  components: { Header, Footer }
}
</script>
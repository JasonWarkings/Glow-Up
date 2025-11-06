<!-- src/components/ProductList.vue -->
<template>
  <div class="product-list">
    <ProductCard 
      v-for="product in products" 
      :key="product.id" 
      :product="product" 
      @add-to-cart="addToCart"/>
  </div>
</template>

<script>
import ProductCard from './ProductCard.vue'
export default {
  props: ['products'],
  components: { ProductCard },
  methods: {
    addToCart(product, shade) {
      this.$emit('add-to-cart', product, shade)
    }
  }
}
</script>

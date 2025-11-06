<template>
  <div class="product-card">
    <h3>{{ product.name }}</h3>
    <p>Цена: {{ product.price }} ₽</p>
  </div>
</template>

<script>
export default {
  props: ['product']
}
</script>

<style scoped>
.product-card {
  border: 1px solid #ddd;
  padding: 10px;
  border-radius: 6px;
  width: 180px;
}
</style>

<template>
  <div class="card">
    <img :src="image" alt="product" />
    <h3>{{ name }}</h3>
    <p>{{ price }} ₸</p>
    <button>В корзину</button>
  </div>
</template>

<script>
export default {
  props: ['name', 'price', 'image']
}
</script>

<style scoped>
.card {
  background: #fff;
  border-radius: 12px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.1);
  padding: 1rem;
  text-align: center;
}
.card img {
  width: 100%;
  border-radius: 8px;
}
button {
  margin-top: 10px;
  padding: 0.5rem 1rem;
  border: none;
  background: #c7d4a9;
  color: white;
  border-radius: 6px;
  cursor: pointer;
}
button:hover {
  background: #c7d4a9;
}
</style>

<template>
  <div class="catalog-page">
    <h1 class="catalog-title">Каталог товаров</h1>

    <div class="product-grid">
      <div class="product-card" v-for="product in products" :key="product.id">
        <img :src="product.image" :alt="product.name" class="product-image" />
        <h2 class="product-name">{{ product.name }}</h2>
        <p class="product-price">{{ product.price }}₽</p>
        <button class="buy-button">В корзину</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'CatalogPage',
  data() {
    return {
      products: [

      ]
    }
  }
}
</script>

<style scoped>
.catalog-page {
  padding: 40px 20px;
  background-color: #fdf6ff;
}

.catalog-title {
  text-align: center;
  font-size: 32px;
  color: #a66bbe;
  margin-bottom: 32px;
}

.product-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  gap: 24px;
}

.product-card {
  background: #fff;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.08);
  padding: 16px;
  text-align: center;
}

.product-image {
  width: 100%;
  height: auto;
  border-radius: 8px;
}

.product-name {
  font-size: 18px;
  margin: 12px 0 6px;
  color: #333;
}

.product-price {
  font-size: 16px;
  color: #a66bbe;
  margin-bottom: 12px;
}

.buy-button {
  background-color: #a66bbe;
  color: #fff;
  border: none;
  padding: 10px 16px;
  border-radius: 6px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.buy-button:hover {
  background-color: #8e57a8;
}
</style>

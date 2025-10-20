
<template>
  <div class="promo-card">
    <h3>{{ title }}</h3>
    <p>{{ description }}</p>
    <button class="promo-button">{{ buttonText }}</button>
  </div>
</template>

<script setup>

defineProps({
  title: String,
  description: String,
  buttonText: String
});
</script>

<style scoped>
.promo-card {
  background: white;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(168, 85, 247, 0.1);
  padding: 24px;
  max-width: 300px;
  flex: 1 1 280px;
  margin: 10px;
}

.promo-button {
  background: linear-gradient(135deg, #c084fc, #a855f7);
  color: white;
  border: none;
  padding: 12px 24px;
  border-radius: 8px;
  font-size: 16px;
  font-weight: 600;
  cursor: pointer;
}
</style>

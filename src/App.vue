<template>
  <div class="app">
    <Header />
    <RouterView />
    <Footer />
  </div>
</template>

<script setup>
import Header from './components/Header.vue'
import Footer from './components/Footer.vue'
</script>

<style scoped>
.app {
  background-color: #e7ddfb;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
}
</style>
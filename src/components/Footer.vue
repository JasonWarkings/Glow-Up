<template>
  <footer class="bg-gray-900 text-white py-12">
    <div class="max-w-7xl mx-auto px-4">
      <div class="grid md:grid-cols-4 gap-8">
        <!-- 1️⃣ О компании -->
        <div>
          <h3 class="font-bold text-lg mb-4 bg-gradient-to-r from-pink-400 to-purple-400 bg-clip-text text-transparent">
            Glow-Up
          </h3>
          <p class="text-gray-400 text-sm">
            Премиальная косметика и парфюмерия с доставкой по всему Казахстану
          </p>
        </div>

        <!-- 2️⃣ Покупателям -->
        <div>
          <h4 class="font-semibold mb-4">Покупателям</h4>
          <ul class="space-y-2 text-sm text-gray-400">
            <li>
              <router-link to="/delivery" class="hover:text-white transition">
                Доставка 
              </router-link>
            </li>
            <li>
              <router-link to="/return" class="hover:text-white transition">
                Возврат товара
              </router-link>
            </li>
          </ul>
        </div>

        <!-- 3️⃣ Компания -->
        <div>
          <h4 class="font-semibold mb-4">Компания</h4>
          <ul class="space-y-2 text-sm text-gray-400">
            <li>
              <router-link to="/about" class="hover:text-white transition">
                О нас
              </router-link>
            </li>
            <li>
            
            </li>
          </ul>
        </div>

        <!-- 4️⃣ Контакты -->
        <div>
        
          <ul class="space-y-2 text-sm text-gray-400">
            <li>8 777 555-35-35</li>
            <li>
              <a href="mailto:info@glowup.kz" class="hover:text-white transition">
                info@glowup.kz
              </a>
            </li>
          </ul>
        </div>
      </div>

      <!-- Нижняя линия -->
      <div class="border-t border-gray-800 mt-8 pt-8 text-center text-sm text-gray-400">
        © 2025 Glow-Up. Все права защищены.
      </div>
    </div>
  </footer>
</template>

<script>
export default {
  name: 'Footer'
}
</script>

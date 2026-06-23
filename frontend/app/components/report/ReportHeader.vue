<template>
  <header class="flex h-[60px] items-center justify-between border-b border-[#e5e7eb] bg-white px-6 shadow-sm">
    <!-- Left Section: Sidebar Toggle & Project Selector -->
    <div class="flex items-center gap-4">
      <button
        @click="$emit('toggle-sidebar')"
        class="text-gray-500 hover:text-gray-700 focus:outline-none md:hidden"
      >
        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>

      <!-- Workspace switcher drop down representation -->
      <div class="flex items-center gap-1.5 text-sm font-medium text-gray-700">
        <span class="text-gray-400">Phạm Minh Trí</span>
        <span class="text-gray-300">/</span>
        <div class="relative">
          <button class="flex items-center gap-1 hover:text-gray-900 transition-colors duration-150">
            <span class="font-semibold text-gray-800">Tin Vay</span>
            <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Right Section: Profile details -->
    <div class="flex items-center gap-3">
      <span class="hidden text-sm font-semibold text-gray-700 md:block">
        Phạm Minh Trí
      </span>
      <div class="h-9 w-9 overflow-hidden rounded-full border-2 border-gray-200 bg-gray-100 flex items-center justify-center text-sm font-bold text-gray-600">
        <!-- Initial letter icon avatar -->
        <span class="text-[#e03a2f]">MT</span>
      </div>
    </div>
  </header>
</template>

<script setup>
defineEmits(['toggle-sidebar'])
</script>

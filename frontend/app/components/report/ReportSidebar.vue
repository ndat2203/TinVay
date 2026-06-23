<template>
  <aside
    class="relative z-30 flex flex-col h-full bg-[#1e2229] text-gray-400 transition-all duration-300 ease-in-out border-r border-[#2d323c]"
    :class="[isCollapsed ? 'w-16' : 'w-64']"
  >
    <!-- Brand Area -->
    <div class="flex items-center h-[60px] px-4 border-b border-[#2d323c] justify-between">
      <div v-if="!isCollapsed" class="flex items-center gap-2 font-bold text-white text-base">
        <!-- Logo Icon -->
        <span class="p-1.5 bg-[#e03a2f] rounded-lg text-white">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 002 2h2a2 2 0 002-2z" />
          </svg>
        </span>
        <span class="tracking-wider text-lg uppercase font-black text-transparent bg-clip-text bg-gradient-to-r from-white to-gray-300">
          TIN VAY
        </span>
      </div>
      <div v-else class="mx-auto bg-[#e03a2f] p-1.5 rounded-lg text-white">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 002 2h2a2 2 0 002-2z" />
        </svg>
      </div>
    </div>

    <!-- Navigation Menu Items -->
    <nav class="flex-1 px-3 py-4 space-y-1">
      <NuxtLink
        v-for="item in menuItems"
        :key="item.name"
        :to="item.path"
        class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-all group duration-200"
        :class="[
          item.active
            ? 'bg-[#2d323c] text-white border-l-4 border-[#e03a2f] pl-2 font-semibold'
            : 'hover:bg-[#252a33] hover:text-gray-200'
        ]"
      >
        <span :class="[item.active ? 'text-[#e03a2f]' : 'text-gray-400 group-hover:text-gray-200']">
          <component :is="item.icon" class="w-5 h-5 flex-shrink-0" />
        </span>
        <span v-if="!isCollapsed" class="whitespace-nowrap transition-opacity duration-200">
          {{ item.name }}
        </span>
      </NuxtLink>
    </nav>

    <!-- Bottom Actions / Collapse Toggle -->
    <div class="p-3 border-t border-[#2d323c]">
      <button
        @click="$emit('toggle')"
        class="flex items-center justify-center w-full gap-3 px-3 py-2 text-sm rounded-lg hover:bg-[#252a33] text-gray-400 hover:text-gray-200"
      >
        <svg
          class="w-5 h-5 transition-transform duration-200"
          :class="{ 'rotate-180': isCollapsed }"
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24"
        >
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
        </svg>
        <span v-if="!isCollapsed" class="whitespace-nowrap">Thu gọn menu</span>
      </button>
    </div>
  </aside>
</template>

<script setup>
// Fallback dynamic SVGs as components
const HomeIconComponent = {
  template: `<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>`
}

const ChartBarIconComponent = {
  template: `<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 002 2h2a2 2 0 002-2z"/></svg>`
}

const UsersIconComponent = {
  template: `<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>`
}

const CogIconComponent = {
  template: `<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>`
}

defineProps({
  isCollapsed: {
    type: Boolean,
    default: false
  }
})

defineEmits(['toggle'])

const menuItems = [
  {
    name: 'Tổng quan',
    path: '#',
    icon: HomeIconComponent,
    active: false
  },
  {
    name: 'Thêm mới báo cáo',
    path: '/bao-cao/them',
    icon: ChartBarIconComponent,
    active: true
  },
  {
    name: 'Tập khách hàng',
    path: '#',
    icon: UsersIconComponent,
    active: false
  },
  {
    name: 'Cài đặt hệ thống',
    path: '#',
    icon: CogIconComponent,
    active: false
  }
]
</script>

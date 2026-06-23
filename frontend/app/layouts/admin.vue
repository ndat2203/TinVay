<template>
  <div class="flex h-screen bg-[#f5f6f8] font-sans antialiased text-[#1f2937]">
    <!-- Sidebar -->
    <ReportSidebar :is-collapsed="isSidebarCollapsed" @toggle="toggleSidebar" />

    <!-- Main Content Area -->
    <div class="flex flex-1 flex-col overflow-hidden">
      <!-- Top Header -->
      <ReportHeader @toggle-sidebar="toggleSidebar" />

      <!-- Content Scrollable Viewport -->
      <main class="flex-1 overflow-y-auto px-4 py-6 md:px-8">
        <slot />
      </main>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import ReportSidebar from '~/components/report/ReportSidebar.vue'
import ReportHeader from '~/components/report/ReportHeader.vue'

const isSidebarCollapsed = ref(false)

const toggleSidebar = () => {
  isSidebarCollapsed.value = !isSidebarCollapsed.value
}
</script>

<style scoped>
/* Scrollbar Styling for webkit */
::-webkit-scrollbar {
  width: 6px;
  height: 6px;
}
::-webkit-scrollbar-track {
  background: transparent;
}
::-webkit-scrollbar-thumb {
  background: #cbd5e1;
  border-radius: 3px;
}
::-webkit-scrollbar-thumb:hover {
  background: #94a3b8;
}
</style>

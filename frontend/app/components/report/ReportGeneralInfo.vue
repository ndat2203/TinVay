<template>
  <div class="bg-white border border-gray-100 p-6 mb-6 duration-200">
    <!-- Header title -->
    <div class="mb-6">
      <h2 class="text-sm font-bold text-[#b91c1c] uppercase tracking-wide">
        Thông tin chung
      </h2>
    </div>

    <!-- Form layout -->
    <div class="space-y-5">
      <!-- Row: Tên báo cáo -->
      <div class="grid grid-cols-1 md:grid-cols-[180px_1fr] items-center gap-4">
        <label class="text-sm font-bold text-gray-800">
          Tên báo cáo tùy chỉnh <span class="text-red-500">*</span>
        </label>
        <input
          v-model="form.name"
          type="text"
          placeholder="Nhập tên báo cáo"
          class="w-full px-4 py-2 rounded-lg border border-gray-200 text-sm focus:outline-none focus:ring-1 focus:ring-red-500/20 focus:border-[#b91c1c] transition-all duration-200"
          required
        />
      </div>

      <!-- Row: Loại báo cáo -->
      <div class="grid grid-cols-1 md:grid-cols-[180px_1fr] items-center gap-4">
        <label class="text-sm font-bold text-gray-800">
          Loại báo cáo <span class="text-red-500">*</span>
        </label>
        <div class="relative w-full">
          <select
            v-model="form.type"
            class="w-full px-4 py-2 rounded-lg border border-gray-200 text-sm focus:outline-none focus:ring-1 focus:ring-red-500/20 focus:border-[#b91c1c] transition-all duration-200 appearance-none bg-white cursor-pointer"
          >
            <option value="event">Sự kiện</option>
            <option value="user">Người dùng</option>
            <option value="funnel">Phễu chuyển đổi</option>
          </select>
          <div class="absolute right-3.5 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </div>
        </div>
      </div>

      <!-- Row: Mô tả -->
      <div class="grid grid-cols-1 md:grid-cols-[180px_1fr] items-center gap-4">
        <label class="text-sm font-bold text-gray-800">
          Mô tả
        </label>
        <input
          v-model="form.description"
          type="text"
          placeholder="Nhập mô tả"
          class="w-full px-4 py-2 rounded-lg border border-gray-200 text-sm focus:outline-none focus:ring-1 focus:ring-red-500/20 focus:border-[#b91c1c] transition-all duration-200"
        />
      </div>

      <!-- Row: Kênh -->
      <div class="grid grid-cols-1 md:grid-cols-[180px_1fr] items-start gap-4">
        <label class="text-sm font-bold text-gray-800 pt-1.5">
          Kênh <span class="text-red-500">*</span>
        </label>
        <div class="flex flex-col items-start gap-y-3 pt-1">
          <!-- All checkbox -->
          <div>
            <label class="flex items-center gap-2.5 cursor-pointer group select-none">
              <div class="relative">
                <input
                  type="checkbox"
                  :checked="isAllSelected"
                  @change="toggleAll"
                  class="sr-only peer"
                />
                <div class="w-4.5 h-4.5 rounded border border-gray-300 bg-white peer-checked:bg-[#b91c1c] peer-checked:border-[#b91c1c] transition-all duration-150 flex items-center justify-center">
                  <svg v-if="isAllSelected" class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                  </svg>
                </div>
              </div>
              <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900 transition-colors">Tất cả</span>
            </label>
          </div>

          <!-- Individual channels -->
          <div class="flex flex-row gap-x-8 gap-y-3">
            <label
              v-for="channel in availableChannels"
              :key="channel.value"
              class="flex items-center gap-2.5 cursor-pointer group select-none"
            >
              <div class="relative">
                <input
                  type="checkbox"
                  :value="channel.value"
                  v-model="form.channels"
                  class="sr-only peer"
                />
                <div class="w-4.5 h-4.5 rounded border border-gray-300 bg-white peer-checked:bg-[#b91c1c] peer-checked:border-[#b91c1c] transition-all duration-150 flex items-center justify-center">
                  <svg class="w-3 h-3 text-white opacity-0 peer-checked:opacity-100 transition-opacity duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                  </svg>
                </div>
              </div>
              <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900 transition-colors">
                {{ channel.label }}
              </span>
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
  form: {
    type: Object,
    required: true
  }
})

const availableChannels = [
  { label: 'Momo', value: 'Momo' },
  { label: 'Fiza', value: 'Fiza' },
  { label: 'Platform 1', value: 'Platform 1' },
  { label: 'Platform 2', value: 'Platform 2' }
]

const isAllSelected = computed(() => {
  return props.form.channels.length === availableChannels.length
})

const toggleAll = (e) => {
  if (e.target.checked) {
    props.form.channels = availableChannels.map(c => c.value)
  } else {
    props.form.channels = []
  }
}
</script>

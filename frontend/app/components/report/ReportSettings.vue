<template>
  <div class="bg-white rounded-xl border border-gray-100 p-6">
    <!-- Header title -->
    <div class="mb-6">
      <h2 class="text-[16px] leading-[22px] font-bold text-[#BE1E2D] tracking-wide">
        Cài đặt báo cáo
      </h2>
    </div>

    <!-- Form layout: Aligned label on left, inputs on right -->
    <div class="space-y-5">
      <!-- Row: Loại báo cáo -->
      <div class="grid grid-cols-1 md:grid-cols-[180px_1fr] items-center gap-4">
        <label class="text-[14px] leading-[20px] font-bold text-[#333333]">
          Loại báo cáo <span class="text-red-500">*</span>
        </label>
        <div class="relative w-full">
          <select
            v-model="settings.accumulation"
            class="w-full px-[12px] py-[10px] rounded-lg border border-[#D6D6D6] text-[14px] leading-[20px] focus:outline-none focus:border-blue-400 transition-all duration-200 bg-white appearance-none cursor-pointer text-[#333333] font-normal"
          >
            <option value="none">Không cộng dồn</option>
            <option value="cumulative">Tổng event</option>
          </select>
          <div class="absolute right-3.5 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </div>
        </div>
      </div>

      <!-- Row: Phân chia theo User attribute -->
      <div class="grid grid-cols-1 md:grid-cols-[180px_1fr] items-center gap-4">
        <label class="text-[14px] leading-[20px] font-bold text-[#333333]">
          Phân chia theo User attribute
        </label>
        <div class="relative w-full">
          <select
            v-model="settings.breakdown"
            class="w-full px-[12px] py-[10px] rounded-lg border border-[#D6D6D6] text-[14px] leading-[20px] focus:outline-none focus:border-blue-400 transition-all duration-200 bg-white appearance-none cursor-pointer text-[#808080] font-normal"
          >
            <option value="">Chọn User attribute</option>
            <option value="OS">Hệ điều hành (OS)</option>
            <option value="Location">Tỉnh/Thành phố</option>
            <option value="Age">Độ tuổi</option>
            <option value="Gender">Giới tính</option>
          </select>
          <div class="absolute right-3.5 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </div>
        </div>
      </div>

      <!-- Row: Thời gian báo cáo -->
      <div class="grid grid-cols-1 md:grid-cols-[180px_1fr] items-center gap-4">
        <label class="text-[14px] leading-[20px] font-bold text-[#333333]">
          Thời gian báo cáo
        </label>
        <div class="relative flex">
          <!-- VueDatePicker integration -->
          <VueDatePicker
            v-model="dateRange"
            range
            format="dd/MM/yyyy"
            :teleport="true"
          >
            <!-- Custom trigger slot to match design exactly -->
            <template #trigger="{ toggleMenu }">
              <div
                @click="toggleMenu"
                class="inline-flex items-center gap-2 px-[12px] py-[10px] rounded-lg border border-[#D6D6D6] bg-white text-sm cursor-pointer select-none"
              >
                <!-- Calendar Icon -->
                <svg class="w-4 h-4 text-gray-700 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>

                <!-- Date Range Display -->
                <span class="text-[#333333] font-normal text-center min-w-[180px]">
                  {{
                    settings.dateFrom && settings.dateTo
                      ? `${settings.dateFrom} - ${settings.dateTo}`
                      : 'Chọn thời gian'
                  }}
                </span>

                <!-- Reset/Clear Dates button -->
                <button
                  v-if="settings.dateFrom && settings.dateTo"
                  type="button"
                  @click.stop="clearDates"
                  class="text-gray-400 hover:text-gray-600 transition-colors ml-1"
                  title="Đặt lại ngày mặc định"
                >
                  <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>

                <!-- Dropdown Chevron -->
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </div>
            </template>
          </VueDatePicker>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { computed } from 'vue'
import { VueDatePicker } from '@vuepic/vue-datepicker'
import '@vuepic/vue-datepicker/dist/main.css'

const props = defineProps({
  settings: {
    type: Object,
    required: true
  }
})

// dateRange computed property to map between [dateFrom, dateTo] and Date objects/strings
const dateRange = computed({
  get() {
    if (!props.settings.dateFrom || !props.settings.dateTo) return null
    
    const parseDateStr = (str) => {
      if (!str) return null
      const parts = str.split('/')
      if (parts.length === 3) {
        return new Date(parts[2], parts[1] - 1, parts[0])
      }
      return new Date(str)
    }
    
    return [parseDateStr(props.settings.dateFrom), parseDateStr(props.settings.dateTo)]
  },
  set(val) {
    if (!val || val.length < 2) {
      props.settings.dateFrom = ''
      props.settings.dateTo = ''
      return
    }
    const formatDate = (date) => {
      if (!date) return ''
      const d = new Date(date)
      const day = String(d.getDate()).padStart(2, '0')
      const month = String(d.getMonth() + 1).padStart(2, '0')
      const year = d.getFullYear()
      return `${day}/${month}/${year}`
    }
    props.settings.dateFrom = formatDate(val[0])
    props.settings.dateTo = formatDate(val[1])
  }
})

const clearDates = () => {
  props.settings.dateFrom = ''
  props.settings.dateTo = ''
}
</script>

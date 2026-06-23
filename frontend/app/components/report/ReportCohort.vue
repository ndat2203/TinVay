<template>
  <div class="bg-white rounded-xl border border-gray-100 p-6 mb-6">
    <!-- Header title -->
    <div class="mb-6">
      <h2 class="text-[16px] leading-[22px] font-bold text-[#BE1E2D] tracking-wide">
        Tập khách hàng phân tích
      </h2>
    </div>

    <!-- Form layout: Aligned label on left, inputs on right -->
    <div class="grid grid-cols-1 md:grid-cols-[180px_1fr] items-start gap-4">
      <label class="text-sm font-bold text-gray-800 pt-1.5">
        Tập khách hàng <span class="text-red-500">*</span>
      </label>

      <div class="flex flex-col gap-y-3 w-full">
        <!-- Radio choices -->
        <div class="flex flex-wrap items-center gap-6 mt-1">
          <!-- Segment option -->
          <label class="flex items-center gap-2.5 cursor-pointer group select-none">
            <div class="relative flex items-center">
              <input
                type="radio"
                value="segment"
                v-model="cohort.type"
                class="sr-only"
              />
              <div
                class="w-5 h-5 rounded-full border bg-white flex items-center justify-center transition-all duration-150"
                :class="cohort.type === 'segment' ? 'border-[#BE1E2D]' : 'border-gray-300'"
              >
                <div
                  class="w-2.5 h-2.5 rounded-full transition-all duration-150"
                  :class="cohort.type === 'segment' ? 'bg-[#BE1E2D]' : 'bg-transparent'"
                ></div>
              </div>
            </div>
            <span class="text-[14px] leading-[20px] font-normal text-[#333333]">
              Segment đã tạo
            </span>
          </label>

          <!-- All User option -->
          <label class="flex items-center gap-2.5 cursor-pointer group select-none">
            <div class="relative flex items-center">
              <input
                type="radio"
                value="all"
                v-model="cohort.type"
                class="sr-only"
              />
              <div
                class="w-5 h-5 rounded-full border bg-white flex items-center justify-center transition-all duration-150"
                :class="cohort.type === 'all' ? 'border-[#BE1E2D]' : 'border-gray-300'"
              >
                <div
                  class="w-2.5 h-2.5 rounded-full transition-all duration-150"
                  :class="cohort.type === 'all' ? 'bg-[#BE1E2D]' : 'bg-transparent'"
                ></div>
              </div>
            </div>
            <span class="text-[14px] leading-[20px] font-normal text-[#333333]">
              All users
            </span>
          </label>
        </div>

        <!-- Cohort Selector Dropdown -->
        <div v-if="cohort.type === 'segment'" class="w-full transition-all duration-300">
          <div class="relative mt-1">
            <select
              v-model="cohort.selectedSegment"
              class="w-full px-[12px] py-[10px] rounded-lg border border-[#D6D6D6] text-[14px] leading-[20px] focus:outline-none focus:border-blue-400 transition-all duration-200 bg-white appearance-none cursor-pointer text-[#808080] font-normal"
            >
              <option value="" disabled>Chọn segment</option>
              <option value="Segment khách hàng VIP">Segment khách hàng VIP</option>
              <option value="Người dùng hoạt động 7 ngày qua">Người dùng hoạt động 7 ngày qua</option>
              <option value="Khách hàng chưa đăng ký khoản vay">Khách hàng chưa đăng ký khoản vay</option>
            </select>
            <div class="absolute right-3.5 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
const props = defineProps({
  cohort: {
    type: Object,
    required: true
  }
})
</script>

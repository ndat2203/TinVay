<template>
  <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 transition-all duration-200 hover:shadow-md">
    <!-- Header Action Bar -->
    <div class="flex items-center justify-between border-b border-gray-100 pb-4 mb-5">
      <div class="flex items-center gap-2">
        <h2 class="text-[16px] leading-[22px] font-bold text-[#BE1E2D] tracking-wide">
          Bảng dữ liệu
        </h2>
      </div>

      <!-- Export Button -->
      <button
        type="button"
        class="flex items-center gap-1 bg-white border border-[#A7A7A7] px-[16px] py-[8px] rounded-[24px] hover:bg-gray-50 text-[14px] leading-[20px] font-bold text-[#333333] shadow-sm transition-colors cursor-pointer"
      >
        <svg class="w-4 h-4 text-[#333333]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
        </svg>
        Xuất file
      </button>
    </div>

    <!-- Responsive Table -->
    <div class="overflow-x-auto rounded-lg border border-gray-100">
      <table class="w-full text-left border-collapse text-sm">
        <thead>
          <tr class="bg-gray-50/75 border-b border-gray-100 text-gray-500 font-bold">
            <th class="py-3.5 px-4 font-semibold text-gray-600">Event</th>
            <th class="py-3.5 px-4 font-semibold text-gray-600 text-right">Trung bình</th>
            <th
              v-for="date in dates"
              :key="date"
              class="py-3.5 px-4 font-semibold text-gray-600 text-right min-w-[100px]"
            >
              {{ date }}
            </th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 text-gray-700">
          <tr
            v-for="row in tableData"
            :key="row.event"
            class="hover:bg-gray-50/50 transition-colors"
          >
            <!-- Event Name with badge visual indicator -->
            <td class="py-3.5 px-4 font-medium flex items-center gap-2">
              <span class="w-2 h-2 rounded-full" :class="getColorClass(row.event)"></span>
              {{ row.event }}
            </td>
            <!-- Average Column -->
            <td class="py-3.5 px-4 text-right font-bold text-gray-800">
              {{ row.average.toLocaleString() }}
            </td>
            <!-- Values for specific dates -->
            <td
              v-for="(val, index) in row.values"
              :key="index"
              class="py-3.5 px-4 text-right text-gray-600"
            >
              {{ val.toLocaleString() }}
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script setup>
const props = defineProps({
  tableData: {
    type: Array,
    required: true
  },
  dates: {
    type: Array,
    default: () => ['21/05/2026', '22/05/2026', '23/05/2026', '24/05/2026', '25/05/2026']
  }
})

const getColorClass = (eventName) => {
  if (eventName.includes('App Update')) return 'bg-emerald-500'
  if (eventName.includes('App Start')) return 'bg-purple-500'
  if (eventName.includes('App Open')) return 'bg-cyan-500'
  return 'bg-blue-500'
}
</script>

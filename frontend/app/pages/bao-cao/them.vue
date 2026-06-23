<template>
  <div class="max-w-7xl mx-auto">
    <!-- Header Title -->
    <div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
      <div>
        <h1 class="text-xl font-bold text-gray-800 md:text-2xl">
          Thêm mới báo cáo
        </h1>
        <p class="text-xs text-gray-500 mt-1">
          Thiết lập cấu hình bộ lọc và xem số liệu phân tích thời gian thực.
        </p>
      </div>
    </div>

    <!-- Main Grid Layout -->
    <div class="grid grid-cols-1 gap-6">
      <!-- Section 1: Thông tin chung -->
      <ReportGeneralInfo :form="form" />

      <!-- Section 2: Event báo cáo -->
      <ReportQueryBuilder :groups="groups" />

      <!-- Section 3: Tập khách hàng phân tích -->
      <ReportCohort :cohort="cohort" />

      <!-- Section 4: Cài đặt báo cáo -->
      <ReportSettings :settings="settings" />

      <!-- Section 5: Apply Configuration Panel -->
      <div class="flex flex-col items-end">
        <button
          type="button"
          @click="applyConfiguration"
          class="w-full sm:w-auto px-[16px] py-[8px] rounded-[24px] font-bold text-[14px] leading-[20px] text-white shadow-md shadow-red-500/10 transition-all duration-200 cursor-pointer"
          :class="[
            hasChanges
              ? 'bg-[#BE1E2D] hover:bg-[#c92f25] active:scale-95'
              : 'bg-gray-400 cursor-not-allowed'
          ]"
        >
          Áp dụng
        </button>
        <div class="flex items-center gap-2.5 text-sm">
          <template v-if="hasChanges">
            <!-- Alert Icon -->
            <span class="p-1.5 text-[#FF9933]">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
              </svg>
            </span>
            <span class="font-medium text-[#FF9933]">
              Cấu hình có sự thay đổi. Vui lòng áp dụng lại!
            </span>
          </template>
        </div>
      </div>

      <!-- Section 6: Biểu đồ -->
      <ReportChart :chart-data="chartData" />

      <!-- Section 7: Bảng dữ liệu -->
      <ReportTable :table-data="tableData" :dates="dates" />


       <!-- Sticky Footer Actions Bar -->
      <div class="flex items-center justify-end gap-3">
        <button
          type="button"
          @click="cancelAction"
          class="px-4 py-2 border border-[#D6D6D6] rounded-[24px] hover:bg-gray-50 text-[14px] leading-[20px] font-bold text-[#333333] transition-colors cursor-pointer"
        >
          Hủy
        </button>
        <button
          type="button"
          @click="saveDraftAction"
          class="flex items-center gap-2 px-4 py-2 border border-[#D6D6D6] rounded-[24px] hover:bg-gray-50 text-[14px] leading-[20px] font-bold text-[#333333] transition-colors cursor-pointer"
        >
          <svg
            width="14"
            height="14"
            viewBox="0 0 14 14"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
            class="flex-shrink-0"
          >
            <path
              d="M14 3V12C14 13.1046 13.1046 14 12 14H2C0.895431 14 0 13.1046 0 12V2C0 0.895431 0.895431 0 2 0H11L14 3ZM3 7C2.44772 7 2 7.44772 2 8V11C2 11.5523 2.44772 12 3 12H11C11.5523 12 12 11.5523 12 11V8C12 7.44772 11.5523 7 11 7H3ZM6 2C5.44772 2 5 2.44772 5 3V4C5 4.55228 5.44772 5 6 5H10C10.5523 5 11 4.55228 11 4V3C11 2.44772 10.5523 2 10 2H6Z"
              fill="#333333"
            />
          </svg>

          <span>Lưu nháp</span>
        </button>
        <button
          type="button"
          @click="saveReportAction"
          class="px-5 py-2 bg-[#BE1E2D] hover:bg-[#c92f25] text-white rounded-[24px] text-[14px] leading-[20px] font-bold shadow-md transition-colors cursor-pointer"
        >
          Lưu lại
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, reactive, watch, computed } from 'vue'
import ReportGeneralInfo from '~/components/report/ReportGeneralInfo.vue'
import ReportQueryBuilder from '~/components/report/ReportQueryBuilder.vue'
import ReportCohort from '~/components/report/ReportCohort.vue'
import ReportSettings from '~/components/report/ReportSettings.vue'
import ReportChart from '~/components/report/ReportChart.vue'
import ReportTable from '~/components/report/ReportTable.vue'

definePageMeta({
  layout: 'admin'
})

// Configuration Changed Alert State
const hasChanges = ref(true)

// General Information State
const form = reactive({
  name: 'Báo cáo cài đặt App',
  type: 'event',
  description: 'Báo cáo cài đặt App',
  channels: ['Momo', 'Fiza', 'Platform 1']
})

// Query builder groups state
const groups = reactive([
  {
    id: 'group_1',
    name: 'Nhóm 1',
    events: [
      {
        id: 'g1_ev1',
        name: 'App Update',
        collapsed: false,
        condition: 'AND',
        properties: [
          {
            id: 'g1_ev1_p1',
            name: 'OS Version',
            operator: 'is',
            value: '18',
            valueFrom: '',
            valueTo: ''
          },
          {
            id: 'g1_ev1_p2',
            name: 'App version',
            operator: 'Between',
            value: '',
            valueFrom: '1',
            valueTo: '20'
          }
        ]
      },
      {
        id: 'g1_ev2',
        name: 'App Exit',
        collapsed: false,
        condition: 'AND',
        properties: [
          {
            id: 'g1_ev2_p1',
            name: 'OS Version',
            operator: 'is',
            value: '1',
            valueFrom: '',
            valueTo: ''
          },
          {
            id: 'g1_ev2_p2',
            name: 'OS Version',
            operator: 'Between',
            value: '',
            valueFrom: '1',
            valueTo: '20'
          }
        ]
      }
    ]
  },
  {
    id: 'group_2',
    name: 'Nhóm 2',
    events: [
      {
        id: 'g2_ev1',
        name: 'App Open',
        collapsed: false,
        condition: 'AND',
        properties: [
          {
            id: 'g2_ev1_p1',
            name: 'OS Version',
            operator: 'is',
            value: '20',
            valueFrom: '',
            valueTo: ''
          },
          {
            id: 'g2_ev1_p2',
            name: 'OS Version',
            operator: 'Between',
            value: '',
            valueFrom: '20',
            valueTo: '100'
          }
        ]
      },
      {
        id: 'g2_ev2',
        name: 'Fist Seen is on Feb 10, 2026',
        collapsed: true,
        condition: 'AND',
        properties: []
      }
    ]
  }
])

// Target Cohort Segment State
const cohort = reactive({
  type: 'segment',
  selectedSegment: ''
})

// Report Settings configs
const settings = reactive({
  accumulation: 'cumulative',
  breakdown: '',
  dateFrom: '20/05/2025',
  dateTo: '24/05/2025'
})

// Generate dates list based on dateFrom and dateTo input variables
const dates = computed(() => {
  // To keep it simple, return standard list matching the date range format
  return ['20/05/2025', '21/05/2025', '22/05/2025', '23/05/2025', '24/05/2025']
})

// Chart coordinates state
const chartData = reactive({
  green: [100, 120, 160, 220, 290, 380, 480, 580, 650, 700, 720, 710, 680, 620, 540, 450, 360, 280, 210, 160, 120, 110, 100, 100],
  purple: [100, 110, 130, 170, 220, 290, 370, 460, 520, 560, 580, 570, 540, 490, 420, 350, 280, 220, 170, 130, 110, 105, 100, 100],
  lightBlue: [100, 105, 115, 135, 170, 210, 260, 320, 370, 395, 400, 390, 370, 340, 290, 240, 200, 165, 135, 115, 105, 102, 100, 100],
  darkBlue: [100, 101, 103, 106, 110, 115, 120, 124, 125, 124, 120, 115, 110, 106, 103, 101, 100, 100, 100, 100, 100, 100, 100, 100]
})

// Table records state
const tableData = ref([
  {
    event: 'App Update + App Exit',
    average: 1300,
    values: [1700, 1650, 150, 150, 150]
  },
  {
    event: 'App Start',
    average: 1200,
    values: [1200, 1000, 100, 102, 102]
  },
  {
    event: 'App Open',
    average: 850,
    values: [900, 850, 92, 90, 88]
  },
  {
    event: 'App Exit',
    average: 110,
    values: [120, 115, 12, 10, 10]
  }
])

// Watch state changes to set the "hasChanges" flag to true
watch(
  [form, groups, cohort, settings],
  () => {
    hasChanges.value = true
  },
  { deep: true }
)

// Apply Settings action
const applyConfiguration = () => {
  if (!hasChanges.value) return

  // Run slight randomization of mock analytics metrics to simulate running calculation queries
  chartData.green = chartData.green.map(v => Math.max(50, Math.min(950, v + Math.floor((Math.random() - 0.5) * 60))))
  chartData.purple = chartData.purple.map(v => Math.max(50, Math.min(950, v + Math.floor((Math.random() - 0.5) * 50))))
  chartData.lightBlue = chartData.lightBlue.map(v => Math.max(50, Math.min(950, v + Math.floor((Math.random() - 0.5) * 40))))
  chartData.darkBlue = chartData.darkBlue.map(v => Math.max(50, Math.min(950, v + Math.floor((Math.random() - 0.5) * 20))))

  // Randomize table cells
  tableData.value.forEach(row => {
    row.values = row.values.map(v => Math.max(5, v + Math.floor((Math.random() - 0.5) * 30)))
    row.average = Math.round(row.values.reduce((sum, curr) => sum + curr, 0) / row.values.length * 1.5)
  })

  // Clear warning flag
  hasChanges.value = false
}

// Action Buttons
const cancelAction = () => {
  if (confirm('Bạn có chắc muốn hủy các thay đổi này?')) {
    window.location.reload()
  }
}

const saveDraftAction = () => {
  alert('Đã lưu nháp cấu hình báo cáo thành công!')
}

const saveReportAction = () => {
  if (hasChanges.value) {
    alert('Vui lòng nhấp nút "Áp dụng" cấu hình trước khi lưu báo cáo!')
    return
  }
  alert('Đã lưu báo cáo thành công!')
}
</script>

<template>
  <div class="bg-white rounded-xl border border-gray-100 p-6 mb-6">
    <!-- Section Header and Toolbar -->
    <div class="flex flex-col gap-4">
      <div class="flex items-center gap-2">
        <h2 class="text-[16px] leading-[22px] font-bold text-[#BE1E2D] tracking-wide uppercase">
          Biểu đồ
        </h2>
      </div>
      <div class="flex flex-col gap-4 border-b border-gray-100 pb-4 mb-5">
        <!-- Chart Controls Toolbar -->
        <div class="flex items-center gap-3 text-xs">
          <div class="flex items-center gap-4 flex-wrap">
            <!-- Chart Type Toggle: Đường, Cột, Tròn -->
            <!-- Chart Type Toggle: 5 Icons -->
            <div class="flex items-stretch border border-[#D6D6D6] rounded bg-white overflow-hidden h-[34px]">
              <!-- 1. Line Chart -->
              <button
                @click="activeChartType = 'line'"
                type="button"
                title="Biểu đồ đường"
                class="w-10 h-full flex items-center justify-center transition-all cursor-pointer"
                :class="[
                  activeChartType === 'line'
                    ? 'bg-[#BE1E2D] text-white'
                    : 'text-black hover:bg-gray-50'
                ]"
              >
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M3 20h18" />
                  <path d="M5 15l5-5 5 5 5-8" />
                </svg>
              </button>

              <!-- Divider -->
              <div v-if="activeChartType !== 'line' && activeChartType !== 'area'" class="w-[1px] bg-[#D6D6D6]"></div>

              <!-- 2. Area Chart -->
              <button
                @click="activeChartType = 'area'"
                type="button"
                title="Biểu đồ miền"
                class="w-10 h-full flex items-center justify-center transition-all cursor-pointer"
                :class="[
                  activeChartType === 'area'
                    ? 'bg-[#BE1E2D] text-white'
                    : 'text-black hover:bg-gray-50'
                ]"
              >
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M3 20h18" />
                  <path d="M5 15l5-5 5 5 5-8v8H5z" fill="currentColor" fill-opacity="0.25" />
                  <path d="M5 15l5-5 5 5 5-8" />
                </svg>
              </button>

              <!-- Divider -->
              <div v-if="activeChartType !== 'area' && activeChartType !== 'bar-horizontal'" class="w-[1px] bg-[#D6D6D6]"></div>

              <!-- 3. Horizontal Bar Chart -->
              <button
                @click="activeChartType = 'bar-horizontal'"
                type="button"
                title="Biểu đồ thanh ngang"
                class="w-10 h-full flex items-center justify-center transition-all cursor-pointer"
                :class="[
                  activeChartType === 'bar-horizontal'
                    ? 'bg-[#BE1E2D] text-white'
                    : 'text-black hover:bg-gray-50'
                ]"
              >
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M5 3v18" />
                  <path d="M5 7h8" />
                  <path d="M5 12h12" />
                  <path d="M5 17h6" />
                </svg>
              </button>

              <!-- Divider -->
              <div v-if="activeChartType !== 'bar-horizontal' && activeChartType !== 'bar-vertical'" class="w-[1px] bg-[#D6D6D6]"></div>

              <!-- 4. Vertical Bar Chart -->
              <button
                @click="activeChartType = 'bar-vertical'"
                type="button"
                title="Biểu đồ cột"
                class="w-10 h-full flex items-center justify-center transition-all cursor-pointer"
                :class="[
                  activeChartType === 'bar-vertical'
                    ? 'bg-[#BE1E2D] text-white'
                    : 'text-black hover:bg-gray-50'
                ]"
              >
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M3 21h18" />
                  <path d="M7 21V11" />
                  <path d="M12 21V5" />
                  <path d="M17 21V15" />
                </svg>
              </button>

              <!-- Divider -->
              <div v-if="activeChartType !== 'bar-vertical' && activeChartType !== 'pie'" class="w-[1px] bg-[#D6D6D6]"></div>

              <!-- 5. Pie Chart -->
              <button
                @click="activeChartType = 'pie'"
                type="button"
                title="Biểu đồ tròn"
                class="w-10 h-full flex items-center justify-center transition-all cursor-pointer"
                :class="[
                  activeChartType === 'pie'
                    ? 'bg-[#BE1E2D] text-white'
                    : 'text-black hover:bg-gray-50'
                ]"
              >
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M12 2v10h10"/>
                  <path d="M12 2a10 10 0 1 0 10 10"/>
                </svg>
              </button>
            </div>

            <!-- Time resolution toggle: Giờ, Ngày, Tuần, Tháng -->
            <div class="flex bg-gray-100 p-0.5 rounded-lg border border-gray-200">
              <button
                v-for="unit in ['Giờ', 'Ngày', 'Tuần', 'Tháng']"
                :key="unit"
                @click="activeTimeUnit = unit"
                type="button"
                class="px-3 py-1 rounded-md transition-all font-semibold"
                :class="[
                  activeTimeUnit === unit
                    ? 'bg-[#BE1E2D] text-white shadow-sm'
                    : 'text-gray-600 hover:text-gray-900 hover:bg-gray-200/50'
                ]"
              >
                {{ unit }}
              </button>
            </div>

            <!-- Mode Toggle: # and % -->
            <div class="flex bg-gray-100 p-0.5 rounded-lg border border-gray-200">
              <button
                @click="activeMode = '#'"
                type="button"
                class="px-2.5 py-1 rounded-md font-bold transition-all"
                :class="[activeMode === '#' ? 'bg-[#BE1E2D] text-white shadow-sm' : 'text-gray-600 hover:bg-gray-200/50']"
              >
                #
              </button>
              <button
                @click="activeMode = '%'"
                type="button"
                class="px-2.5 py-1 rounded-md font-bold transition-all"
                :class="[activeMode === '%' ? 'bg-[#BE1E2D] text-white shadow-sm' : 'text-gray-600 hover:bg-gray-200/50']"
              >
                %
              </button>
            </div>

            <!-- Compare past dropdown -->
            <div class="relative">
              <div class="absolute left-2 top-1/2 -translate-y-1/2 pointer-events-none ">
                <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                 <path d="M14 10C14 11.1046 13.1046 12 12 12H2C0.895431 12 0 11.1046 0 10V4H14V10ZM9 7C8.44771 7 8 7.44772 8 8V9C8 9.55229 8.44771 10 9 10H10C10.5523 10 11 9.55229 11 9V8C11 7.44772 10.5523 7 10 7H9ZM12 0C13.1046 0 14 0.895431 14 2V3H0V2C1.28853e-07 0.895431 0.895431 0 2 0H12Z" fill="#333333"/>
                </svg>
              </div>
              <select
                v-model="compareMode"
                class=" px-[30px] py-[10px] rounded-lg border border-[#D6D6D6] bg-white text-[14px] leading-[20px] font-normal text-[#333333] focus:outline-none focus:border-[#BE1E2D] appearance-none cursor-pointer"
              >
                <option value="none">So sánh với quá khứ</option>
                <option value="last_week">So với tuần trước</option>
                <option value="last_month">So với tháng trước</option>
              </select>
              <div class="absolute right-2 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </div>
            </div>
          </div>

          <!-- Export button -->
          <button
            type="button"
            class="flex items-center gap-1 bg-white border border-[#A7A7A7] px-[16px] py-[8px] rounded-[24px] hover:bg-gray-50 text-[#333333] text-[14px] leading-[20px] font-bold transition-colors cursor-pointer ml-auto"
          >
            <svg class="w-4 h-4 text-[#333333]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
            </svg>
            Xuất file
          </button>
        </div>
      </div>
    </div>

    <!-- Apex Chart Component -->
    <div class="relative w-full h-[320px]">
      <ClientOnly>
        <apexchart
          :type="apexChartType"
          height="320"
          :options="chartOptions"
          :series="series"
        />
      </ClientOnly>
    </div>

    <!-- Chart Legend/Labels at the bottom -->
    <div class="flex flex-wrap items-center justify-center gap-6 text-xs text-gray-500 font-semibold border-t border-gray-50 pt-4 mt-4">
      <div class="flex items-center gap-2">
        <span class="w-3 h-1.5 rounded bg-[#10b981]"></span>
        <span>App Update + App Exit</span>
      </div>
      <div class="flex items-center gap-2">
        <span class="w-3 h-1.5 rounded bg-[#8b5cf6]"></span>
        <span>App Start</span>
      </div>
      <div class="flex items-center gap-2">
        <span class="w-3 h-1.5 rounded bg-[#06b6d4]"></span>
        <span>App Open</span>
      </div>
      <div class="flex items-center gap-2">
        <span class="w-3 h-1.5 rounded bg-[#3b82f6]"></span>
        <span>App Exit</span>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue'

const props = defineProps({
  chartData: {
    type: Object,
    required: true
  }
})

const activeTimeUnit = ref('Ngày')
const activeMode = ref('#')
const compareMode = ref('none')
const activeChartType = ref('area')

const hours = [
  '00h', '01h', '02h', '03h', '04h', '05h', '06h', '07h', '08h', '09h', '10h',
  '11h', '12h', '13h', '14h', '15h', '16h', '17h', '18h', '19h', '20h', '21h',
  '22h', '23h'
]

// Determine actual ApexCharts type
const apexChartType = computed(() => {
  if (activeChartType.value === 'bar-horizontal' || activeChartType.value === 'bar-vertical') {
    return 'bar'
  }
  return activeChartType.value
})

// Computed Series mapping data to ApexCharts formats depending on chart type
const series = computed(() => {
  if (activeChartType.value === 'pie') {
    const sumData = (arr) => arr ? arr.reduce((a, b) => a + b, 0) : 0
    return [
      sumData(props.chartData.green),
      sumData(props.chartData.purple),
      sumData(props.chartData.lightBlue),
      sumData(props.chartData.darkBlue)
    ]
  }

  return [
    {
      name: 'App Update + App Exit',
      data: props.chartData.green
    },
    {
      name: 'App Start',
      data: props.chartData.purple
    },
    {
      name: 'App Open',
      data: props.chartData.lightBlue
    },
    {
      name: 'App Exit',
      data: props.chartData.darkBlue
    }
  ]
})

// Chart Configuration options computed dynamically based on active type
const chartOptions = computed(() => {
  const baseOptions = {
    chart: {
      type: apexChartType.value,
      toolbar: {
        show: false
      },
      fontFamily: 'Inter, Roboto, sans-serif',
      zoom: {
        enabled: false
      }
    },
    colors: ['#10b981', '#8b5cf6', '#06b6d4', '#3b82f6'],
    legend: {
      show: false
    }
  }

  // Pie Chart configurations
  if (activeChartType.value === 'pie') {
    return {
      ...baseOptions,
      labels: ['App Update + App Exit', 'App Start', 'App Open', 'App Exit'],
      tooltip: {
        y: {
          formatter: (value) => {
            if (activeMode.value === '%') {
              return `${(value / 10).toFixed(1)}%`
            }
            return value.toLocaleString()
          }
        }
      }
    }
  }

  const isHorizontal = activeChartType.value === 'bar-horizontal'

  // Line, Area & Bar Chart configurations
  return {
    ...baseOptions,
    stroke: {
      curve: 'smooth',
      width: (activeChartType.value === 'bar-horizontal' || activeChartType.value === 'bar-vertical') ? 0 : [3.5, 3, 2.5, 2]
    },
    plotOptions: {
      bar: {
        horizontal: isHorizontal,
        columnWidth: '55%',
        borderRadius: 4
      }
    },
    grid: {
      borderColor: '#f1f5f9',
      xaxis: {
        lines: {
          show: isHorizontal
        }
      },
      yaxis: {
        lines: {
          show: !isHorizontal
        }
      }
    },
    xaxis: {
      categories: hours,
      labels: {
        formatter: isHorizontal ? (value) => {
          if (activeMode.value === '%') {
            return `${(value / 10).toFixed(1)}%`
          }
          return value.toLocaleString()
        } : undefined,
        style: {
          colors: '#94a3b8',
          fontSize: '11px',
          fontWeight: 600
        }
      },
      axisBorder: {
        show: false
      },
      axisTicks: {
        show: false
      }
    },
    yaxis: {
      labels: {
        formatter: !isHorizontal ? (value) => {
          if (activeMode.value === '%') {
            return `${(value / 10).toFixed(1)}%`
          }
          return value.toLocaleString()
        } : undefined,
        style: {
          colors: '#94a3b8',
          fontSize: '11px',
          fontWeight: 500
        }
      },
      min: isHorizontal ? undefined : 0,
      max: isHorizontal ? undefined : 1000
    },
    tooltip: {
      shared: true,
      intersect: false,
      theme: 'light',
      y: {
        formatter: (value) => {
          if (activeMode.value === '%') {
            return `${(value / 10).toFixed(1)}%`
          }
          return value.toLocaleString()
        }
      }
    }
  }
})
</script>

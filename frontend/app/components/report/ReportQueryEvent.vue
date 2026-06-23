<template>
  <div class="flex items-center gap-4 w-full group">
    <!-- Event Card (Blue Outline) -->
    <div
      class="flex-1 border border-[#605DF9] border-l-4 rounded-xl bg-blue-50/5 p-4 relative"
      :class="{ 'cursor-pointer hover:bg-blue-50/10': event.collapsed }"
      @click="event.collapsed && toggleCollapse()"
    >
      <!-- Card Header / Collapsed view -->
      <div class="flex items-center gap-3 select-none">
        <!-- Chevron -->
        <button
          type="button"
          @click.stop="toggleCollapse"
          class="p-1 rounded hover:bg-blue-50/50 text-black-500 focus:outline-none transition-colors"
        >
          <svg
            class="w-3.5 h-3.5 transition-transform duration-200"
            :class="{ 'rotate-90': !event.collapsed }"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
          >
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
          </svg>
        </button>

        <!-- Dropdown select for Event Name (inline) or Static label if collapsed -->
        <div v-if="event.collapsed" class="text-sm font-semibold text-gray-700">
          {{ event.name }}
        </div>
        <div v-else @click.stop class="relative">
          <select
            v-model="event.name"
            class="py-[10px] px-[12px] rounded-lg border border-[#D6D6D6] bg-white text-sm font-semibold text-gray-700 focus:outline-none focus:border-blue-400 cursor-pointer appearance-none"
          >
            <option v-for="opt in eventNameOptions" :key="opt" :value="opt">
              {{ opt }}
            </option>
          </select>
          <div class="absolute right-2.5 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M19 9l-7 7-7-7" />
            </svg>
          </div>
        </div>
      </div>

      <!-- Expanded Content of Event Card -->
      <div v-if="!event.collapsed" class="mt-3">
        <div v-if="event.properties.length === 0" class="text-xs text-gray-400 italic pl-[76px] py-2">
          Chưa cấu hình bộ lọc thuộc tính. Nhấp nút thêm bên dưới.
        </div>

        <div v-else class="relative space-y-3">
          <!-- Continuous vertical tree connector line for properties only -->
          <div class="absolute left-[58px] top-[-16px] bottom-[21px] w-[1px] bg-gray-300"></div>

          <!-- Property rows with tree connectors -->
          <div
            v-for="(prop, pIndex) in event.properties"
            :key="prop.id"
            class="relative pl-[76px] min-h-[42px] flex items-center"
          >
            <!-- Horizontal branch line -->
            <div class="absolute left-[58px] w-[18px] h-[1px] bg-gray-300 top-1/2 -translate-y-1/2"></div>

            <!-- Content of property row -->
            <div class="flex flex-wrap items-center gap-3 w-full pl-3">
              <!-- Label / condition column (width 140px) -->
              <div class="w-[140px] flex-shrink-0 text-xs font-semibold text-gray-500">
                <span v-if="pIndex === 0" class="text-[14px] leading-[20px] text-[#333333]">With Event Property</span>
                <div v-else @click.stop class="inline-block">
                  <button
                    type="button"
                    @click="toggleCondition"
                    class="px-[12px] py-[10px] rounded-lg text-[14px] leading-[22px] font-bold inline-flex items-center gap-1 border border-[#D6D6D6] transition-all duration-150 focus:outline-none"
                    :class="[
                      event.condition === 'AND'
                        ? 'bg-emerald-50 text-emerald-600 border-emerald-200 hover:bg-emerald-100'
                        : 'bg-blue-50 text-blue-600 border-blue-200 hover:bg-blue-100'
                    ]"
                  >
                    <span>{{ event.condition }}</span>
                    <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                    </svg>
                  </button>
                </div>
              </div>

              <!-- Property Name Dropdown -->
              <div class="relative w-44">
                <select
                  v-model="prop.name"
                  class="w-full px-[12px] py-[10px] rounded-lg border border-[#D6D6D6] bg-white text-sm text-gray-700 focus:outline-none focus:border-blue-400 cursor-pointer appearance-none"
                >
                  <option v-for="opt in propertyNameOptions" :key="opt" :value="opt">
                    {{ opt }}
                  </option>
                </select>
                <div class="absolute right-2.5 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400">
                  <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                  </svg>
                </div>
              </div>

              <!-- Operator Dropdown -->
              <div class="relative w-28">
                <select
                  v-model="prop.operator"
                  class="w-full px-[12px] py-[10px] rounded-lg border border-[#D6D6D6] bg-white text-sm text-gray-700 focus:outline-none focus:border-blue-400 cursor-pointer appearance-none"
                >
                  <option value="is">is</option>
                  <option value="is not">is not</option>
                  <option value="Between">Between</option>
                  <option value="Contains">Contains</option>
                </select>
                <div class="absolute right-2.5 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400">
                  <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                  </svg>
                </div>
              </div>

              <!-- Value input fields depending on operator -->
              <div class="flex items-center gap-2">
                <template v-if="prop.operator === 'Between'">
                  <span class="text-xs text-gray-400">From</span>
                  <input
                    v-model="prop.valueFrom"
                    type="text"
                    placeholder="Nhập"
                    class="w-16 px-[12px] py-[10px] rounded-lg border border-[#D6D6D6] text-sm focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-400/20"
                  />
                  <span class="text-xs text-gray-400">to</span>
                  <input
                    v-model="prop.valueTo"
                    type="text"
                    placeholder="Nhập"
                    class="w-16 px-[12px] py-[10px] rounded-lg border border-[#D6D6D6] text-sm focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-400/20"
                  />
                </template>

                <template v-else>
                  <input
                    v-model="prop.value"
                    type="text"
                    placeholder="Nhập giá trị"
                    class="w-32 px-[12px] py-[10px] rounded-lg border border-[#D6D6D6] text-sm focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-400/20"
                  />
                </template>
              </div>

              <!-- Delete Property Filter -->
              <button
                @click="deleteProperty(pIndex)"
                class="p-1 rounded hover:bg-red-50 text-gray-400 hover:text-red-500 transition-colors flex-shrink-0"
                title="Xóa thuộc tính"
              >
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
              </button>
            </div>
          </div>
        </div>

        <!-- Add Property Button Row (Completely separated from tree line) -->
        <div class="pl-[76px] mt-4 flex items-center min-h-[38px]">
          <button
            type="button"
            @click="addProperty"
            class="flex items-center gap-1.5 px-[16px] py-[8px] rounded-[24px] border border-[#A7A7A7] bg-white hover:bg-gray-50 text-[14px] leading-[20px] font-bold text-[#333333] transition-colors shadow-sm cursor-pointer"
          >
            <svg class="w-3.5 h-3.5 text-[#333333]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
            </svg>
            Thêm Event Property
          </button>
        </div>

        <!-- Validation Error Message -->
        <div v-if="hasValidationError" class="pl-[76px] pt-1 flex justify-end">
          <span class="text-xs text-red-500 flex items-center gap-1 animate-pulse">
            <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
            Vui lòng nhập đầy đủ các thông tin
          </span>
        </div>
      </div>
    </div>

    <!-- Delete Button for Event (Outside the card, on the right) -->
    <button
      @click="$emit('delete')"
      class="p-2 text-red-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors flex-shrink-0 cursor-pointer"
      title="Xóa Event này"
    >
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
      </svg>
    </button>
  </div>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
  event: {
    type: Object,
    required: true
  }
})

const emit = defineEmits(['delete'])

const toggleCollapse = () => {
  props.event.collapsed = !props.event.collapsed
}

const addProperty = () => {
  props.event.properties.push({
    id: Date.now() + Math.random().toString(36).substr(2, 5),
    name: 'OS Version',
    operator: 'is',
    value: '',
    valueFrom: '',
    valueTo: ''
  })
}

const deleteProperty = (index) => {
  props.event.properties.splice(index, 1)
}

const toggleCondition = () => {
  props.event.condition = props.event.condition === 'AND' ? 'OR' : 'AND'
}

// Available options lists
const eventNameOptions = [
  'App Open',
  'App List',
  'App Start',
  'App Exit',
  'Phí Giao dịch',
  'App Update',
  'Fist Seen is on Feb 10, 2026'
]

const propertyNameOptions = [
  'OS Version',
  'OS Device',
  'App ID',
  'OS Brand',
  'App version'
]

// Client side validation logic
const hasValidationError = computed(() => {
  if (props.event.properties.length === 0) return false
  return props.event.properties.some(prop => {
    if (prop.operator === 'Between') {
      return !prop.valueFrom || !prop.valueFrom.trim() || !prop.valueTo || !prop.valueTo.trim()
    } else {
      return !prop.value || !prop.value.trim()
    }
  })
})
</script>

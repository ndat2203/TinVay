<template>
  <div class="border border-[#189637] border-l-4 rounded-xl bg-white p-5 mb-5 relative">
    <!-- Group Header Action Bar -->
    <div class="flex items-center justify-between pb-3 mb-4 border-b border-gray-100">
      <h3 class="text-[14px] leading-[20px] font-bold text-gray-800 tracking-wider">
        {{ group.name }}
      </h3>

      <div class="flex items-center gap-2">
        <!-- Copy Group Button -->
        <button
          type="button"
          @click="$emit('copy')"
          class="p-1 rounded hover:bg-gray-100 text-gray-700 transition-colors"
          title="Nhân bản Nhóm"
        >
          <!-- Copy icon SVG -->
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
          </svg>
        </button>

        <!-- Delete Group Button -->
        <button
          type="button"
          @click="$emit('delete')"
          class="p-1 rounded hover:bg-red-50 text-red-500 transition-colors"
          title="Xóa Nhóm"
        >
          <!-- Delete icon SVG -->
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
          </svg>
        </button>
      </div>
    </div>

    <!-- Render List of Events in Group -->
    <div class="space-y-4">
      <div v-for="(event, eIndex) in group.events" :key="event.id">
        <!-- OR connector before subsequent events -->
        <div v-if="eIndex > 0" class="my-3 flex items -center justify-start pl-6">
          <span class="rounded text-[14px] leading-[20px] font-bold text-[#605DF9] uppercase tracking-wide">
            OR
          </span>
        </div>

        <!-- Event card with delete handled by group -->
        <ReportQueryEvent
          :event="event"
          @delete="deleteEvent(eIndex)"
        />
      </div>
    </div>

    <!-- Add Event Button -->
    <div class="mt-4 pt-2">
      <button
        type="button"
        @click="addEvent"
        class="flex items-center gap-1.5 px-[16px] py-[8px] rounded-[24px] border border-[#A7A7A7] bg-white hover:bg-gray-50 text-[14px] font-bold text-[#333333] shadow-sm transition-colors cursor-pointer"
      >
        <svg class="w-3.5 h-3.5 text-[#333333]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
        </svg>
        Thêm Event
      </button>
    </div>
  </div>
</template>

<script setup>
import ReportQueryEvent from './ReportQueryEvent.vue'

const props = defineProps({
  group: {
    type: Object,
    required: true
  }
})

const emit = defineEmits(['copy', 'delete'])

const addEvent = () => {
  props.group.events.push({
    id: Date.now() + Math.random().toString(36).substr(2, 5),
    name: 'App Open',
    collapsed: false,
    condition: 'AND',
    properties: [
      {
        id: Date.now() + Math.random().toString(36).substr(2, 5),
        name: 'OS Version',
        operator: 'is',
        value: '',
        valueFrom: '',
        valueTo: ''
      }
    ]
  })
}

const deleteEvent = (index) => {
  props.group.events.splice(index, 1)
}
</script>

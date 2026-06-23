<template>
  <div class="bg-white rounded-xl border border-gray-100 p-6 mb-6">
    <!-- Header title matching General Info style -->
    <div class="mb-6">
      <h2 class="text-[16px] leading-[22px] font-bold text-[#b91c1c] tracking-wide">
        Event báo cáo
      </h2>
    </div>

    <!-- Render List of Groups -->
    <div class="space-y-6">
      <ReportQueryGroup
        v-for="(group, gIndex) in groups"
        :key="group.id"
        :group="group"
        @copy="copyGroup(gIndex)"
        @delete="deleteGroup(gIndex)"
      />
    </div>

    <!-- Add Group Button -->
    <div class="mt-6 pt-4 border-t border-gray-100">
      <button
        type="button"
        @click="addGroup"
        class="flex items-center gap-1.5 px-[16px] py-[8px] rounded-[24px] border border-[#A7A7A7] bg-white hover:bg-gray-50 text-[14px] leading-[20px] font-bold text-[#333333] transition-colors shadow-sm cursor-pointer"
      >
        <svg class="w-3.5 h-3.5 text-[#333333]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
        </svg>
        Thêm Nhóm
      </button>
    </div>
  </div>
</template>

<script setup>
import ReportQueryGroup from './ReportQueryGroup.vue'

const props = defineProps({
  groups: {
    type: Array,
    required: true
  }
})

const addGroup = () => {
  const nextNum = props.groups.length + 1
  props.groups.push({
    id: Date.now() + Math.random().toString(36).substr(2, 5),
    name: `Nhóm ${nextNum}`,
    events: [
      {
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
      }
    ]
  })
}

const copyGroup = (index) => {
  const source = props.groups[index]
  // Deep clone group helper
  const clone = JSON.parse(JSON.stringify(source))
  clone.id = Date.now() + Math.random().toString(36).substr(2, 5)
  clone.name = `${source.name} (Bản sao)`
  // Reset all IDs inside the events and properties
  clone.events.forEach(event => {
    event.id = Date.now() + Math.random().toString(36).substr(2, 5)
    event.properties.forEach(prop => {
      prop.id = Date.now() + Math.random().toString(36).substr(2, 5)
    })
  })
  props.groups.splice(index + 1, 0, clone)
}

const deleteGroup = (index) => {
  if (props.groups.length > 1) {
    props.groups.splice(index, 1)
  } else {
    alert('Báo cáo phải chứa ít nhất 1 nhóm event.')
  }
}
</script>

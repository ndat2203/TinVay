<template>
<section aria-label="Đối tác">
  <div 
   class="grid grid-cols-2 lg:grid-cols-5 sm:grid-cols-3 gap-y-10 gap-x-4 px-[16px] py-[40px] lg:px-8 lg:py-[87px]">
    <div
      v-for="item in service"
      :key="item.id"
      class="flex h-[84px] max-h-[85px] max-w-[260px] cursor-pointer items-center justify-center"
    >
      <img
        :src="item.image"
        :alt="item.title"
        class="h-full object-contain"
      />
    </div>
  </div>
</section>
</template>

<script setup>

const props = defineProps({
    service: {
      type: Array,
      default: () => [],
    },
  })
</script>

<style lang="scss" scoped>

</style>
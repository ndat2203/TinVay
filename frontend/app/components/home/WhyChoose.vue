<script setup>
import { computed, ref } from 'vue'

const props = defineProps({
  loanSteps: {
    type: Array,
    default: () => []
  },
  sectioninfo: {
    type: Object,
    required: true
  }
})

const showMore = ref(false)

const getItems = (row, column = null) => {
  return props.loanSteps
    .filter(item => {
      if (column) {
        return item.row === row && item.column === column
      }

      return item.row === row
    })
    .sort((a, b) => (a.order ?? 0) - (b.order ?? 0))
}

const allItems = computed(() => {
  return [...props.loanSteps].sort((a, b) => {
    if (a.row !== b.row) {
      return a.row - b.row
    }

    return (a.order ?? 0) - (b.order ?? 0)
  })
})

const toggleShowMore = () => {
  showMore.value = !showMore.value
}

const visibleMobileItems = computed(() => {
  return showMore.value
    ? allItems.value
    : allItems.value.slice(0, 4)
})



</script>

<template>
<section class="px-[16px] py-[40px] lg:px-8 lg:py-[87px]">
  <!-- Header -->
  <div class="mb-14 text-center">
    <p class="mb-[8px] lg:mb-4 text-lg font-semibold uppercase text-[rgb(187,32,46)]">
      {{ sectioninfo.subtitle }}
    </p>

    <h2 class="text-[40px] lg:text-[64px] font-bold leading-[44px] lg:leading-[70px] text-[rgb(88,89,91)]">
      {{ sectioninfo.title }}
    </h2>
  </div>

   <!-- CENTER IMAGE (mobile show here) -->
  <div class="mb-10 flex justify-center lg:hidden">
    <img src="/images/icon-service.svg" class="w-[160px] h-[160px]" />
  </div>

  <!-- MOBILE LIST -->
  <TransitionGroup
    name="expand-list"
    tag="div"
    class="flex flex-col gap-4 

    md:grid md:grid-cols-2
    lg:hidden"
  >
    <div
      v-for="item in visibleMobileItems"
      :key="item.id"
      class="flex items-start gap-4"
    >
      <img
        :src="item.icon"
        :alt="item.title"
        class="h-14 w-14 flex-shrink-0"
      />

      <div>
        <h3
          class="mb-2 text-[20px] font-bold leading-7 text-[rgb(88,89,91)]"
        >
          {{ item.title }}
        </h3>

        <p
          class="text-[14px] leading-6 text-[rgb(89,101,119)]"
        >
          {{ item.description }}
        </p>
      </div>


    </div>
  </TransitionGroup>

  <button
      v-if="allItems.length > 4"
      @click="toggleShowMore"
      class="
          mx-auto mt-6 flex items-center gap-2
          rounded-2xl bg-[#BB202E]
          px-6 py-3
          text-white
          transition-all duration-300
          hover:bg-[#a31b27]

          lg:hidden
        "
  >
    {{ showMore ? 'Thu gọn' : 'Xem thêm' }}

  <svg
      class="h-4 w-4 transition-transform duration-300"
      :class="showMore ? 'rotate-180' : ''"
      fill="none"
      stroke="currentColor"
      viewBox="0 0 24 24"
  >
      <path
        stroke-linecap="round"
        stroke-linejoin="round"
        stroke-width="2"
        d="M19 9l-7 7-7-7"
      />
  </svg>
  </button>

  <!-- Row 1 -->
  <div class="hidden lg:flex flex-col items-center justify-center gap-[16px] lg:gap-[104px] lg:flex-row">
    <!-- Left -->
    <div
      v-for="item in getItems(1, 'left')"
      :key="item.id"
      class="flex max-w-[350px] items-start gap-4 flex-row-reverse text-right"
    >
      <img :src="item.icon" :alt="item.title" class="order-2 lg:order-1"/>

      <div class="order-1 text-left lg:text-right">
        <h3 class="mb-1 text-[28px] font-bold leading-9 text-[rgb(88,89,91)] lg:order-2">
          {{ item.title }}
        </h3>

        <p class="text-[16px] font-medium leading-6 text-[rgb(89,101,119)]">
          {{ item.description }}
        </p>
      </div>
    </div>

    <!-- Right -->
    <div
      v-for="item in getItems(1, 'right')"
      :key="item.id"
      class="flex max-w-[350px] items-start gap-4"
    >
      <img :src="item.icon" :alt="item.title" />

      <div>
        <h3 class="mb-1 text-[28px] font-bold leading-9 text-[rgb(88,89,91)]">
          {{ item.title }}
        </h3>

        <p class="text-[16px] font-medium leading-6 text-[rgb(89,101,119)]">
          {{ item.description }}
        </p>
      </div>
    </div>
  </div>

  <!-- Row 2 -->
  <div class=" hidden lg:mt-0 mt-[16px] lg:flex flex-col items-center justify-center gap-[16px] lg:gap-[104px] lg:flex-row">
    <!-- Left column -->
    <div
     class="flex flex-col gap-[16px] lg:gap-[54px]">
      <div
      v-for="item in getItems(2, 'left')"
      :key="item.id"
      class="flex max-w-[350px] items-start gap-4 text-right">
        <div class="order-2 lg:order-1 text-left lg:text-right">
          <h3 class="mb-1 text-[28px] font-bold leading-9 text-[rgb(88,89,91)]">
            {{ item.title }}
          </h3>

          <p class="text-[16px] font-medium leading-6 text-[rgb(89,101,119)]">
            {{ item.description }}
          </p>
        </div>

        <img :src="item.icon" :alt="item.title" class="order-1 lg:order-2"/>
      </div>
    </div>

    <!-- Center image -->
    <div class="hidden md:hidden lg:block">
      <img src="/images/icon-service.svg" alt="" />
    </div>

    <!-- Right column -->
    <div class="flex flex-col gap-[16px] lg:gap-[54px]">
      <div
      v-for="item in getItems(2, 'right')"
      :key="item.id"
      class="flex max-w-[350px] items-start gap-4">
        <img :src="item.icon" :alt="item.title" />

        <div>
          <h3 class="mb-1 text-[28px] font-bold leading-9 text-[rgb(88,89,91)]">
            {{ item.title }}
          </h3>
          <p class="text-[16px] font-medium leading-6 text-[rgb(89,101,119)]">
            {{ item.description }}
          </p>
        </div>
      </div>
    </div>
  </div>

<!-- Row 3 -->
<div class="hidden lg:flex flex-col items-center justify-center gap-[16px] lg:gap-[104px] lg:flex-row">
    <!-- Left -->
    <div
      v-for="item in getItems(3, 'left')"
      :key="item.id"
      class="flex max-w-[350px] items-start gap-4 flex-row-reverse text-right"
    >
      <img :src="item.icon" :alt="item.title" class="order-2 lg:order-1"/>

      <div class="order-1 text-left lg:text-right">
        <h3 class="mb-1 text-[28px] font-bold leading-9 text-[rgb(88,89,91)] lg:order-2">
          {{ item.title }}
        </h3>

        <p class="text-[16px] font-medium leading-6 text-[rgb(89,101,119)]">
          {{ item.description }}
        </p>
      </div>
    </div>

    <!-- Right -->
    <div
      v-for="item in getItems(3, 'right')"
      :key="item.id"
      class="flex max-w-[350px] items-start gap-4"
    >
      <img :src="item.icon" :alt="item.title" />

      <div>
        <h3 class="mb-1 text-[28px] font-bold leading-9 text-[rgb(88,89,91)]">
          {{ item.title }}
        </h3>

        <p class="text-[16px] font-medium leading-6 text-[rgb(89,101,119)]">
          {{ item.description }}
        </p>
      </div>
    </div>
  </div>
</section>
</template>



<style lang="css" scoped>
  .expand-list-enter-active,
.expand-list-leave-active {
  transition: all 0.35s ease;
}

.expand-list-enter-from,
.expand-list-leave-to {
  opacity: 0;
  transform: translateY(-10px);
}

.expand-list-enter-to,
.expand-list-leave-from {
  opacity: 1;
  transform: translateY(0);
}

.expand-list-move {
  transition: transform 0.35s ease;
}
</style>
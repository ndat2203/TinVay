<template>
<section class="mt-[40px] px-4 lg:mt-48 lg:px-8">
  <div class="mx-auto flex max-w-[740px] flex-col items-center justify-center">

    <!-- Header -->
    <div class="text-center">
      <span
        class="text-[18px] font-semibold leading-[28px] uppercase text-[#BB202E]"
      >
        Hỗ trợ
      </span>

      <h2
        class="text-[40px] leading-[44px] lg:text-[64px] lg:leading-[70px] font-bold text-[#58595B]"
      >
        Câu hỏi thường gặp
      </h2>
    </div>

    <!-- FAQ List -->
    <div class="mt-18 w-full">

      <!-- Item 1 -->
      <div
      v-for="(item, index) in service?.data?.service?.faqs"
      :key="item.id"
       class="border-b border-gray-200 py-5">
        <div
          class="flex cursor-pointer items-center"
          @click="toggleFaq(index)"
        >
          <span
            class="mr-3 text-[24px] transition-transform duration-300"
            :class="{
              'rotate-90': activeFaq === index
            }"
          >
            ›
          </span>

          <p
            class="text-[18px] font-bold leading-[27px] text-[#2F3F55]"
            :class="{ 'text-[#BB202E]': activeFaq === index }"
          >
            {{ item.question }}
          </p>
        </div>

        <div
          v-show="activeFaq === index"
          class="mt-3 pl-7 md:pl-9 font-medium leading-relaxed text-[#666]"
        >
          {{ item.answer }}
        </div>
      </div>
      
    </div>
  </div>
</section>
</template>

<script setup>
const activeFaq = ref(null);

const toggleFaq = (index) => {
  activeFaq.value =
    activeFaq.value === index ? null : index;
};

defineProps({
  service: {
    type: Object,
    default: () => ({})
  }
})
</script>

<style lang="scss" scoped>

</style>
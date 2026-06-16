<script setup>
defineProps({
  post: {
    type: Array,
    default: () => [],
  },
  title: {
    type: String,
    default: '',
  },
  backgroundImage: {
    type: String,
    required: true,
  },
  loading: {
    type: Boolean,
    required: true
  },
  link: {
    type: String,
    required: true
  }
})

</script>

<template>
<section
  class="py-[56px] lg:py-[87px] px-[16px] lg:px-8 bg-cover bg-center"
  :style="{
      backgroundImage: backgroundImage ? `url(${backgroundImage})` : 'none',
      backgroundColor: backgroundImage ? 'transparent' : '#fff'
  }"
  aria-labelledby="latest-news-title"
>

  <!-- TOP -->
  <div class="flex items-end justify-between mb-14">

    <!-- HEADER -->
    <div>
      <div class="text-[#BB202E] uppercase font-semibold text-[16px] lg:text-[18px] leading-[21px] mb-4">
        TIN TỨC
      </div>

      <h2
        id="latest-news-title"
        class="font-bold text-[40px] leading-[44px] lg:text-[64px] lg:leading-[70px] text-[#58595B]"
      >
        {{ title }}
      </h2>
    </div>

    <!-- BUTTON -->
    <div>
      <NuxtLink
        :to="link"
        aria-label="Xem tất cả thông báo mới nhất"
        class="bg-[#BB202E] text-white text-[18px] leading-[18px] font-medium rounded-2xl px-6 py-[15px] transition hover:text-[#F9663E] hidden lg:block"
      >
        Xem tất cả
      </NuxtLink>
    </div>

  </div>

  <div
    v-if="loading"
    class="relative -mt-[50px] grid grid-cols-4 gap-9 px-8"
  >
    <div
      v-for="n in 4"
      :key="n"
      class="animate-pulse"
    >
      <div class="h-[230px] rounded-2xl bg-gray-200"></div>

      <div class="mt-4 h-6 rounded bg-gray-200"></div>

      <div class="mt-3 h-4 rounded bg-gray-200"></div>
      <div class="mt-2 h-4 rounded bg-gray-200"></div>
      <div class="mt-2 h-4 w-3/4 rounded bg-gray-200"></div>
    </div>
  </div>

  <!-- LIST -->
<div
  v-else
  class="
    flex gap-4 overflow-x-auto pb-4
    scroll-smooth snap-x snap-mandatory

    
    lg:grid grid-cols-4
  "
>
  <!-- CARD -->
  <div
    v-for="item in post"
    :key="item.id"
    class="
      snap-start
      max-w-[90%] flex-shrink-0

      md:max-w-[45%]
      lg:max-w-full
    "
  >
  <NuxtLink :to="`/tin-tuc/bai-viet/${item.slug}`">
    <img
      class="h-[230px] w-full overflow-hidden rounded-2xl object-cover transition-transform duration-300 hover:scale-105"
      :src="item.image"
      :alt="item.title" 
      
    />

    <h3
      class="mt-4 text-[18px] font-bold leading-[27px] text-[#58595B] transition hover:text-[#BB202E]"
    >
      {{ item.title }}
    </h3>

    <p
      class="mt-3 line-clamp-3 text-[16px] leading-6 font-medium text-[#2F3F55]"
    >
      {{ item.summary }}
    </p>
  </NuxtLink>
  </div>
</div>

    <!-- BUTTON -->
<div class="mt-8 flex items-center justify-center w-full">
    <NuxtLink
        :to="link"
        aria-label="Xem tất cả thông báo mới nhất"
        class="bg-[#BB202E] transition-colors text-[#fff] text-18-18 font-medium rounded-[16px] px-6 py-[15px] hover:bg-[#F9663E] w-full max-w-[350px] text-center lg:hidden"
      >
      Xem tất cả
    </NuxtLink>
</div>
</section>
</template>

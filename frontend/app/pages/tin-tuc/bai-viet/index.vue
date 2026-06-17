<template>
<section class="mb-[60px]">
  <div
    class="bg-[url('/images/bai-viet-noi-bat.png')] bg-cover bg-center px-4 pt-10 pb-[153px] text-center"
  >
    <div class="mx-auto max-w-[900px]">
      <h2
        class="mb-4 text-[18px] font-medium uppercase leading-[27px] text-[#bb202e]"
      >
        Tin tức
      </h2>

      <h1
        class="text-[40px] lg:text-[64px] font-bold leading-[70px] text-[#58595b]"
      >
        Bài viết nổi bật
      </h1>

      <p
        class="mt-10 text-[18px] font-medium leading-[27px] text-[#58595b]"
      >
        Các bài viết về thị trường vay, bí quyết vay, quản lý tài chính cá nhân
      </p>
    </div>
  </div>

  <div
    v-if="loading"
    class="relative -mt-[80px] grid grid-cols-1 lg:grid-cols-4 gap-9 px-8"
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

  <div
  v-else
    class="relative -mt-[50px] grid grid-cols-1 
    
    md:grid-cols-2
    lg:grid-cols-4 gap-9 px-8"
  >
    <NuxtLink
    v-for="item in newsPosts" :key="item.id"
    :to="`/tin-tuc/bai-viet/${item.slug}`"
    >
      <img
        :src="item.image"
        :alt="item.title"
        class="h-[230px] w-full cursor-pointer rounded-2xl object-cover"
      />

      <h3
        class="mt-4 cursor-pointer text-[18px] font-bold leading-[27px] text-[#58595b] transition-all duration-200 hover:text-[#bb202e]"
      >
        {{ item.title }}
      </h3>

      <p
        class="mt-3 line-clamp-3 text-[16px] font-medium leading-6 text-[#2f3f55]"
      >
        {{ item.summary }}
      </p>
    </NuxtLink>
  </div>

  <div class="flex justify-center pt-16">
    <button
      class="flex w-[120px] cursor-pointer justify-center rounded-2xl bg-[#bb202e] px-6 py-[15px] text-[18px] font-medium leading-[18px] text-white transition-colors duration-300 hover:bg-[#F9663E]"
    >
      Tải thêm
    </button>
  </div>
</section>
</template>

<script setup>
const {
  data: newsPosts,
  pending,
  error
} = await useApiFetch(
  '/post/category/bai-viet',
  {
    transform: (res) => res.data || res
  }
)

</script>

<style lang="css" scoped>

</style>
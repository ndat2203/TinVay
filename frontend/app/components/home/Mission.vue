<template>
<section
  :class="[
    'mx-auto flex flex-col items-center pt-[40px] px-[24px] bg-[rgb(88,89,91)] lg:px-8 lg:pt-0 lg:flex-row',
    reverse && 'lg:flex-row-reverse'
  ]"
>
  <!-- Ảnh -->
  <div
    class="order-2 flex w-full items-end justify-center lg:order-1 lg:w-1/2"
  >
    <img
      src="/images/family.png"
      alt=""
      class="mb-[-1px] h-full w-full cursor-pointer object-cover object-center"
    />
  </div>

  <!-- Nội dung -->
  <div
    class="order-1 flex w-full flex-col gap-8 p-0 pb-[40px] lg:order-2 lg:w-1/2 lg:p-24"
  >
    <h2 class="text-[40px] font-bold leading-tight text-white lg:text-[64px] lg:leading-[70px]">
      Sứ mệnh
    </h2>

    <p class="text-[18px] leading-7 text-white lg:text-[18px] lg:leading-[27px]">
      Thương hiệu Tin Vay cung cấp các sản phẩm tín dụng nhanh chóng, dễ dàng, an toàn, tiện lợi. Mục tiêu góp phần đẩy lùi tín dụng đen, nâng cao cơ hội tiếp cận tài chính chính thống cho người dân, đặc biệt những người có thu nhập thấp và yếu thế về tài chính.
    </p>
  </div>
</section>
</template>

<script setup>
defineProps({
  reverse: {
    type: Boolean,
    default: false
  }
})
</script>

<style lang="scss" scoped>

</style>
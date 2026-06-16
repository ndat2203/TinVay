<template>
<section class="service-access bg-cover bg-center" style="background-image: url('/images/banner-service-detail-2.png');">
  <div class="max-w-[1034px] mx-auto flex flex-col md:flex-row gap-[30px] lg:gap-0 items-center justify-between px-4 py-[40px]  md:px-[50px] lg:px-8 lg:py-20">
    <!-- Guide -->
    <div class="max-w-[350px] flex flex-col gap-4 lg:gap-6 p-4 lg:p-10 rounded-2xl bg-white">
      <p class="text-[28px] leading-[36px] font-bold text-[#58595B]">
        Cách thức truy cập
      </p>
      <ul class="list-none space-y-4">
        <li 
         v-for="(value, index) in service?.data?.service?.guide_content"
         :key="index"
         class="text-[18px] leading-[27px] font-medium text-[#2F3F55]">
          {{ value }}
        </li>
      </ul>

      <div class="flex items-center gap-6">
        <p class="text-[16px] leading-[24px] font-medium text-[#596577] flex-1">
          Quét mã QR để truy cập nhanh
        </p>
        <img src="/images/qr-code.svg" alt="QR truy cập Tin Vay" class="w-[72px] h-[72px] object-cover" />
      </div>
    </div>

    <!-- Visual -->
    <div>
      <img src="/images/tinvay.png" alt="Giao diện Tin Vay trên VNPT Money" class="w-[168px] lg:w-[284px] object-cover" />
    </div>
  </div>
</section>
</template>

<script setup>
defineProps({
  service: {
    type: Object,
    default: () => ({})
  }
})
</script>

<style lang="scss" scoped>

</style>
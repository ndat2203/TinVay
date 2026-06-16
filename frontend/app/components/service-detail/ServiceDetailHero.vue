<template>
<section class="service-banner bg-cover bg-center px-4 lg:px-8 pt-[136px] pb-[414px]" 
    :style="{
        backgroundImage: `url(${service?.data?.service?.background_image || '/images/banner-detail-service.jpg'})`
    }">
  <div class="max-w-[840px] mx-auto">
    <h1 class="text-[18px] font-bold text-center uppercase text-white">
      Dịch vụ {{ service?.data?.service?.parent?.title }}
    </h1>   
    <p class="text-[40px] leading-[44px] lg:leading-[70px] font-bold text-center text-white lg:text-[64px]">
      Tin Vay trên {{ service?.data?.service?.title }}
    </p>
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
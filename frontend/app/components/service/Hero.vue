<template>
<section
  class="flex items-center bg-cover bg-center service-hero"
  aria-label="Vay cá nhân"
  :style="{
      '--desktop-bg': `url(${backgroundImage})`,
      '--mobile-bg': `url(${mobileBackgroundImage || backgroundImage})`,
      '--tablet-bg': `url(${tabletBackgroundImage || backgroundImage})`
  }"
>
  <div class="max-w-[700px] px-4 lg:px-8 pt-[46px] lg:pt-[135px] pb-[408px] lg:pb-[184px] ">
    <div>
      <p
        class="text-[16px] lg:text-[18px] font-semibold uppercase text-[#bb202e]"
      >
        {{ data.subtitle }}
      </p>

      <h1
        class="mt-[15px] mb-10 text-[40px] lg:text-[64px] font-bold leading-[70px] text-[#58595b]"
      >
        {{ data.title }}
      </h1>
    </div>

    <p
      class="text-[18px] font-medium leading-[27px] text-[#2f3f55]"
    >
      {{ data.description }}
    </p>
    <div v-if="button" class="flex items-center justify-center gap-6 mt-[32px]
                              md:hidden
                              lg:justify-start lg:flex ">
        <button class="cursor-pointer rounded-2xl bg-[rgb(187,32,46)] px-6 py-[15px] text-[18px] leading-[18px] font-medium text-white transition-colors duration-300 hover:bg-[#F9663E]">
            <a href="#business-sme-loan-service" >
                Đăng ký vay
            </a>
        </button> 
        <button class="cursor-pointer rounded-2xl border border-[rgb(47,63,85)] px-6 py-[15px] text-[18px] leading-[18px] font-medium text-[rgb(47,63,85)] transition-colors duration-300 hover:border-[rgb(187,32,46)] hover:text-[rgb(187,32,46)]">
            <a href="#" target="_blank" >
              Nhận tư vấn
            </a>
        </button>
    </div>
  </div>
</section>
</template>

<script setup>
defineProps({
  data: {
    type: Object,
    required: true
  },
  backgroundImage: {
    type: String,
    required: true,
  },
  button: {
    type: Boolean,
    default: true
  },
  mobileBackgroundImage: {
    type: String,
    default: ''
  },
  tabletBackgroundImage: {
    type: String,
    default: ''
  }
})


</script>

<style lang="css" scoped>
.service-hero {
  background-image: var(--desktop-bg);
  background-size: cover;
  background-position: center;  
}
@media (max-width: 1024px) {
  .service-hero {
    background-image: var(--tablet-bg);
  }
}

@media (max-width: 720px) {
  .service-hero {
    background-image: var(--mobile-bg);
  }
}
</style>
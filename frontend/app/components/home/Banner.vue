<template>
  <section
    aria-label="Giới thiệu TIN VAY"
    class="flex items-center bg-[url('/images/banner-home-mobile.png')] 
    md:bg-[url('/images/banner-home-tablet.png')] 
    
    lg:bg-[url('/images/banner-home.png')] bg-cover bg-center"
  >
    <div
      class="
        max-w-[700px]
        px-4 pt-16 pb-[320px]
        md:px-8 md:pb-[420px]
        lg:pb-[137px]
      "
    >
      <div>
        <div
          class="
            text-[16px]
            font-semibold
            uppercase
            text-[rgb(187,32,46)]

            md:text-[18px]
          "
        >
          CHÀO MỪNG ĐẾN!
        </div>

        <h1
          class="
            mt-[15px] mb-[40px]
            text-[40px]
            leading-[42px]
            font-bold
            text-[rgb(88,89,91)]

            md:mt-[15px]
            md:mb-10
            md:text-[64px]
            md:leading-[70px]
          "
        >
          Vay nhanh tin cậy
        </h1>
      </div>

      <p
        class="
          text-[16px]
          leading-6
          font-medium
          text-[rgb(47,63,85)]

          md:text-[18px]
          md:leading-[27px]
        "
      >
        TIN VAY là dịch vụ vay của Công ty Tài chính cổ phần Tín Việt
        (VietCredit), triển khai trên nền tảng các đối tác như My Viettel,
        Fiza (Zalo)..., hướng đến đối tượng khách hàng cá nhân và hộ kinh doanh.
      </p>

      <div
        class="
          mt-6
          flex
          gap-3

          sm:flex-row
          sm:items-center
          sm:gap-4
        "
      >
        <NuxtLink
          to="/ve-chung-toi"
          class="
            cursor-pointer
            rounded-2xl
            bg-[rgb(187,32,46)]
            px-[24px] py-[15px]
            text-base
            font-medium
            text-white
            transition-colors
            duration-300
            hover:bg-[#F9663E]

            md:px-6
            md:py-[15px]
            md:text-[18px]
            md:leading-[18px]
          "
        >
          Giới thiệu
        </NuxtLink>

        <NuxtLink
          to="/lien-he"
          class="
            cursor-pointer
            rounded-2xl
            border border-[rgb(47,63,85)]
            px-[24px] py-[15px]
            text-base
            font-medium
            text-[rgb(47,63,85)]
            transition-colors
            duration-300
            hover:border-[rgb(187,32,46)]
            hover:text-[rgb(187,32,46)]

            md:px-6
            md:py-[15px]
            md:text-[18px]
            md:leading-[18px]
          "
        >
          Liên hệ
        </NuxtLink>
      </div>
    </div>
  </section>
</template>

<script setup>

</script>

<style lang="scss" scoped>

</style>
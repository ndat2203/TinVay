<template>
  <section>
    <div id="business-sme-loan-service" class="flex flex-col items-center justify-center px-[16px] lg:px-8 py-[40px] lg:pt-24 lg:pb-[126px]">
      <h2 class="text-[40px] lg:text-[64px] font-bold leading-[70px] text-[#58595b]">
        Lựa chọn của bạn
      </h2>
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

      <div
        v-else-if="service?.children?.length"
        class="mx-auto mt-[40px] lg:mt-[70px] grid max-w-[1004px] grid-cols-1 md:grid-cols-2 gap-9"
      >
        <!-- Card -->
         <NuxtLink 
          v-for="item in service.children"
          :key="item.id"
          :to="`/dich-vu/${service.slug}/${item.slug}`">
          
          <div class="cursor-pointer rounded-2xl bg-white p-6 lg:px-10 lg:py-8 transition-shadow hover:shadow-[0_4px_12px_rgba(0,0,0,0.15)]">
            <!-- Header -->
            <div class="flex items-center justify-between">
              <div>
                <p class="text-[16px] font-medium leading-6 text-[#2f3f55]">
                  Tin Vay trên
                </p>

                <h3
                  class="mt-2 cursor-pointer text-[28px] font-bold leading-9 text-[#58595b] transition-colors hover:text-[#bb202e]"
                >
                  {{ item.title }}
                </h3>
              </div>

              <img
              :src="item.image"
              :alt="item.title"
                class="h-[72px] w-[72px] rounded-2xl object-cover"
              />
            </div>

            <!-- Info -->
            <div class="my-4 flex items-center gap-6">
              <div class="flex gap-4">
                <img
                  src="/images/icon-money.svg"
                  alt=""
                />

                <div
                  class="text-[16px] font-medium leading-6 text-[#2f3f55]"
                >
                  {{ formatMoney(item.min_amount) }}
                    -
                  {{ formatMoney(item.max_amount) }}
                  triệu
                </div>
              </div>

              <span>|</span>

              <div class="flex gap-4">
                <img
                  src="/images/icon-time.svg"
                  alt=""
                />

                <div
                  class="text-[16px] font-medium leading-6 text-[#2f3f55]"
                >
                {{ item.min_month }} - {{ item.max_month }} tháng
                </div>
              </div>
            </div>

            <!-- Guide -->
            <div class="mt-2">
              <h4
                class="text-[18px] font-bold leading-[27px] text-[#596577]"
              >
                Hướng dẫn truy cập
              </h4>

              <div class="flex justify-start mt-2 gap-4">
                <div class="flex-1 min-w-0">
                  <ul>
                    <li
                      v-for="(value, index) in item.guide_content"
                      :key="index"
                      class="list-none break-words text-[16px] font-medium leading-6 text-[#596577]"
                    >
                      {{ value }}
                    </li>
                  </ul>
                </div>

                <div class="text-center shrink-0">
                  <img
                    src="/images/qr-viettel.svg"
                    alt="QR Viettel Money"
                    class="h-[72px] w-[72px] rounded-2xl object-cover"
                  />

                  <span
                    class="mt-2 text-sm font-medium text-[#596577]"
                  >
                    Quét QR
                  </span>
                </div>
              </div>
            </div>

            <!-- Button -->
            <button
              class="mt-4 cursor-pointer rounded-2xl bg-[#bb202e] px-6 py-[15px] text-[18px] font-medium leading-[18px] text-white transition-colors duration-300 hover:bg-[#F9663E]"
            >
              Đăng ký vay
            </button>
          </div>
         </NuxtLink>
       
      </div>
    </div>
  </section>
</template>

<script setup>
const props = defineProps({
    service: {
      type: Object,
      required: null,
    },
  })


const formatMoney = (amount) => {
  return new Intl.NumberFormat('vi-VN').format(amount / 1000000)
}
</script>

<style lang="scss" scoped>

</style>
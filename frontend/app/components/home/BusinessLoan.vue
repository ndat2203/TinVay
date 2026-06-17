  <template>
  <section
    v-if="service"
    class="w-full bg-cover bg-left py-[16px] lg:py-[112px] lg:pb-[172px]"
    :style="{
      backgroundImage: `url(${backgroundImage})`,
    }"
  >
    <div class="my-8 px-[16px] lg:px-8">
      <div class="ml-auto max-w-[1130px]">
        
        <!-- TOP -->
        <div  class="mb-[160px] lg:mb-14 flex items-end justify-between">
          <div>
            <p class="mb-0 lg:mb-4 text-[16px] lg:text-lg font-semibold uppercase text-white">
              DỊCH VỤ TIÊU BIỂU
            </p>

            <h2 class="text-[40px] lg:text-[64px] font-bold leading-[70px] text-white">
              {{ service.title }}
            </h2>
          </div>

          <NuxtLink
            :to="link"
            class="hidden lg:block rounded-2xl bg-[rgb(187,32,46)] px-6 py-4 text-lg font-medium text-white transition-colors hover:bg-[#F9663E]"
          >
            Xem tất cả
          </NuxtLink>
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
          v-else-if="service?.children?.length"
          class="
            flex gap-4 overflow-x-auto pb-4
            scroll-smooth snap-x snap-mandatory

            md:grid md:grid-cols-3 md:gap-9 md:overflow-visible
          "
        >
          <NuxtLink 
          v-for="item in service.children"
          :key="item.id"
          :to="`/dich-vu/${service.slug}/${item.slug}`"
          class="
              snap-start
              max-w-[90%] flex-shrink-0
              rounded-2xl bg-white p-6
              transition-shadow hover:shadow-lg

              md:max-w-full
            "
          >
            <div>
        
            <div class="flex">
              <div class="flex-1">
                <div class="text-base font-medium leading-6 text-slate-700">
                  Tin Vay trên
                </div>

                <h3
                  class="mt-2 inline-block text-[28px] font-bold leading-9 text-slate-700 transition-colors hover:text-[rgb(187,32,46)]"
                >
                  {{ item.title }}
                </h3>
              </div>

              <img
                :src="item.image"
                :alt="item.title"
                class="h-[72px] w-[72px] object-contain"
              />
            </div>

            <div class="mt-2 flex items-center justify-between">
              <div class="flex items-center gap-5">
                <img src="/images/icon-money.svg" alt="" />

                <span class="text-base font-medium text-slate-700">
                  {{ formatMoney(item.min_amount) }}
                  -
                  {{ formatMoney(item.max_amount) }}
                  triệu
                </span>
              </div>

              <span class="mx-4 text-gray-300">|</span>

              <div class="flex items-center gap-5">
                <img src="/images/icon-time.svg" alt="" />

                <span class="text-base font-medium text-slate-700">
                  {{ item.min_month }} - {{ item.max_month }} tháng
                </span>
              </div>
            </div>
          </div>
          </NuxtLink>
        </div>

        <div class="mt-8 flex items-center justify-center w-full">
          <NuxtLink :to="link" class="bg-[rgb(187,32,46)] transition-colors text-[#fff] text-18-18 font-medium rounded-[16px] px-6 py-[15px] hover:bg-[#F9663E] w-full max-w-[350px] text-center lg:hidden">
            Xem tất cả
          </NuxtLink>
        </div>
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


const formatMoney = (amount) => {
  return new Intl.NumberFormat('vi-VN').format(amount / 1000000)
}

  </script>

  <style lang="scss" scoped>

  </style>
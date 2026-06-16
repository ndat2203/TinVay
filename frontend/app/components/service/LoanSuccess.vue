<template>
<section class="px-8 pb-24">
  <div  v-if="successData">
    <div>
      <h2
        class="mb-[60px] text-center text-[36px] lg:text-[64px] font-bold leading-[44px] lg:leading-[70px] text-[#58595b]"
      >
        <p class="">
          {{ successData.count }}+
        </p>
        {{ successData.title }}
      </h2>
    </div>

    <div
     ref="slider"
      class="
        flex gap-4 overflow-x-auto pb-4
        snap-x snap-mandatory scroll-smooth

        lg:grid lg:grid-cols-3 lg:gap-10
      "
    >
      <div
        v-for="(item, index) in successData.data"
        :key="index"
        class="
          snap-start
          max-w-[85%]
          flex-shrink-0

          rounded-2xl p-6
          flex flex-col justify-between gap-6


          lg:max-w-full
        "
      >
        <p
          class="text-[18px] font-medium leading-[27px] text-[#2f3f55]"
        >
          {{ item.description }}
        </p>

        <div class="flex gap-4">
          <img
            :src="item.image"
            :alt="item.name"
            class="h-12 w-12 rounded-full object-cover"
          />

          <p
            class="text-[18px] font-medium leading-[27px] text-[#2f3f55]"
          >
            <strong>{{ item.name }}</strong>
            – {{ item.position }}
          </p>
        </div>
      </div>
    </div>

    <div class="mt-[84px] flex items-center justify-center gap-5">
      <button
        class="cursor-pointer rounded-2xl bg-[#bb202e] px-6 py-[15px] text-[18px] font-bold leading-[18px] text-white transition-colors duration-300 hover:bg-[#F9663E]"
      >
        <a href="#business-sme-loan-service" >
            Đăng ký vay
        </a>
      </button>

      <button
        class="w-fit cursor-pointer rounded-2xl border border-[#2f3f55] bg-white px-6 py-[15px] text-[18px] font-bold leading-[18px] text-[#2f3f55] transition-colors duration-300"
      >
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
  successData: {
    type: Object,
    required: true
  }
})

const slider = ref(null)

let interval = null

onMounted(() => {
  if (window.innerWidth >= 1024) return

  interval = setInterval(() => {
    if (!slider.value) return

    const container = slider.value

    container.scrollBy({
      left: 320,
      behavior: 'smooth'
    })

    if (
      container.scrollLeft + container.clientWidth >=
      container.scrollWidth - 10
    ) {
      container.scrollTo({
        left: 0,
        behavior: 'smooth'
      })
    }
  }, 3000)
})

onUnmounted(() => {
  clearInterval(interval)
})
</script>

<style lang="scss" scoped>

</style>
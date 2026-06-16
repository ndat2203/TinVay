<template>
<section class="flex flex-col items-center justify-center px-4 pt-[40px] md:px-0 lg:px-8 lg:pt-16">

  <!-- Intro -->
  <div class="max-w-[740px]">
    <p class="mb-[40px] lg:mb-16 text-center text-[18px] leading-[27px] text-[#2F3F55]">
      {{ service?.data?.service?.content}}
    </p>
  </div>

  <!-- Header -->
  <div>
    <h2 class="text-[28px] text-center   leading-[36px] font-medium text-[#58595B]">
      Sản phẩm là sự hợp tác giữa các bên
    </h2>
  </div>

  <!-- Partners -->
  <div class="my-12 flex flex-col md:flex-row gap-10 md:mb-[40px] lg:mb-[98px]">
    <div class="mx-12 md:mx-0 lg:mx-12 flex max-w-[254px] flex-col items-center">
      <h3 class="text-[18px] font-medium leading-[27px] text-[#2F3F55]">
        Đơn vị chủ quản
      </h3>

      <div>
        <img
          src="/images/logo-viet-credit-black.png"
          alt="VietCredit"
          class="mt-6 mb-4 h-[40px] object-cover"
        />
      </div>

      <p class="text-center text-[16px] font-semibold leading-[24px] text-[#596577]">
        Công ty Tài chính tổng hợp cổ phần Tín Việt
      </p>
    </div>

    <div class="mx-12 md:mx-0 lg:mx-12 flex max-w-[254px] flex-col items-center">
      <h3 class="text-[18px] font-medium leading-[27px] text-[#2F3F55]">
        Đơn vị quản lý nền tảng KH
      </h3>

      <div>
        <img
          :src="service?.data?.service?.logo"
          :alt=" service?.data?.service?.title "
          class="mt-6 mb-4 h-[40px] object-cover"
        />
      </div>

      <p class="text-center text-[16px] font-semibold leading-[24px] text-[#596577]">
        {{ service?.data?.service?.subtitle}}
      </p>
    </div>
  </div>

  <!-- Loan Info -->
  <div class="flex flex-col lg:flex-row items-center justify-center lg:px-24">

    <!-- Left -->
    <div class="mr-0 lg:mr-24 flex-1">
      <span class="text-[18px] font-semibold uppercase leading-[28px] text-[#BB202E]">
        Tin vay trên {{ service?.data?.service?.title }}
      </span>

      <h2 class="mt-4 mb-4 lg:mb-10 text-[40px] lg:text-[64px] font-bold leading-[44px] lg:leading-[70px] text-[#58595B]">
        Dành cho nhóm khách hàng nào?
      </h2>

      <h3 class="mb-6 text-[18px] font-bold leading-[27px] text-[#2F3F55]">
        Khách hàng của ứng dụng {{ service?.data?.service?.title }} đã
      </h3>

      <div class="flex flex-col gap-4">

        <div class="flex items-start gap-[14px]">
          <img
            src="/images/icon-checked.svg"
            alt=""
            class="h-6 w-6"
          />
          <span class="text-[#2F3F55]">
            Xác thực định danh
          </span>
        </div>

        <div class="flex items-start gap-[14px]">
          <img
            src="/images/icon-checked.svg"
            alt=""
            class="h-6 w-6"
          />
          <span class="text-[#2F3F55]">
            Kết nối tài khoản ngân hàng
          </span>
        </div>

        <div class="flex items-start gap-[14px]">
          <img
            src="/images/icon-checked.svg"
            alt=""
            class="h-6 w-6"
          />
          <span class="text-[#2F3F55]">
            Đáp ứng một số tiêu chí khác của tổ chức tín dụng
          </span>
        </div>

      </div>
    </div>

    <!-- Right -->
    <div class="mt-4 lg:mt-0 lg:ml-5 flex flex-1 md:w-full flex-col gap-4 rounded-2xl bg-[#EBEFF4] px-4 py-[40px] lg:px-16 lg:pt-10 lg:pb-12">
            <h3 class="text-[28px] font-bold leading-[36px] text-[#58595B]">
                Gói vay cung cấp
            </h3>

            <!-- Amount -->
            <div class="w-full rounded-2xl bg-white px-4 py-6">

                <div class="mb-4 flex justify-between text-[18px] font-bold leading-[27px]">
                <span class="text-[#2F3F55]">Số tiền vay</span>

                <span class="text-[16px] font-medium leading-[24px] text-[#BB202E]">
                    {{ formatMoney(amount) }} đ
                </span>
                </div>

                <div class="my-4">
                <input
                    v-model.number="amount"
                    type="range"
                    :min="service?.data?.service?.min_amount"
                    :max="service?.data?.service?.max_amount"
                    :style="{ '--progress': `${progress}%` }"
                    class="service-loan-info__slider"
        
                />
                </div>

                <div class="flex justify-between">
                <span class="text-[16px] font-medium leading-[24px] text-[#2F3F55]">
                {{ formatMoney(service?.data?.service?.min_amount) }} đ
                </span>

                <span class="text-[16px] font-medium leading-[24px] text-[#2F3F55]">
                    {{ formatMoney(service?.data?.service?.max_amount) }} đ
                </span>
                </div>

            </div>

            <!-- Term -->
            <div class="rounded-2xl bg-white px-4 py-6">

                <p class="mb-2 text-[18px] font-bold leading-[28px] text-[#2F3F55]">
                Thời hạn vay
                </p>

                <div class="flex flex-wrap gap-2">

                <button class="rounded-2xl border border-[#2F3F55] px-4 py-[11px] text-[14px] font-medium leading-[14px] text-[#2F3F55]">
                    6 tháng
                </button>

                <button class="rounded-2xl border border-[#2F3F55] px-4 py-[11px] text-[14px] font-medium leading-[14px] text-[#2F3F55]">
                    9 tháng
                </button>

                <button class="rounded-2xl border border-[#2F3F55] px-4 py-[11px] text-[14px] font-medium leading-[14px] text-[#2F3F55]">
                    12 tháng
                </button>

                <button class="rounded-2xl border border-[#2F3F55] px-4 py-[11px] text-[14px] font-medium leading-[14px] text-[#2F3F55]">
                    15 tháng
                </button>

                <button class="rounded-2xl border border-[#2F3F55] px-4 py-[11px] text-[14px] font-medium leading-[14px] text-[#2F3F55]">
                    18 tháng
                </button>

                <button class="rounded-2xl border border-[#2F3F55] px-4 py-[11px] text-[14px] font-medium leading-[14px] text-[#2F3F55]">
                    21 tháng
                </button>

                <button class="rounded-2xl border border-[#BB202E] bg-[#BB202E] px-4 py-[11px] text-[14px] font-medium leading-[14px] text-white">
                    24 tháng
                </button>

                </div>
            </div>

            <!-- Details -->
            <div class="rounded-2xl bg-white px-4 py-6">

                <h4 class="mb-2 text-[18px] font-bold leading-[27px] text-[#2F3F55]">
                Lãi và trả phí
                </h4>

                <p class="text-[16px] font-medium leading-[24px] text-[#2F3F55]">
                Tùy theo khoản vay và thời hạn vay. Thông tin về lãi, phí sẽ hiển
                thị chi tiết trên ứng dụng và hợp đồng khi đăng ký khoản vay.
                </p>

            </div>

            <!-- Button -->
            <button
                class="mt-4 w-full rounded-2xl bg-[#BB202E] px-6 py-[15px] text-center text-[18px] font-medium leading-[18px] text-white transition hover:bg-[#F9663E]"
            >
                Đăng ký vay
            </button>
        
    </div>

  </div>

</section>
</template>

<script setup>
const { service } = defineProps({
  service: {
    type: Object,
    default: () => ({})
  }
})
const amount = ref(0)

watch(
  () => service?.data?.service,
  (newService) => {
    if (newService?.max_amount) {
      amount.value = newService.max_amount
    }
  },
  { immediate: true }
)

const progress = computed(() => {
  const min = service?.data?.service?.min_amount || 0
  const max = service?.data?.service?.max_amount || 1

  return ((amount.value - min) / (max - min)) * 100
})
const formatMoney = (value) => {
  return new Intl.NumberFormat('vi-VN').format(value)
}

</script>

<style lang="css" scoped>

.service-loan-info__slider {
  width: 100%;
  appearance: none;
  -webkit-appearance: none;
  background: transparent;
  cursor: pointer;
}
/* Thanh trượt (track) */
.service-loan-info__slider::-webkit-slider-runnable-track {
  height: 6px;
  border-radius: 999px;
   background: linear-gradient(
    to right,
    #bb202e var(--progress, 50%),
    #e5e9ef var(--progress, 50%)
  );
}

/* Thumb */
.service-loan-info__slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;

    width: 28px;
    height: 28px;
    margin-top: -11px;

    border-radius: 6px;
    background-color: #bb202e;
    cursor: pointer;
    border: none;

    /* 3 vạch trắng */
    background-image:
        linear-gradient(white, white),
        linear-gradient(white, white),
        linear-gradient(white, white);

    background-size:
        2px 12px,
        2px 12px,
        2px 12px;

    background-position:
        calc(50% - 5px) center,
        center center,
        calc(50% + 5px) center;

    background-repeat: no-repeat;
}

/* Firefox */
.service-loan-info__slider::-moz-range-track {
    height: 6px;
    background: #ddd;
    border-radius: 999px;
}

.service-loan-info__slider::-moz-range-thumb {
    width: 28px;
    height: 28px;

    border-radius: 6px;
    background-color: #e53935;
    border: none;
    cursor: pointer;

    background-image:
        linear-gradient(white, white),
        linear-gradient(white, white),
        linear-gradient(white, white);

    background-size:
        2px 12px,
        2px 12px,
        2px 12px;

    background-position:
        calc(50% - 5px) center,
        center center,
        calc(50% + 5px) center;

    background-repeat: no-repeat;
}
</style>
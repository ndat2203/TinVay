<template>
<section class="px-[16px] lg:px-8 mb-24 mt-[40px] lg:mt-0" aria-labelledby="register-process-title">

  <!-- Decorations -->
  <div class="flex justify-center items-center static lg:relative mt-0 lg:-mt-11">
    <img
      class="w-[71px] h-[52px] lg:w-[104px] lg:h-[104px] cursor-pointer"
      src="/images/money-big.png"
      alt=""
    />
  </div>

  <div class="flex justify-center items-center mr-[104px]">
    <img
      class="w-[38px] h-[25px] lg:w-[104px] lg:h-[104px] cursor-pointer"
      src="/images/money-small.png"
      alt=""
    />
  </div>

  <!-- Header -->
  <div class="mb-[70px] text-center">
    <p class="text-[18px] leading-[18px] uppercase font-semibold text-[#BB202E] mb-4">
      QUY TRÌNH ĐĂNG KÝ
    </p>

    <h2
      id="register-process-title"
      class="font-bold text-[40px] leading-[44px] lg:text-[64px] lg:leading-[70px] text-[#58595B]"
    >
      4 bước vay nhanh
    </h2>
  </div>

  <!-- Steps row 1 -->
  <div class="flex flex-col justify-center items-center gap-4 
              
              md:flex-row">
    
    <!-- Step 1 -->
    <div class="flex items-start max-w-[350px] gap-4 w-full lg:block">
      <div class="flex justify-center">
        <img class="w-12 h-12" src="/images/icon-select-loan.svg" alt="" />
      </div>

      <div class="text-left lg:text-center">
        <h3 class="mt-0 lg:mt-4 mb-1 font-bold text-[28px] leading-[36px] text-[#58595B]">
          Lựa chọn khoản vay
        </h3>
        <p class="font-medium text-[16px] leading-6 text-[#596577]">
          Chọn số tiền vay và thời gian vay <br />
          linh hoạt theo nhu cầu
        </p>
      </div>
    </div>

    <!-- Line -->
    <div class="mx-8 hidden lg:block">
      <img src="/images/icon-line.svg" alt="" />
    </div>

    <!-- Step 2 -->
    <div class="flex items-start max-w-[350px] gap-4 w-full lg:block">
      <div class="flex justify-center">
        <img class="w-12 h-12" src="/images/icon-money-active.svg" alt="" />
      </div>

      <div class="text-left lg:text-center">
        <h3 class="mt-0 lg:mt-4 mb-1 font-bold text-[28px] leading-[36px] text-[#58595B]">
          Đăng ký thông tin
        </h3>
        <p class="font-medium text-[16px] leading-6 text-[#596577]">
          Xác thực một số thông tin cá nhân <br />
          và chụp ảnh CCCD
        </p>
      </div>
    </div>
  </div>

  <!-- Steps row 2 -->
  <div class="flex flex-col md:flex-row justify-center items-center gap-[16px] lg:gap-[140px] mt-[16px] lg:mt-12">

    <!-- Step 3 -->
    <div class="flex items-start max-w-[350px] gap-4 w-full lg:block">
      <div class="flex justify-center">
        <img class="w-12 h-12" src="/images/icon-select-loan.svg" alt="" />
      </div>

      <div class="text-left lg:text-center">
        <h3 class="mt-0 lg:mt-4 mb-1 font-bold text-[28px] leading-[36px] text-[#58595B]">
          Ký kết hợp đồng
        </h3>
        <p class="font-medium text-[16px] leading-6 text-[#596577]">
          Nhập mã OTP gửi về tin nhắn SMS để ký hợp đồng điện tử
        </p>
      </div>
    </div>

    <!-- Step 4 -->
    <div class="flex items-start max-w-[350px] gap-4 w-full lg:block">
      <div class="flex justify-center">
        <img class="w-12 h-12" src="/images/icon-money-active.svg" alt="" />
      </div>

      <div class="text-left lg:text-center">
        <h3 class="mt-0 lg:mt-4 mb-1 font-bold text-[28px] leading-[36px] text-[#58595B]">
          Phê duyệt, giải ngân
        </h3>
        <p class="font-medium text-[16px] leading-6 text-[#596577]">
          Chờ duyệt vay, nhận giải ngân trong 1-3 phút
        </p>
      </div>
    </div>

  </div>

</section>
</template>

<script setup>

</script>

<style lang="scss" scoped>

</style>
<script setup>

</script>

<template>
<footer
  class="px-[16px] lg:px-8 bg-[linear-gradient(180deg,#ebeff4_14.28%,#fff)]"
>
  <div
    class="grid grid-cols-1 lg:grid-cols-4 gap-6 py-10"
  >
    <!-- Company -->
    <div>
      <div class="mb-6">
        <img
          class="footer__logo"
          src="/images/logo-footer.png"
          alt="VietCredit"
        />
      </div>

      <p class="mb-4 text-base font-bold leading-6 text-[#2f3f55]">
        Công Ty Tài Chính Tổng Hợp Cổ Phần Tín Việt
      </p>

      <div class="space-y-3">
        <div class="flex items-center gap-3">
          <div class="min-w-[80px]">Hotline</div>
          <p
            class="text-base font-medium leading-6 text-[#2f3f55] no-underline"
          >
            1900 638 996
          </p>
        </div>

        <div class="flex items-center gap-3">
          <div class="min-w-[80px]">Email</div>
          <p
            class="text-base font-medium leading-6 text-[#2f3f55] no-underline"
          >
            tinvay@vietcredit.com.vn
          </p>
        </div>

        <div class="flex items-center gap-3">
          <div class="min-w-[80px]">Website</div>
          <p
            
            class="text-base font-medium leading-6 text-[#2f3f55] no-underline"
          >
            http://tinvay.com.vn/
        </p>
        </div>
      </div>

      <div class="flex items-center gap-2 mt-4">
        <NuxtLink to="https://www.facebook.com/TinVayVietCredit/" target="_blank">
          <img src="/images/icon-facebook.svg" alt="Facebook" />
        </NuxtLink>
        <NuxtLink to="https://zalo.me/3772211970465091349" target="_blank">
           <img src="/images/icon-zalo.svg" alt="Zalo" />
        </NuxtLink>
        <NuxtLink to="https://www.youtube.com/@TinVayOfficial" target="_blank">
            <img src="/images/icon-youtobe.svg" alt="YouTube" />
        </NuxtLink>
        <NuxtLink to="https://www.tiktok.com/" target="_blank">
          <img src="/images/icon-tiktok.svg" alt="TikTok" />
        </NuxtLink>
      </div>
    </div>

    <!-- Address -->
    <div>
      <div class="h-[60px] hidden lg:block"></div>

      <div class="flex gap-3 mb-3">
        <div class="min-w-[88px] text-base leading-6 text-[#2f3f55]">
          Trụ sở chính
        </div>

        <p class="text-base leading-6 text-[#2f3f55]">
          Tầng 9, Tòa nhà V.E.T, số 98 Hoàng Quốc Việt, phường Nghĩa Đô, quận Cầu Giấy, thành phố Hà Nội
        </p>
      </div>

      <div class="flex gap-3">
        <div class="min-w-[88px] text-base leading-6 text-[#2f3f55]">
          Chi nhánh
        </div>

        <p class="text-base leading-6 text-[#2f3f55]">
          Tầng 3, Tòa nhà An Phú, 43-45 đường Thảo Điền, Thảo Điền, Thủ Đức (Quận 2), Hồ Chí Minh
        </p>
      </div>
    </div>

    <!-- Quick links -->
    <div>
      <h3
        class="flex items-center h-0 mb-[20px] lg:mb-0 lg:h-[60px] text-lg font-semibold uppercase text-[#596577]"
      >
        Liên kết nhanh
      </h3>

      <ul class="list-disc ml-7">
        <li class="mb-1">
          <NuxtLink to="#" class="text-base font-medium leading-6 text-[#2f3f55]">
            Thanh toán khoản vay
          </NuxtLink>
        </li>

        <li class="mb-1">
          <NuxtLink to="/lien-he" class="text-base font-medium leading-6 text-[#2f3f55]">
            Liên hệ
          </NuxtLink>
        </li>

        <li class="mb-1">
          <NuxtLink to="/ve-chung-toi" class="text-base font-medium leading-6 text-[#2f3f55]">
            Giới thiệu
          </NuxtLink>
        </li>

        <li class="mb-1">
          <NuxtLink to="#" class="text-base font-medium leading-6 text-[#2f3f55]">
            Biểu mẫu
          </NuxtLink>
        </li>
      </ul>
    </div>

    <!-- Products -->
    <div>
      <h3
        class="flex items-center h-0 mb-[20px] lg:mb-0 lg:h-[60px] text-lg font-semibold uppercase text-[#596577]"
      >
        Sản phẩm
      </h3>

      <ul class="list-disc ml-7">
        <li class="mb-1">
          <NuxtLink to="#" class="text-base font-medium leading-6 text-[#2f3f55]">
            Tin Vay trên My Viettel
          </NuxtLink>
        </li>

        <li class="mb-1">
          <NuxtLink to="#" class="text-base font-medium leading-6 text-[#2f3f55]">
            Tin Vay trên 1Office
          </NuxtLink>
        </li>

        <li class="mb-1">
          <NuxtLink to="#" class="text-base font-medium leading-6 text-[#2f3f55]">
            Tin Vay trên Viettel Money
          </NuxtLink>
        </li>

        <li class="mb-1">
          <NuxtLink to="#" class="text-base font-medium leading-6 text-[#2f3f55]">
            Tin Vay trên MoMo
          </NuxtLink>
        </li>

        <li class="mb-1">
          <NuxtLink to="#" class="text-base font-medium leading-6 text-[#2f3f55]">
            Tin Vay trên VNPT Money
          </NuxtLink>
        </li>
      </ul>
    </div>
  </div>

  <div
    class="flex flex-col lg:flex-row gap-4 items-start lg:gap-0 lg:items-center justify-between py-5 border-t-2 border-[#e8e8e8]"
  >
    <p class="text-base font-medium leading-[21px] text-[#596577]">
      Giấy phép thành lập và hoạt động số 59/GP-NHNN do Ngân hàng Nhà nước
      Việt Nam cấp ngày 18/06/2018
    </p>

      <!-- <NuxtLink
        to="#"
        class="text-base font-medium leading-[21px] text-[#2f3f55] no-underline"
      >
        Lên đầu trang
      </NuxtLink> -->
  </div>
</footer>
</template>



<style lang="scss" scoped>

</style>
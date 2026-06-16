<template>
  <section class="pb-8">
    <!-- Header -->
    <div
      class="flex flex-col items-center bg-[url('/images/banner-introduct.png')] px-8 py-24
      "
    >
      <div class="flex flex-col gap-4">
        <p
          class="text-center text-[18px] font-semibold leading-[27px] uppercase text-[rgb(187,32,46)]"
        >
          Liên hệ
        </p>

        <h2
          class="text-center text-[40px] lg:text-[64px] font-bold leading-[70px] text-[rgb(88,89,91)]"
        >
          Bạn cần hỗ trợ?
        </h2>
      </div>

      <p
        class="mt-10 text-center text-[18px] font-medium leading-[27px] text-[rgb(47,63,85)] md:mt-6 lg:mt-[40px]"
      >
        Mọi thắc mắc, vui lòng liên hệ bộ phận Chăm sóc khách hàng Tin Vay
      </p>
    </div>

    <!-- List -->
    <div
      class="relative -mt-[50px] grid grid-cols-1 lg:grid-cols-4 gap-10 px-8"
    >
      <!-- Email -->
      <div
        class="flex flex-row lg:flex-col items-center justify-start lg:justify-center gap-7 rounded-2xl bg-white p-6 lg:p-10"
      >
        <img
          src="/images/icon-mail.svg"
          alt="Email"
        />

        <div>
          <h3
            class="text-left lg:text-center text-[28px] font-bold leading-9 text-[rgb(88,89,91)]"
          >
            Email
          </h3>

          <p
            class="whitespace-pre-line break-words text-left lg:text-center text-[18px] font-medium leading-[27px] text-[rgb(89,101,119)]"
          >
            tinvay@vietcredit.com.vn
          </p>
        </div>

        <button
          class="hidden lg:block rounded-2xl bg-[rgb(187,32,46)] px-6 py-[15px] text-[18px] font-medium leading-[18px] text-white transition-colors duration-300 hover:bg-[#f9663e]"
        >
          Gửi ngay
        </button>
      </div>

      <!-- Hotline -->
      <div
        class="flex flex-row lg:flex-col items-center justify-start lg:justify-center gap-7 rounded-2xl bg-white p-6 lg:p-10"
      >
        <img
          src="/images/icon-call.svg"
          alt="Hotline"
        />

        <div>
          <h3
            class="text-left lg:text-center text-[28px] font-bold leading-9 text-[rgb(88,89,91)]"
          >
            Đường dây nóng
          </h3>

          <p
            class="whitespace-pre-line break-words text-left lg:text-center text-[18px] font-medium leading-[27px] text-[rgb(89,101,119)]"
          >
            1900 638 996 (1000đ/phút)
          </p>
        </div>

        <button
          class="hidden lg:block rounded-2xl bg-[rgb(187,32,46)] px-6 py-[15px] text-[18px] font-medium leading-[18px] text-white transition-colors duration-300 hover:bg-[#f9663e]"
        >
          Gọi ngay
        </button>
      </div>

      <!-- Facebook -->
      <div
        class="flex flex-row lg:flex-col items-center justify-start lg:justify-center gap-7 rounded-2xl bg-white p-6 lg:p-10"
      >
        <img
          src="/images/icon-fb.svg"
          alt="Facebook"
        />

        <div>
          <h3
            class="text-left lg:text-center text-[28px] font-bold leading-9 text-[rgb(88,89,91)]"
          >
            Chat Facebook
          </h3>

          <p
            class="whitespace-pre-line break-words text-left lg:text-center text-[18px] font-medium leading-[27px] text-[rgb(89,101,119)]"
          >
            fb/tinvayofficial
          </p>
        </div>

        <button
          class="hidden lg:block rounded-2xl bg-[rgb(187,32,46)] px-6 py-[15px] text-[18px] font-medium leading-[18px] text-white transition-colors duration-300 hover:bg-[#f9663e]"
        >
          Chat ngay
        </button>
      </div>

      <!-- Zalo -->
      <div
        class="flex flex-row lg:flex-col items-center justify-start lg:justify-center gap-7 rounded-2xl bg-white p-6 lg:p-10"
      >
        <img
          src="/images/icon-zalo (1).svg"
          alt="Zalo"
        />

        <div>
          <h3
            class="text-left lg:text-center text-[28px] font-bold leading-9 text-[rgb(88,89,91)]"
          >
            Chat Zalo
          </h3>

          <p
            class="whitespace-pre-line break-words text-left lg:text-center text-[18px] font-medium leading-[27px] text-[rgb(89,101,119)]"
          >
            TINVAY
          </p>
        </div>

        <button
          class="hidden lg:block rounded-2xl bg-[rgb(187,32,46)] px-6 py-[15px] text-[18px] font-medium leading-[18px] text-white transition-colors duration-300 hover:bg-[#f9663e]"
        >
          Chat ngay
        </button>
      </div>
    </div>
  </section>
</template>

<script setup>
definePageMeta({
  path: '/lien-he'
})
</script>
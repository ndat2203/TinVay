
<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const categories = ref([])

const serviceCategories = ref([])
const postCategories = ref([])

const isMenuOpen = ref(false)
const openService = ref(false)
const openNews = ref(false)

const fetchCategories = async () => {
  try {
    const res = await axios.get('http://127.0.0.1:8000/api/categories')

    categories.value = res.data.data || res.data

    serviceCategories.value = categories.value.filter(
      item => item.type === 'service'
    )

    postCategories.value = categories.value.filter(
      item => item.type === 'post'
    )
  } catch (error) {
    console.error(error)
  }
}

const toggleService = () => {
  openService.value = !openService.value

  if (openService.value) {
    openNews.value = false
  }
}

const toggleNews = () => {
  openNews.value = !openNews.value

  if (openNews.value) {
    openService.value = false
  }
}

onMounted(() => {
  fetchCategories()
})
</script>

<template>
  <header
    class="sticky top-0 z-[1000] border-b border-[#e8e8e8] bg-white shadow-[0_1px_4px_rgba(0,0,0,0.06)]"
  >
    <div
      class="mx-auto flex h-[55px] max-w-7xl items-center justify-between px-4 sm:px-6 lg:h-[75px] lg:max-w-full lg:px-8"
    >
      <!-- Logo -->
      <NuxtLink
        to="/"
        class="flex items-center gap-[10px] no-underline"
      >
        <img
          src="/images/logo (1).png"
          alt="logo"
          class="h-[40px] w-[93px] md:h-[52px] md:w-[120px]"
        />
      </NuxtLink>

      <!-- Desktop Menu -->
      <nav class="hidden lg:block">
        <ul class="relative flex items-center">
          <li>
            <NuxtLink
              to="/"
              class="block px-4 leading-[60px] text-sm text-[#333] hover:text-[#e03a2f]"
            >
              Trang chủ
            </NuxtLink>
          </li>

          <li>
            <NuxtLink
              to="/ve-chung-toi"
              class="block px-4 leading-[60px] text-sm text-[#333] hover:text-[#e03a2f]"
            >
              Giới thiệu
            </NuxtLink>
          </li>

          <!-- Dịch vụ -->
          <li class="group relative">
            <span
              class="block cursor-pointer px-4 leading-[60px] text-sm text-[#333] hover:text-[#e03a2f]"
            >
              Dịch vụ
            </span>

            <ul
              class="absolute left-0 top-[60px] hidden min-w-[220px] rounded-md border bg-white shadow-lg group-hover:block"
            >
              <li
                v-for="item in serviceCategories"
                :key="item.id"
              >
                <NuxtLink
                  :to="`/dich-vu/${item.slug}`"
                  class="block px-4 py-2 text-sm hover:bg-gray-100 hover:text-[#e03a2f]"
                >
                  {{ item.name }}
                </NuxtLink>
              </li>
            </ul>
          </li>

          <!-- Tin tức -->
          <li class="group relative">
            <NuxtLink
              to="/tin-tuc"
              class="block cursor-pointer px-4 leading-[60px] text-sm text-[#333] hover:text-[#e03a2f]"
            >
              Tin tức
            </NuxtLink>

            <ul
              class="absolute left-0 top-[60px] hidden min-w-[220px] rounded-md border bg-white shadow-lg group-hover:block"
            >
              <li
                v-for="item in postCategories"
                :key="item.id"
              >
                <NuxtLink
                  :to="`/tin-tuc/${item.slug}`"
                  class="block px-4 py-2 text-sm hover:bg-gray-100 hover:text-[#e03a2f]"
                >
                  {{ item.name }}
                </NuxtLink>
              </li>
            </ul>
          </li>

          <li>
            <NuxtLink
              to="/lien-he"
              class="block px-4 leading-[60px] text-sm text-[#333] hover:text-[#e03a2f]"
            >
              Liên hệ
            </NuxtLink>
          </li>

          <li>
            <NuxtLink
              to="/payment"
              class="block px-4 leading-[60px] text-sm text-[#333] hover:text-[#e03a2f]"
            >
              Thanh toán
            </NuxtLink>
          </li>
        </ul>
      </nav>

      <!-- Hamburger -->
      <button
        @click="isMenuOpen = !isMenuOpen"
        class="flex flex-col justify-center gap-1.5 lg:hidden"
      >
        <span class="h-[2px] w-6 bg-black"></span>
        <span class="h-[2px] w-6 bg-black"></span>
        <span class="h-[2px] w-6 bg-black"></span>
      </button>
    </div>

    <!-- Mobile Menu -->
    <Transition
      enter-active-class="transition-all duration-300 ease-out"
      enter-from-class="-translate-y-3 opacity-0"
      enter-to-class="translate-y-0 opacity-100"
      leave-active-class="transition-all duration-200 ease-in"
      leave-from-class="translate-y-0 opacity-100"
      leave-to-class="-translate-y-3 opacity-0"
    >
      <div
        v-if="isMenuOpen"
        class="border-t bg-white lg:hidden"
      >
        <ul>
          <li>
            <NuxtLink
              to="/"
              class="block px-6 py-4"
            >
              Trang chủ
            </NuxtLink>
          </li>

          <li>
            <NuxtLink
              to="/ve-chung-toi"
              class="block px-6 py-4"
            >
              Giới thiệu
            </NuxtLink>
          </li>

          <!-- Dịch vụ -->
          <li>
            <button
              @click="toggleService"
              class="flex w-full items-center justify-between px-6 py-4"
            >
              <span>Dịch vụ</span>

              <span
                class="transition-transform duration-300"
                :class="{ 'rotate-45': openService }"
              >
                +
              </span>
            </button>

            <Transition
              enter-active-class="transition-all duration-300 ease-out"
              enter-from-class="max-h-0 opacity-0"
              enter-to-class="max-h-[500px] opacity-100"
              leave-active-class="transition-all duration-300 ease-in"
              leave-from-class="max-h-[500px] opacity-100"
              leave-to-class="max-h-0 opacity-0"
            >
              <ul
                v-if="openService"
                class="overflow-hidden bg-gray-50"
              >
                <li
                  v-for="item in serviceCategories"
                  :key="item.id"
                >
                  <NuxtLink
                    :to="`/dich-vu/${item.slug}`"
                    class="block px-10 py-3"
                  >
                    {{ item.name }}
                  </NuxtLink>
                </li>
              </ul>
            </Transition>
          </li>

          <!-- Tin tức -->
          <li>
            <button
              @click="toggleNews"
              class="flex w-full items-center justify-between px-6 py-4"
            >
              <span>Tin tức</span>

              <span
                class="transition-transform duration-300"
                :class="{ 'rotate-45': openNews }"
              >
                +
              </span>
            </button>

            <Transition
              enter-active-class="transition-all duration-300 ease-out"
              enter-from-class="max-h-0 opacity-0"
              enter-to-class="max-h-[500px] opacity-100"
              leave-active-class="transition-all duration-300 ease-in"
              leave-from-class="max-h-[500px] opacity-100"
              leave-to-class="max-h-0 opacity-0"
            >
              <ul
                v-if="openNews"
                class="overflow-hidden bg-gray-50"
              >
                <li
                  v-for="item in postCategories"
                  :key="item.id"
                >
                  <NuxtLink
                    :to="`/tin-tuc/${item.slug}`"
                    class="block px-10 py-3"
                  >
                    {{ item.name }}
                  </NuxtLink>
                </li>
              </ul>
            </Transition>
          </li>

          <li>
            <NuxtLink
              to="/lien-he"
              class="block px-6 py-4"
            >
              Liên hệ
            </NuxtLink>
          </li>

          <li>
            <NuxtLink
              to="/payment"
              class="block px-6 py-4"
            >
              Thanh toán
            </NuxtLink>
          </li>
        </ul>
      </div>
    </Transition>
  </header>
</template>


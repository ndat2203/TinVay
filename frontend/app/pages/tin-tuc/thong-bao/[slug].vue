<script setup>
const route = useRoute()

const slug = route.params.slug

const [
  { data: post, pending: postLoading, error },
  { data: newsPosts, pending: newsLoading }
] = await Promise.all([
  useApiFetch(`/post/detail/${slug}`, {
    transform: (res) => res.data || res
  }),
  useApiFetch('/post/category/thong-bao', {
    transform: (res) => res.data || res
  })
])

</script>

<template>
  <div v-if="pending">
    Loading...
  </div>

  <div v-else-if="error">
    Không tìm thấy thông báo
  </div>

<section class="mx-auto w-full max-w-[740px] py-[40px] px-[16px]">
  <div class="mb-10 flex flex-col items-center justify-center gap-4">
    <p
      class="text-center text-[18px] leading-[21px] font-medium uppercase text-[#596577]"
    >
      THÔNG BÁO • {{ new Date(post.created_at).toLocaleDateString('vi-VN') }}
    </p>

    <h1
      class="text-center text-[28px] leading-[36px] font-bold text-[#58595B]"
    >
      {{ post.title }}
    </h1>

    <p
      class="text-[18px] leading-[27px] font-bold text-[#2F3F55]"
    >
      {{ post.summary }}
    </p>
  </div>

  <div>
    {{ post.content }}
  </div>

  <div class="flex flex-col border-t border-ink10 mt-10 pt-10 gap-4">
    <h3 class="text-[28px] leading-[36px] font-bold text-[rgb(47,63,85)]">Tags</h3> 
    <div class="flex items-center flex-wrap">
      <a href="/tu-khoa/tinvay-vay-nhanh-1g" class="text-18-27 text-[rgb(187,32,46)] mr-1">
        tinvay, vay nhanh,
      </a>
      <a href="/tu-khoa/vay-nhanh-v9" class="text-18-27 text-[rgb(187,32,46)] mr-1">
        vay nhanh,
      </a>
      <a href="/tu-khoa/vay-nhanh-tin-cay-oR" class="text-18-27 text-[rgb(187,32,46)] mr-1">
        vay nhanh tin cậy,
      </a>
      <a href="/tu-khoa/zalopay-vg4" class="text-18-27 text-[rgb(187,32,46)] mr-1">
        ZaloPay
      </a>
    </div>
  </div>

  
</section>
<HomeLastestNew :post="newsPosts" title="Thông báo nổi bật" background-image="/images/banner-noti.png" :loading="loading"/>
</template>
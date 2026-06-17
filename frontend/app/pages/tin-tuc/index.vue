<template>
  <HomeLastestNew  :post="noticePosts" title="Thông báo mới nhất" background-image="/images/banner-noti.png" :loading="loading" link="/tin-tuc/thong-bao"/>
  <HomeLastestNew  :post="newsPosts" title="Bài viết nổi bật" :loading="loading" link="/tin-tuc/bai-viet"/>
</template>

<script setup>
const { data, pending: loading, error } = await useAsyncData(
  'home-posts',
  async () => {
    const [newsRes, noticeRes] = await Promise.all([
      useApiFetch('/post/category/bai-viet'),
      useApiFetch('/post/category/thong-bao'),
    ])

    return {
      newsPosts: newsRes.data.value?.data || [],
      noticePosts: noticeRes.data.value?.data || [],
    }
  }
)

const newsPosts = computed(
  () => data.value?.newsPosts ?? []
)

const noticePosts = computed(
  () => data.value?.noticePosts ?? []
)
</script>

<style lang="scss" scoped>

</style>
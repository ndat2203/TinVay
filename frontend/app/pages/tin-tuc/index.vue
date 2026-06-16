<template>
  <HomeLastestNew  :post="noticePosts" title="Thông báo mới nhất" background-image="/images/banner-noti.png" :loading="loading" link="/tin-tuc/thong-bao"/>
  <HomeLastestNew  :post="newsPosts" title="Bài viết nổi bật" :loading="loading" link="/tin-tuc/bai-viet"/>
</template>

<script setup>
const { data, pending, error } = await useAsyncData(
  'home-posts',
  async () => {
    const [newsRes, noticeRes] = await Promise.all([
      $fetch('http://127.0.0.1:8000/api/post/category/bai-viet'),
      $fetch('http://127.0.0.1:8000/api/post/category/thong-bao')
    ])

    return {
      newsPosts: newsRes.data || [],
      noticePosts: noticeRes.data || []
    }
  }
)

const newsPosts = computed(() => data.value?.newsPosts || [])
const noticePosts = computed(() => data.value?.noticePosts || [])
</script>

<style lang="scss" scoped>

</style>
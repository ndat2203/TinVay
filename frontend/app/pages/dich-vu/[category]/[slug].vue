<template>
    <ServiceDetailHero 
    :service="serviceDetail"
    :loading="loading"
        />
    <ServiceDetailPartners :service="serviceDetail"/>
    <ServiceDetailBenfits />
    <ServiceDetailAccess :service="serviceDetail"/>
    <HomeLoanProcess />
    <ServiceDetailFaq :service="serviceDetail"/>
    <ServiceDetailNews :posts="postService" :title="serviceTitle" background-image="/images/banner-noti.png"/>
</template>

<script setup>
const route = useRoute()

const categorySlug = route.params.category
const serviceSlug = route.params.slug


const {
  data: serviceDetail,
  pending: loading,
  error
} = await useFetch(
  `http://127.0.0.1:8000/api/service/detail/${categorySlug}/${serviceSlug}`
)
console.log(serviceDetail.value)
const serviceTitle = computed(
  () => serviceDetail.value?.data?.service?.title
)

const{
    data: postService
} = await useFetch(
    `http://127.0.0.1:8000/api/post/service/${serviceSlug}/posts`
)

</script>

<style lang="scss" scoped>

</style>
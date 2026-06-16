<template>
<div class="container p-[16px] lg:p-0 flex flex-col items-center gap-[96px] md:mx-auto">
    <img :src="backgroundImage" alt="" class="cursor-pointer max-w-[1132px] w-full"> 
    <!-- <div class="video-wrapper">
        <iframe src="https://www.youtube.com/embed/YXLCVIjTUc8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="allowfullscreen">

        </iframe>
    </div> -->
</div>
</template>

<script setup>
defineProps({
  backgroundImage: {
    type: String,
    required: true,
  },
})
</script>

<style lang="scss" scoped>

</style>
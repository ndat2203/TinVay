<template>
  <HomeBanner />
  <HomePartner :service="allPartners" />
  <HomeMission />
  <HomeWhyChoose :loan-steps="loanSteps" :sectioninfo="sectionInfo" />
  <HomeBusinessLoan :service="personalLoan" background-image="/images/banner-personal.png" :loading="loading" link="/dich-vu/vay-ca-nhan"/>
  <HomeBusinessLoan :service="businessLoan" background-image="/images/banner-business.png" :loading="loading" link="/dich-vu/vay-ho-kinh-doanh"/>
  <!-- <HomeBusinessLoan :service="concernLoan" background-image="/images/banner-concern.jpg" /> -->
  <HomeLoanProcess />
  <HomeLastestNew  :post="noticePosts" title="Thông báo mới nhất" background-image="/images/banner-noti.png" :loading="loading"  link="/tin-tuc/thong-bao"/>
  <HomeLastestNew  :post="newsPosts" title="Bài viết nổi bật" :loading="loading" link="/tin-tuc/bai-viet"/>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue'
import axios from 'axios'

const loanSteps = [
  {
    id: 1,
    title: 'Uy tín, an toàn',
    description: 'VietCredit là công ty tài chính được cấp phép bởi Ngân hàng Nhà nước VN',
    icon: '/images/icon-shield-home.svg',
    row: 1,
    column: 'left',
  },
  {
    id: 2,
    title: 'Giải ngân nhanh',
    description: 'Giải ngân trong vòng 1-3 phút sau khi được duyệt khoản vay',
    icon: '/images/icon-fast-transfer-home.svg',
    row: 1,
    column: 'right',
  },
  {
    id: 3,
    title: 'Gói vay đa dạng',
    description: 'Cho vay từ 5 đến 50 triệu đồng, kỳ hạn linh hoạt 6 đến 21 tháng',
    icon: '/images/icon-select-loan.svg',
    row: 2,
    column: 'left',
    order: 1,
  },
  {
    id: 4,
    title: 'Thời gian nhanh',
    description: 'Từ khi đăng ký đến giải ngân chỉ trong vòng 1-3 phút',
    icon: '/images/icon-fast-time.svg',
    row: 2,
    column: 'left',
    order: 2,
  },
  {
    id: 5,
    title: '100% trực tuyến',
    description: 'Vay mọi lúc mọi nơi, không cần đi xa, không cần gặp mặt',
    icon: '/images/icon-online.svg',
    row: 2,
    column: 'right',
    order: 1,
  },
  {
    id: 6,
    title: 'Hồ sơ đơn giản',
    description: 'Chỉ cần chụp ảnh CCCD và điền một số thông tin cơ bản',
    icon: '/images/icon-document-home.svg',
    row: 2,
    column: 'right',
    order: 2,
  },
  {
    id: 7,
    title: 'Phê duyệt tự động',
    description: 'Phê duyệt tự động dễ dàng nhờ công nghệ fintech hiện đại',
    icon: '/images/icon-auto-approve-home.svg',
    row: 3,
    column: 'left',
  },
  {
    id: 8,
    title: 'Không cần thế chấp',
    description: 'Không tài sản đảm bảo, không giấy tờ phức tạp, không chứng minh thu nhập',
    icon: '/images/icon-no-mortgage.svg',
    row: 3,
    column: 'right',
  },
]
const sectionInfo = {
  subtitle: 'tại sao chọn tin vay?',
  title: 'Vay nhanh hiệu quả',
}

// const services = ref([])
const newsPosts = ref([])
const noticePosts = ref([])
const loading = ref(false)

const {
  data: services,
  pending,
  error
} = await useFetch(
  'http://127.0.0.1:8000/api/admin/service',
  {
    transform: (res) => res.data || res
  }
)

const fetchPosts = async () => {
  try {
    loading.value = true
    const [newsRes, noticeRes] = await Promise.all([
      axios.get('http://127.0.0.1:8000/api/post/category/bai-viet'),
      axios.get('http://127.0.0.1:8000/api/post/category/thong-bao'),
    ])

    newsPosts.value = newsRes.data.data || []
    noticePosts.value = noticeRes.data.data || []
  } catch (error) {
    console.error('Lỗi lấy bài viết:', error)
  } finally{
    loading.value = false
  }
}

const personalLoan = computed(() =>
   (services.value ?? []).find(item => item.slug === 'vay-ca-nhan')
)

const businessLoan = computed(() =>
   (services.value ?? []).find(item => item.slug === 'vay-ho-kinh-doanh')
)

const concernLoan = computed(() => 
   (services.value ?? []).find(item => item.slug === 'vay-doanh-nghiep')
)

const allPartners = computed(() =>
  (services.value ?? []).flatMap(service => service.children ?? [])
)

onMounted(() => {
  // fetchService()
  fetchPosts()
})



</script>

<style scoped>

</style>
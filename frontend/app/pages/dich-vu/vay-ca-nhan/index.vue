<template>
    <ServiceHero :data="bannerData" 
    background-image="/images/banner-service.png" 
    mobile-background-image="/images/banner-service-mobile.png" 
    tablet-background-image="/images/banner-service-tablet.png"
    :button="false"/>
    <HomeWhyChoose :loan-steps="loanSteps" :sectioninfo="sectionInfo" />
    <ServiceLoanOption :service="personalLoan" :loading="loading" />
</template>

<script setup>
const bannerData = {
  subtitle: 'Dịch vụ',
  title: 'Vay cá nhân',
  description:
    'Đối với đối tượng Khách hàng Cá nhân, thương hiệu Tin Vay cung cấp các sản phẩm vay tiêu dùng nhanh chóng, dễ dàng, an toàn, tiện lợi nhằm giúp khách hàng được hỗ trợ tài chính kịp thời, sử dụng tiền vay vào các mục đích như mua sắm, sinh hoạt, du lịch, chi trả hóa đơn, học phí, v.v…'
}

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

const {
  data: service,
  pending: loading,
  error
} = await useApiFetch('/admin/service', {
  transform: (res) => res.data || []
})

const personalLoan = computed(() =>
  service.value.find(item => item.slug === 'vay-ca-nhan')
)

</script>

<style lang="scss" scoped>

</style>
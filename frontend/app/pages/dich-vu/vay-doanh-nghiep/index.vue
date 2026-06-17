<template>
    <ServiceHero :data="bannerData" 
    background-image="/images/banner-service-business-sme.webp" 
    mobile-background-image="/images/banner-service-business-sme-mobile.webp" 
    tablet-background-image="/images/banner-service-business-sme-tablet.webp"
    :button="true"/>
    <ServiceLoanSummary />
    <HomeWhyChoose :loan-steps="loanSteps" :sectioninfo="sectionInfo" />
    <ServiceLoanHero background-image="/images/banner-youtube-service-bussiness.png"/>
    <ServiceLoanOption :service="concernLoan" :loading="loading"/>
    <ServiceLoanSuccess :success-data="successData"/>
</template>

<script setup>
const bannerData = {
  subtitle: 'Dịch vụ tin vay biz',
  title: 'Vay doanh nghiệp',
  description:
    'TIN VAY BIZ là thương hiệu sản phẩm vay tiền dành cho khách hàng Hộ kinh doanh, tiểu thương và Doanh nghiệp vừa và nhỏ. Sản phẩm cung cấp các gói vay vốn linh hoạt, thủ tục đơn giản, giải ngân nhanh chóng nhằm hỗ trợ nguồn vốn kịp thời cho hoạt động kinh doanh. Khách hàng có thể sử dụng khoản vay để nhập hàng, mở rộng cửa hàng, đầu tư thiết bị, xoay vòng vốn hoặc phục vụ các nhu cầu bổ sung, bù đắp vốn lưu động khác.'
}

const sectionInfo = {
  subtitle: 'MỜI BẠN ĐỒNG HÀNH CÙNG TIN VAY BIZ',
  title: 'Người bạn tài chính – Tiếp vốn kinh doanh',
}

const successData = {
  count: '2000',
  title: 'Doanh nghiệp đã vay vốn thành công',
  data: [
    {
        description: 'Tôi bán đồ gia dụng tại cửa hàng có đăng ký và trên sàn thương mại điện tử, mỗi tháng đều nhập số lượng lớn. Lúc cần xoay 50 triệu để gom hàng, TinVay Biz hỗ trợ rất nhanh – không phí ẩn, không thủ tục rườm rà.',
        name: 'Anh Minh 123',
        position: 'Giám đốc công ty thiết bị văn phòng tại Hà Nội',
        image: '/images/customer-7.png',
    },
    {
        description: 'Tôi bán đồ gia dụng tại cửa hàng có đăng ký và trên sàn thương mại điện tử, mỗi tháng đều nhập số lượng lớn. Lúc cần xoay 50 triệu để gom hàng, TinVay Biz hỗ trợ rất nhanh – không phí ẩn, không thủ tục rườm rà.',
        name: 'Anh Minh',
        position: 'Giám đốc công ty thiết bị văn phòng tại Hà Nội',
        image: '/images/customer-7.png',
    },
    {
        description: 'Tôi bán đồ gia dụng tại cửa hàng có đăng ký và trên sàn thương mại điện tử, mỗi tháng đều nhập số lượng lớn. Lúc cần xoay 50 triệu để gom hàng, TinVay Biz hỗ trợ rất nhanh – không phí ẩn, không thủ tục rườm rà.',
        name: 'Anh Minh 222',
        position: 'Giám đốc công ty thiết bị văn phòng tại Hà Nội',
        image: '/images/customer-7.png',
    }
  ]
}


const loanSteps = [
  {
    id: 1,
    title: 'Luôn luôn đồng hành',
    description: 'Tin Vay Biz luôn bên bạn, hỗ trợ 24/7, giải đáp mọi thắc mắc từ lúc tìm hiểu đến khi đăng ký và nhận giải ngân',
    icon: '/images/icon-phone-24h.svg',
    row: 1,
    column: 'left',
  },
  {
    id: 2,
    title: 'Không để bạn chờ',
    description: 'Giải ngân nhanh, đúng lúc bạn cần. 10 phút hồ sơ, giải ngân trong ngày. Vốn đến kịp thời, giữ nhịp làm ăn!',
    icon: '/images/icon-fast-time.svg',
    row: 1,
    column: 'right',
  },
  {
    id: 3,
    title: 'Không làm khó bạn',
    description: 'Không thủ tục phức tạp, không chờ đợi lâu, không thế chấp như khi vay vốn với ngân hàng',
    icon: '/images/icon-no-mortgage.svg',
    row: 2,
    column: 'left',
    order: 1,
  },
  {
    id: 4,
    title: 'Uy tín, tin cậy',
    description: 'VietCredit là công ty tài chính uy tín, chính thống, được cấp phép bởi Ngân hàng Nhà nước Việt Nam',
    icon: '/images/icon-shield-home.svg',
    row: 2,
    column: 'left',
    order: 2,
  },
  {
    id: 5,
    title: 'Chẳng cần đi xa',
    description: 'Thủ tục trực tuyến 100% ngay trên các app quen thuộc như KiotViet, không cần đi xa, vay mọi lúc mọi nơi.',
    icon: '/images/icon-online.svg',
    row: 2,
    column: 'right',
    order: 1,
  },
  {
    id: 6,
    title: 'Cần đủ, không phiền',
    description: 'Chỉ cần CCCD, Giấy phép đăng ký hộ kinh doanh, Hóa đơn chứng từ. Giải ngân trong ngày về tài khoản!',
    icon: '/images/icon-cccd.svg',
    row: 2,
    column: 'right',
    order: 2,
  },
  {
    id: 7,
    title: 'Hợp lý, rõ ràng',
    description: 'Tin Vay Biz có sao, nói vậy! Lãi suất hợp lý, không phí dịch vụ, không phí ẩn, không phí bảo hiểm',
    icon: '/images/icon-wallet.svg',
    row: 3,
    column: 'left',
  },
  {
    id: 8,
    title: 'Đáp ứng linh hoạt',
    description: 'Cần bao nhiêu, đáp ứng bấy nhiêu. Gói vay đa dạng từ 10 đến 500tr. Kỳ hạn linh hoạt từ 2 đến 12 tháng',
    icon: '/images/icon-select-loan.svg',
    row: 3,
    column: 'right',
  },
]

const {
  data: service,
  pending: loading,
  error
} = await useApiFetch('/admin/service', {
  transform: (res) => res.data || []
})

const concernLoan = computed(() =>
  service.value.find(item => item.slug === 'vay-doanh-nghiep')
)

</script>

<style lang="scss" scoped>

</style>
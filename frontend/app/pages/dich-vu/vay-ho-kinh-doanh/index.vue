<template>
    <ServiceHero :data="bannerData" 
                  background-image="/images/banner-service-business.jpg" 
                  mobile-background-image="/images/banner-service-business-mobile.jpg" 
                  tablet-background-image="/images/banner-service-business-tablet.jpg" 
                  :button="true"/>
    <ServiceLoanSummary />
    <HomeWhyChoose :loan-steps="loanSteps" :sectioninfo="sectionInfo" />
    <ServiceLoanHero background-image="/images/banner-youtube-service.png" />
    <ServiceLoanOption :service="businessLoan" :loading="loading"/>
    <ServiceLoanSuccess :success-data="successData"/>
</template>

<script setup>
const bannerData = {
  subtitle: 'Dịch vụ tin vay biz',
  title: 'Vay hộ kinh doanh',
  description:
    'TIN VAY BIZ là thương hiệu sản phẩm vay vốn dành cho khách hàng Hộ kinh doanh, Tiểu thương và Doanh nghiệp vừa và nhỏ. Sản phẩm cung cấp các gói vay vốn linh hoạt, thủ tục đơn giản, giải ngân nhanh chóng nhằm hỗ trợ nguồn vốn kịp thời để mở rộng kinh doanh.'
}

const sectionInfo = {
  subtitle: 'MỜI BẠN ĐỒNG HÀNH CÙNG TIN VAY BIZ',
  title: 'Người bạn tài chính – Tiếp vốn kinh doanh',
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

const successData = {
  count: '5000',
  title: 'Hộ kinh doanh vay vốn thành công',
  data: [
    {
        description: '"Sau hơn 1 năm kinh doanh VPP và phụ kiện, mình nhận ra ngành này luôn cần vốn để nhập hàng, giải quyết tồn kho, nhất là mùa thấp điểm. Tin Vay Biz giúp mình dễ dàng vay vốn với lãi suất hợp lý. Đội ngũ hỗ trợ nhiệt tình giúp mình hoàn tất hồ sơ online và giải ngân chỉ vài phút."',
        name: 'Chị Hường',
        position: 'Chủ cửa hàng VPP và phụ kiện ở Văn Quán, Hà Đông (HN)',
        image: '/images/customer-7.png',
    },
    {
        description: '"Là shop online, tôi cần vốn xoay vòng để nhập hàng và vận hành website. Tin Vay Biz hỗ trợ nhanh, dễ hiểu, giúp tôi hoàn tất hồ sơ online và nhận giải ngân chỉ sau 1 phút, không cần đến tận nơi. Lãi suất hợp lý, quy trình rõ ràng nên tôi rất an tâm khi vay với Tin Vay Biz của VietCredit!"',
        name: 'Anh Triều',
        position: 'Chủ shop mỹ phẩm và thời trang online ở Định Công (HN)',
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

const {
  data: service,
  pending: loading,
  error
} = await useApiFetch('/admin/service', {
  transform: (res) => res.data || []
})

const businessLoan = computed(() =>
  service.value.find(item => item.slug === 'vay-ho-kinh-doanh')
)

</script>

<style lang="scss" scoped>

</style>

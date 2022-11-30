<template>
  <Header/>
  <Banner/>
  <breadcrumb/>
  <p>這是消息內頁</p>




<pre style="text-align:start">
  footer尚未完成:
  ▪ hover效果?
  ▪ 文字顏色ffffff待調整(?
  ▪ 換行文字不居中
  ▪ 手機板背景圖調整
</pre>
  <Footer/>
</template>
<script>
  import Header from "@/components/Header.vue"
  import Banner from "@/components/Banner.vue"
  import breadcrumb from "@/components/breadcrumb.vue"
  import Footer from "@/components/Footer.vue"

  export default {
      name: "NewsView",
      components:{
          Header,
          breadcrumb,
          Footer,
          Banner
      }
  }
</script>
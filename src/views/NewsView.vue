<template>
  <Header/>
  <breadcrumb/>
  <p>Hello</p>

  <Footer/>
</template>
<script>
  import Header from "@/components/Header.vue"
  import breadcrumb from "@/components/breadcrumb.vue"
  import Footer from "@/components/Footer.vue"
  export default {
      name: "NewsView",
      components:{
          Header,
          breadcrumb,
          Footer
      }
  }
</script>
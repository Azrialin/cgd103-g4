<template>
  <Banner :src="require(`@/assets/img/Banner/banner_news.jpg`)"/>
  <breadcrumb :fonts="fonts"/>
  <h1>news TEST</h1>
  <h1>news TEST</h1>
  <h1>news TEST</h1>
  <h1>news TEST</h1>
  <h1>news TEST</h1>
  <h1>news TEST</h1>
  <!-- <NewsDetail/> -->
  <GotoParadise/>
  <router-view/>
</template>

<style scoped lang="scss">

</style>

<script>
  import Header from "@/components/Header.vue"
  import Banner from "@/components/Banner.vue"
  import breadcrumb from "@/components/breadcrumb.vue"
  import NewsDetail from "@/components/news/NewsDetail.vue"
  import Footer from "@/components/Footer.vue"
  import GotoParadise from '@/components/news/GotoParadise.vue'

  export default {
      name: "NewsInfoView",
      props:{
        newsId:''
      },
      components:{
    Header,
    Banner,
    breadcrumb,
    NewsDetail,
    Footer,
    GotoParadise,
    },
    data(){
      return{
        tab:1,
        page:1,
        fonts:[
            { name: '首頁', source: '/' },
            { name: '消息專區', source: 'News' },
            { name: '消息內文', source: 'NewsInfo' },
        ],
      }
    },
    created(){
    
    },
    mounted() {
      
    },
    methods:{

    }
  }
</script>
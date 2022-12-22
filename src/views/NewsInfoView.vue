<template>
  <Banner :src="require(`@/assets/img/Banner/banner_news.jpg`)"/>
  <breadcrumb :fonts="fonts"/>
  <h1>news TEST</h1>
  <NewsDetail

  />
  <!-- :img="news.news_img"
  :img_des="news.news_img_des"
  :title="news.news_title"
  :text_start="news.news_text_start" 
  :text_middle="news.news_text_middle"
  :text_trans="news.news_text_trans"
  :text_end="news.news_text_end" -->
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
        news:[],
      }
    },
    created(){
      // 抓資料
      this.getNews();
      // $route取值 屬性 $route只能取值 $router 可以呼叫方法
      console.log(this.$route.params.id);
      // 宣告單一id (airbnb必須使用解構 ((??)))
      const { id } = this.$route.params;
    },
    mounted() {
      
    },
    methods:{
      // 抓資料
      getNews(){
          fetch('http://localhost/list.php')
          .then(res=>res.json())
          .then(json=>{
              this.news = json;
          })
      },
    }
  }
</script>
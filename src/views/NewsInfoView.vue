<template>
  <Banner :src="require(`@/assets/img/Banner/banner_news.jpg`)"/>
  <breadcrumb :fonts="fonts"/>
  <NewsDetail
  :img="`../img/News/${activeNews.news_img}`"
  :img_des="activeNews.news_img_des"
  :title="activeNews.news_title"
  :text_start="activeNews.news_text_start" 
  :text_middle="activeNews.news_text_middle"
  :text_trans="activeNews.news_text_trans"
  :text_end="activeNews.news_text_end"
  />
  <!-- 打包前途片路徑 --> <!-- :img="`/img/News/${activeNews.news_img}`" -->
  <!-- 打包後圖片路徑(加兩個點) --> <!-- :img="`../img/News/${activeNews.news_img}`" -->

  <GotoParadise/>
  <router-view/>
</template>

<style scoped lang="scss">

</style>

<script>
  import {BASE_URL} from '@/assets/js/common.js'
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
        newsRaw:[],
        news:[],
      }
    },
    computed: {
      activeNews() {
        return this.news.find(v => v.news_no == this.$route.params.id) ?? {}
      },
    },
    created(){
      // 抓資料
      this.getNews();
      // $route取值 屬性 $route只能取值 $router 可以呼叫方法
      // console.log(this.$route.params.id); 
    },
    methods:{
      // 抓資料
      getNews(){
        const id = this.$route.params.id;
        // console.log(id);
          // fetch('http://localhost/cgd103-g4/public/phpfiles/getNews.php') //本地端
          fetch(`${BASE_URL}/getNews.php`)
          .then(res=>res.json())
          .then(json=>{
              // 抓回所有資料
              this.newsRaw = json;

              // 篩"上架"資料放進陣列
              this.news = this.newsRaw.filter(item => {
                return item.news_status === "上架";
              });
          })
      },
    }
  }
</script>
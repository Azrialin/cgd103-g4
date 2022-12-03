<template>
  <Banner :src="require(`@/assets/img/Banner/banner_news.jpg`)"/>
  <breadcrumb :fonts="fonts"/>
  
  <div class="container">
    <figure class="news-article-img">
      <img src="../assets/img/News/4.jpg" alt="">
      <figcaption>#國有文化資產 #傳統文藝</figcaption>
    </figure>
    
    <div class="news-article-txt">
      <h2 class="news-article-title">高千穗-夜神樂</h2>
      <div class="news-article-des">
          <pre>高千穗知名祭典活動-夜神樂 ，將於今年的11月15日開始盛大舉行，喜愛日本慶典活動的你千萬不能錯過。

活動介紹:
每年 11 月中至 2 月初，九州宮崎縣的高千穗地區都會舉行夜神樂，通宵進行舞蹈表演、說書、打鼓等活動，民眾戴着象徵神明的面具登場，慶祝這項擁有 800 年歷史的傳統。

這項表演極具娛樂性，更可一覽日本的歷史起源。

高千穗的夜神樂獲列為日本非物質民俗文化遺產之一。
          </pre>
      </div>
      <div class="news-article-btn">返回按鈕</div>
    </div>
    






  </div>


</template>

<style scoped lang="scss">
.container{
    max-width: 1200px;
    margin: auto;
}

/* 圖片 */
.news-article-img{
  width: 50%;
  margin: auto;
}
.news-article-img img{
  width: 100%;
}

/* 內文 */
.news-article-des pre{
  text-align: start;
}

</style>

<script>
  import Header from "@/components/Header.vue"
  import Banner from "@/components/Banner.vue"
  import breadcrumb from "@/components/breadcrumb.vue"
  import Footer from "@/components/Footer.vue"

  export default {
      name: "NewscontentView",
      components:{
    Header,
    Banner,
    breadcrumb,
    Footer,
    },
    created(){
    
    },
    mounted() {

    },
    data(){
      return{
        tab:1,
        page:1,
        fonts:[
            { name: '首頁', source: '/' },
            { name: '消息專區', source: 'News' },
            { name: '消息內文', source: 'Newscontent' },
        ],
      }
    },
    methods:{

    }




  }
</script>
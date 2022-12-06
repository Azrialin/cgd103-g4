<template>
  <Banner :src="require(`@/assets/img/Banner/banner_news.jpg`)"/>
  <breadcrumb :fonts="fonts"/>
  <span>news TEST</span>
  <div class="container">
    <figure class="news-article-img">
      <img src="../assets/img/News/3.jpg" alt="GOD">
      <figcaption class="font-14"> ▲ 國有文化資產，傳統文藝-夜神樂</figcaption>
    </figure>
    <div class="news-article-txt">
      <h2 class="news-article-title font-24">高千穗-夜神樂</h2>
      <div class="news-article-des">
        <p class="font-16-24em">高千穗知名祭典活動-夜神樂 ，將於今年的11月15日開始盛大舉行，喜愛日本慶典活動的你千萬不能錯過。</p>
        <br>
        <p class="font-16-24em">活動介紹:每年 11 月中至 2 月初，九州宮崎縣的高千穗地區都會舉行夜神樂，通宵進行舞蹈表演、說書、打鼓等活動，民眾戴着象徵神明的面具登場，慶祝這項擁有 800 年歷史的傳統。</p>
        <br>
        <p class="font-16-24em">這項表演極具娛樂性，更可一覽日本的歷史起源。</p>
        <br>
        <p class="font-16-24em">高千穗的夜神樂獲列為日本非物質民俗文化遺產之一。</p>
      </div>
      <div class="news-article-btn">
        <router-link to="/News" class="news-btn-more font-20">返回</router-link>
      </div>
    </div>
  </div>
  <GotoParadise/>
</template>

<style scoped lang="scss">
.container{
    max-width: 1200px;
    margin: auto;
    margin-top: 20px;
}
/* 圖片 */
.news-article-img{
  width: 90%;
  max-width: 900px;
  margin: auto;
}
.news-article-img img{
  width: 100%;
}
/* 圖片敘述 */
.news-article-img figcaption{
  text-align: center;
  color: #888;
}
/* 標題 */
.news-article-title{
  color: #444;
  margin: 50px 0;
  padding-left: 1%;
}
.news-article-title::before{
  content: '0';
  width: 10px;
  color: #BC955C;
  background-color: #BC955C;
  margin-right: 20px;
}

/* 內文 */
.news-article-des{
  margin-bottom: 150px;
}
/* 返回按鈕 */
.news-article-btn a{
  display: inline-block;
  background-color: #BC955C;
  color: #fff;
  padding: 5px 30px;
  border-radius: 5px;
  margin-bottom: 100px;
}

.news-article-btn a:hover{
  background-color: #8c6832;
}
/* @media screen and (max-width:767px){

} 
*/
/* @media screen and (min-width: 768px){

}
 */

/* @media screen and (min-width: 1024px){

} 
*/
</style>

<script>
  import Header from "@/components/Header.vue"
  import Banner from "@/components/Banner.vue"
  import breadcrumb from "@/components/breadcrumb.vue"
  import Footer from "@/components/Footer.vue"
  import GotoParadise from '@/components/news/GotoParadise.vue'

  export default {
      name: "NewscontentView",
      components:{
    Header,
    Banner,
    breadcrumb,
    Footer,
    GotoParadise,
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
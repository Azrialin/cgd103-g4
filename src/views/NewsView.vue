<template>
  <Header/>
  <Banner/>
  <breadcrumb/>
  <div class="container">
    <div class="news-cards">
      <!-- 組件 tab -->
        <div class="news-card">
            <!-- 組件 -->
            <!-- 1 -->
            <NewsCard 
                link="require(`@/assets/img/1.jpg"
                type="活動" 
                date="2022/10/02" 
                title="高千穗-夜神樂" 
                des="高千穗知名祭典活動-夜神樂 ，將於今年的11月..." 
            />
            

            
        </div>
  </div>
  <div class="news-next-page">
      <!-- 組件 -->
  </div>
    <div class="go-up">
        <!-- 組件 -->
    </div>
  </div>




</template>

<style scoped lang="scss">
.container{
  max-width: 1200px;
  margin: auto;
}
</style>

<script>
  import Header from "@/components/Header.vue"
  import Banner from "@/components/Banner.vue"
  import breadcrumb from "@/components/breadcrumb.vue"
  import NewsCard from "@/components/news/NewsCard.vue"
  import Footer from "@/components/Footer.vue"

  export default {
      name: "NewsView",
      components:{
          Header,
          Banner,
          breadcrumb,
          NewsCard,
          Footer
      }
  }
</script>
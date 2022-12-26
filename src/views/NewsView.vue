<template>
  <!---------------------筆記------------------------
  🔹圖的動態寫法怪怪的 靜態資料放public，打包時比較不會發生錯誤、產生亂碼 ，放public路徑不用"require(`@/assets/.../...jpg`)"，直接寫路徑即可 "`/img/News/${detail.news_img}`" 
  🔹動態路由 
  bug
  ▪ 已進入內文後，再點擊header時，路徑變成  http://localhost:8080/newsInfo/news =>header路徑寫法的問題
  ------------------------------------------------------->
  <Banner :src="require(`@/assets/img/Banner/banner_news.jpg`)"/>
  <breadcrumb :fonts="fonts"/>
  <div class="container">
    <div class="news-cards">
      <!--  tab 預設所有公告-->
        <nav class="nav-bar">
          <a class="nav-tab font-18" :class="{'active' : navLink ==='所有公告'}" href="#" @click="navLink='所有公告'">所有公告</a>
          <a class="nav-tab font-18 " :class="{'active' : navLink ==='重要'}" href="#" @click="navLink='重要'">重要</a>
          <a class="nav-tab font-18" :class="{'active' : navLink ==='活動'}" href="#" @click="navLink='活動'">活動</a>
          <a class="nav-tab font-18" :class="{'active' : navLink ==='其他'}" href="#" @click="navLink='其他'">其他</a>
        </nav>
        <div class="news-card">
          <!-- 所有公告顯示 -->
            <div v-if="navLink === '所有公告'">
              <NewsCard
              v-for="detail in news" :key="detail.news_no"
              :link="`/img/News/${detail.news_img}`"
              :type="detail.news_type "
              :date="detail.news_time"
              :title="detail.news_title"
              :des="detail.news_text_start"
              :urlLink="detail.news_no"
              />
              <!-- 假資料時 ，以下可用 ； 抓資料回來不知道為啥 寫活的失敗 ==> public 問題--> 
              <!-- :link="require(`@/assets/img/News/${detail.news_img}`)" -->
            </div>
          <!-- 重要顯示 -->
            <div v-else-if="navLink === '重要'">
              <NewsCard
              v-for="detail in newsImportant" 
              :key="detail.news_no"
              :link="`/img/News/${detail.news_img}`"
              :type="detail.news_type"
              :date="detail.news_time"
              :title="detail.news_title"
              :des="detail.news_text_start"
              :urlLink="detail.news_no"
              />
            </div>
          <!-- 活動顯示 -->
            <div v-else-if="navLink === '活動'">
              <NewsCard
              v-for="detail in newsActive" 
              :key="detail.news_no"
              :link="`/img/News/${detail.news_img}`"
              :type="detail.news_type"
              :date="detail.news_time"
              :title="detail.news_title"
              :des="detail.news_text_start"
              :urlLink="detail.news_no"
              />
            </div>
          <!-- 其他顯示 -->
            <div v-else-if="navLink === '其他'">
              <NewsCard
              v-for="detail in newsOthers" 
              :key="detail.news_no"
              :link="`/img/News/${detail.news_img}`"
              :type="detail.news_type"
              :date="detail.news_time"
              :title="detail.news_title"
              :des="detail.news_text_start"
              :urlLink="detail.news_no"
              />
            </div>
        </div>
  </div>
  <div class="news-next-page">
    <Pagination @change="page=$event" :defaultCurrentPage="page" :defaultPageSize="5" :total="10"/>
      <!-- 組件 -->
  </div>
    <div class="go-up">
        <!-- 組件 -->
        <GotoParadise/>
    </div>
  <router-view/>

  </div>
</template>

<style scoped lang="scss">
.container{
  max-width: 1200px;
  margin: auto;

  /* Tab */
  .tab-news{
    display: flex;
  }
  /* 上下頁 */
.news-next-page{
  margin-bottom: 100px;
}
  
}
</style>

<script>
  import {BASE_URL} from '@/assets/js/common.js'
  import Header from "@/components/Header.vue"
  import Banner from "@/components/Banner.vue"
  import breadcrumb from "@/components/breadcrumb.vue"
  import NewsCard from "@/components/news/NewsCard.vue"
  import Pagination from "@/components/pagination/Pagination.vue"
  import Footer from "@/components/Footer.vue"
  import GotoParadise from "@/components/news/GotoParadise.vue"

  export default {
      name: "NewsView",
      components:{
    Header,
    Banner,
    breadcrumb,
    NewsCard,
    Pagination,
    Footer,
    GotoParadise
    },
    created(){
      this.getNews();  //抓資料
    },
    mounted() {

    },
    data(){
      return{
        tab:1,
        page:1,
        navLink: '所有公告',
        fonts:[
            { name: '首頁', source: '/' },
            { name: '消息專區', source: 'News' }
        ],
        newsRaw:[],
        news:[],
        newsImportant:[],
        newsActive:[],
        newsOthers:[],
      }
    },
    methods:{
      // 取得資料
      getNews(){
          // fetch('http://localhost/cgd103-g4/public/phpfiles/getNews.php') //本地端
          fetch(`${BASE_URL}getNews.php`)
          .then(res=>res.json())
          .then(json=>{
              // 抓回所有資料
              this.newsRaw = json;

              // 篩"上架"資料放進陣列
              this.news = this.newsRaw.filter(item => {
                return item.news_status === "上架";
              });

              // 篩資料放進"重要"陣列
              this.newsImportant = this.news.filter(item => {
                return item.news_type === "重要";
              });
              // 篩資料放進"活動"陣列
              this.newsActive = this.news.filter(item => {
                return item.news_type === "活動";
              });
              // 篩資料放進"其他"陣列
              this.newsOthers = this.news.filter(item => {
                return item.news_type === "其他";
              });
          })
      },
    }
  }
</script>
<style scoped lang="scss">
.nav-bar{
  margin-bottom: 10px;
  border-bottom:#BC955C 1px solid;
}
.nav-tab{
  display: inline-block;
  color: #BC955C;
  padding: 5px 10px;
  margin: 0 10px;
  border: #BC955C 1px solid;
  border-radius: 5px 5px 0 0;
}
.active{
  color: #fff;
  background-color: #BC955C;
}
</style>
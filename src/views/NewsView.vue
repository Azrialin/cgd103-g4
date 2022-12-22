<template>
  <!---------------------尚未完成------------------------
  🔹more按鈕 (動態路由)
  🔹圖的動態寫法怪怪的
  遇到問題:
  ▪ 動態路由應該要記得ID，但是它抓不到，是undefined
    (資料內頁已完成抓回資料)
  ▪ 資料內頁還沒把component對應的內容填進去
  bug
  ▪ 已進入內文後，再點擊header時，路徑變成  http://localhost:8080/newsInfo/news ==>建立動態路由的時候，<router-view/>放置時機(目前應該跟newsInfo放置這個有關係) 
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
              :link="require(`@/assets/img/News/1.jpg`)"
              :type="detail.news_type "
              :date="detail.news_time"
              :title="detail.news_title"
              :des="detail.news_text_start"
              :urlLik="detail.news_no"
              />
              <!-- 假資料時 ，以下可用 ； 抓資料回來不知道為啥 寫活的失敗-->
              <!-- :link="require(`@/assets/img/News/${detail.news_img}`)" -->
            </div>
          <!-- 重要顯示 -->
            <div v-else-if="navLink === '重要'">
              <NewsCard
              v-for="detail in newsImportant" 
              :key="detail.news_no"
              :link="require(`@/assets/img/News/2.jpg`)"
              :type="detail.news_type"
              :date="detail.news_time"
              :title="detail.news_title"
              :des="detail.news_text_start"
              :urlLik="detail.news_no"
              />
            </div>
          <!-- 活動顯示 -->
            <div v-else-if="navLink === '活動'">
              <NewsCard
              v-for="detail in newsActive" 
              :key="detail.news_no"
              :link="require(`@/assets/img/News/3.jpg`)"
              :type="detail.news_type"
              :date="detail.news_time"
              :title="detail.news_title"
              :des="detail.news_text_start"
              :urlLik="detail.news_no"
              />
            </div>
          <!-- 其他顯示 -->
            <div v-else-if="navLink === '其他'">
              <NewsCard
              v-for="detail in newsOthers" 
              :key="detail.news_no"
              :link="require(`@/assets/img/News/4.jpg`)"
              :type="detail.news_type"
              :date="detail.news_time"
              :title="detail.news_title"
              :des="detail.news_text_start"
              :urlLik="detail.news_no"
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
    <!-- 動態路由成功後拔除 -->
    <router-link :to="`/newsInfo/${news.news_no}`" class="font-24">測試進入分頁</router-link>
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
        // 假資料 留著看結構
        // news:[
        //   {
        //     news_no: 1,
        //     news_time: "2022-12-01",
        //     news_last_edit: "2022-12-01",
        //     news_type: "重要",
        //     news_title: "「JS 春季行程方案」報名開始",
        //     news_text_start: "我們已經開始接受 2022 年 11 月至 2022 年 12 月發車的「JS 春季行程方案」",
        //     news_text_middle: "此次行程與活動請見網頁詳細介紹",
        //     news_text_trans: "早鳥訂購優惠4人行響87折優惠。",
        //     news_text_end: "還在猶豫什麼呢?",
        //     news_img: "1.jpg",
        //     news_img_des: "門司港夜景",
        //     news_status: "上架"
        //   },
        //   {
        //     news_no: 2,
        //     news_time: "2022-12-01",
        //     news_last_edit: "2022-12-01",
        //     news_type: "重要",
        //     news_title: "列車停駛",
        //     news_text_start: "因九州地區受台風3號 (台灣名稱 : 桃花颱風)影響，JS列車決定停駛...",
        //     news_text_middle: "目前九州鐵路有多處毀損，鐵路公司正急速修復中。",
        //     news_text_trans: "目前公司決策至12月15日前，鐵路列車停止營運。",
        //     news_text_end: "詳細退票方式，請留意註冊信箱與電話，有專人通知，造成不便，敬請見諒",
        //     news_img: "2.jpg",
        //     news_img_des: "颱風路線圖",
        //     news_status: "上架"
        //   },
        news:[],
        newsImportant:[],
        newsActive:[],
        newsOthers:[],
      }
    },
    methods:{
      // 取得資料
      getNews(){
          fetch('http://localhost/list.php')
          .then(res=>res.json())
          .then(json=>{
              // 抓回所有資料
              this.news = json;
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
<template>
  <!---------------------尚未完成------------------------
  🔹  tab 
    v-if抓的filter
  🔹  more按鈕 (動態路由)
  🔹圖的動態寫法怪怪的

  ------------------------------------------------------->
  <Banner :src="require(`@/assets/img/Banner/banner_news.jpg`)"/>
  <breadcrumb :fonts="fonts"/>
  <div class="container">
    <div class="news-cards">
      <!--  tab 預設所有公告-->
      <!-- 顯示OK之後，把下面p link 刪掉 -->
        <p>{{ navLink }}</p>
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
              />
              <!-- :link="require(`@/assets/img/News/${detail.news_img}`)" -->
            </div>
          <!-- 重要顯示 -->
            <div v-else-if="navLink === '重要'">
              <NewsCard
              v-for="detail in news" 
              :key="detail.news_no"
              :link="require(`@/assets/img/News/2.jpg`)"
              :type="detail.news_type"
              :date="detail.news_time"
              :title="detail.news_title"
              :des="detail.news_text_start"
              />
            </div>
          <!-- 活動顯示 -->
            <div v-else-if="navLink === '活動'">
              <NewsCard
              v-for="detail in news" 
              :key="detail.news_no"
              :link="require(`@/assets/img/News/3.jpg`)"
              :type="detail.news_type === '活動' "
              :date="detail.news_time"
              :title="detail.news_title"
              :des="detail.news_text_start"
              />
            </div>
          <!-- 其他顯示 -->
            <div v-else-if="navLink === '其他'">
              <NewsCard
              v-for="detail in news" 
              :key="detail.news_no"
              :link="require(`@/assets/img/News/4.jpg`)"
              :type="detail.news_type === '其他' "
              :date="detail.news_time"
              :title="detail.news_title"
              :des="detail.news_text_start"
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
    <router-link to="/news/newsInfo" class="font-24">測試進入分頁</router-link>
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
      this.getNews(); 
      
    },
    mounted() {
      // this.transData(); //失敗
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
        // 假資料
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
        //   {
        //     news_no: 3,
        //     news_time: "2022-11-15 ",
        //     news_last_edit: "2022-11-15 ",
        //     news_type: "活動",
        //     news_title: "高千穗-夜神樂",
        //     news_text_start: "高千穗知名祭典活動-夜神樂 ，將於今年的11月15日開始盛大舉行，喜愛日本慶典活動的你千萬不能錯過。",
        //     news_text_middle: "活動介紹:每年 11 月中至 2 月初，九州宮崎縣的高千穗地區都會舉行夜神樂，通宵進行舞蹈表演、說書、打鼓等活動，民眾戴着象徵神明的面具登場，慶祝這項擁有 800 年歷史的傳統。",
        //     news_text_trans: "這項表演極具娛樂性，更可一覽日本的歷史起源。",
        //     news_text_end: "高千穗的夜神樂獲列為日本非物質民俗文化遺產之一。",
        //     news_img: "3.jpg",
        //     news_img_des: "國有文化資產，傳統文藝-高千穗夜神樂",
        //     news_status: "上架"
        //   },
        //   {
        //     news_no: 4,
        //     news_time: "2022-08-01",
        //     news_last_edit: "2022-08-01",
        //     news_type: "其他",
        //     news_title: "新商品上市-油封鬼頭刀",
        //     news_text_start: "受大家喜愛名產-油封鬼頭刀，在JS線上商城上架囉! 線上輕鬆點選...",
        //     news_text_middle: "商品詳情與內容請建商城分頁",
        //     news_text_trans: "活動期間，享有免運優惠",
        //     news_text_end: "趕快來購買吧!",
        //     news_img: "4.jpg",
        //     news_img_des: "商品圖",
        //     news_status: "上架"
        //   },
        //   {
        //     news_no: 5,
        //     news_time: "2022-06-01",
        //     news_last_edit: "2022-06-01",
        //     news_type: "活動",
        //     news_title: "行程車票票根優惠!",
        //     news_text_start: "深夜食堂，天神屋台老闆們的款待...",
        //     news_text_middle: "台灣以夜市響譽國際，但你知道日本的夜市是如何嗎?",
        //     news_text_trans: "屋台在福岡有著知名的特色，近期屋台的老闆們想讓九州屋台知名度更提升，因此推出許多的活動。",
        //     news_text_end: "JS集團響應活動，與老闆們談了優惠的合作，只要拿著行程車票的票根，就能領取屋台老闆們神秘的清冰箱料理。",
        //     news_img: "5.jpg",
        //     news_img_des: "屋台人情味",
        //     news_status: "上架"
        //   },
        //   {
        //     news_no: 6,
        //     news_time: "2022-05-01",
        //     news_last_edit: "2022-05-01",
        //     news_type: "活動",
        //     news_title: "「高千穗峽谷」划船體驗報名優惠",
        //     news_text_start: "被日本政府列入「名勝」、「天然記念物」的高千穗峽谷，知名活動...",
        //     news_text_middle: "徜徉大自然，峽谷一線天的感受，宛如置身電影情節。",
        //     news_text_trans: "徐徐的涼風，清澈的流水，還有對的人。",
        //     news_text_end: "一起來享受這美好的體驗吧。",
        //     news_img: "6.jpg",
        //     news_img_des: "划船體驗",
        //     news_status: "上架"
        //   },
        //   {
        //     news_no: 7,
        //     news_time: "2022-04-01",
        //     news_last_edit: "2022-04-01",
        //     news_type: "其他",
        //     news_title: "商城新品上市-福岡名產 努努雞!!",
        //     news_text_start: "受大家喜愛的博多名產-努努雞，在JS線上商城上架囉! 線上輕鬆點選...",
        //     news_text_middle: "商品詳情與內容請建商城分頁",
        //     news_text_trans: "活動期間，享有免運優惠",
        //     news_text_end: "趕快來購買吧!",
        //     news_img: "7.jpg",
        //     news_img_des: "人氣伴手禮-努努雞",
        //     news_status: "上架"
        //   },
        //   {
        //     news_no: 8,
        //     news_time: "2022-03-01",
        //     news_last_edit: "2022-03-01",
        //     news_type: "其他",
        //     news_title: "行程車票票根優惠!",
        //     news_text_start: "JS旗下集團餐廳\"唐寶寶\"，唐戶河豚饗宴...",
        //     news_text_middle: "唐戶市場為日本河豚最大的產地，而現在也正是季節。",
        //     news_text_trans: "JS邀請您一起來享受吃起來沒什麼味道的河豚。",
        //     news_text_end: "餐廳合作優惠6折起~",
        //     news_img: "8.jpg",
        //     news_img_des: "河豚三味",
        //     news_status: "上架"
        //   },
        //   {
        //     news_no: 9,
        //     news_time: "2022-02-01",
        //     news_last_edit: "2022-02-01",
        //     news_type: "活動",
        //     news_title: "訂購夏季行程，豪斯登堡門票優惠",
        //     news_text_start: "如何以最划算的價格，體驗九州行程?...",
        //     news_text_middle: "即日起訂購夏季行程，活動為期半年。",
        //     news_text_trans: "即可免費兌換豪斯登堡門票乙張。",
        //     news_text_end: "贈送門票有限，儘請從速。",
        //     news_img: "9.jpg",
        //     news_img_des: "2日優惠JS-PASS",
        //     news_status: "上架"
        //   },
        //   {
        //     news_no: 10,
        //     news_time: "2022-01-01",
        //     news_last_edit: "2022-01-01",
        //     news_type: "重要",
        //     news_title: "列車停駛",
        //     news_text_start: "阿蘇火山爆發，九州各地能見度低，塵埃影響...",
        //     news_text_middle: "昨日深夜，九州居民想起了50年前的恐懼。",
        //     news_text_trans: "阿蘇火山噴發，宛如龐貝惡夢。",
        //     news_text_end: "\"老闆叫員工擦玻璃。\r\nJS列車也決定停駛10天。\"",
        //     news_img: "10.jpg",
        //     news_img_des: "阿蘇火山爆發",
        //     news_status: "上架"
        //   }
        // ]
        news:[],
        // newsImportant:[]
      }
    },
    methods:{
      // 取得資料
      getNews(){
          fetch('http://localhost/list.php')
          .then(res=>res.json())
          .then(json=>{
              this.news = json;
          })
      },
      // 想篩資料 失敗
      // transData(){
      //   let newsImportant = this.news.map(this.news.news_type == "重要")
      //   console.log(newsImportant);
      // }
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
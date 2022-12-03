<template>
  <!---------------------尚未完成------------------------
  🔹  列表v-for (資料已建立好，目前註解中)
  🔹  tab (先完成其他大概再回頭)
  🔹  more按鈕 (對應的??進入該內容分頁、內文待產生)
  🔹  上下頁連動 (待理解如何與內容連動)
  🔹  page top可以再增加動畫效果
  ------------------------------------------------------->
  <Banner :src="require(`@/assets/img/Banner/banner_news.jpg`)"/>
  <breadcrumb :fonts="fonts"/>
  <div class="container">
    <div class="news-cards">
      <!--  tab -->
      <!-- <ul class="tab-news ">
        <li>所有公告</li>
        <li>重要公告</li>
        <li>活動公告</li>
        <li>其他公告</li>
      </ul> -->
        <div class="news-card">
            <!-- 待改寫:v-for -->
            <!-- 1 -->
            <NewsCard 
                :link="require(`@/assets/img/News/1.jpg`)"
                type="重要" 
                date="20221201" 
                title="「JS 春季行程方案」報名開始" 
                des="我們已經開始接受 2022 年 11 月至 2022 年 12 月發車的「JS 春季行程方案」..." 
            />
            <!-- 2 -->
            <NewsCard 
                :link="require(`@/assets/img/News/2.jpg`)"
                type="重要" 
                date="20221131" 
                title="列車停駛" 
                des="因九州地區受台風3號 (台灣名稱 : 桃花颱風)影響，JS列車決定停駛..." 
            />
            <!-- 3 -->
            <NewsCard 
                :link="require(`@/assets/img/News/3.jpg`)"
                type="活動" 
                date="20221115" 
                title="高千穗-夜神樂" 
                des="高千穗知名祭典活動-夜神樂 ，將於今年的11月..." 
            />
            <!-- 4 -->
            <NewsCard 
                :link="require(`@/assets/img/News/4.jpg`)"
                type="其他" 
                date="20220801" 
                title="新商品上市-油封鬼頭刀" 
                des="受大家喜愛名產-油封鬼頭刀，在JS線上商城上架囉! 線上輕鬆點選..." 
            />
            <!-- 5 -->
            <NewsCard 
                :link="require(`@/assets/img/News/5.jpg`)"
                type="活動" 
                date="20220601" 
                title="行程車票票根優惠!" 
                des="深夜食堂，天神屋台老闆們的款待..." 
            />
            <!-- 6 -->
            <NewsCard 
                :link="require(`@/assets/img/News/6.jpg`)"
                type="活動" 
                date="20220501" 
                title="「高千穗峽谷」划船體驗報名優惠" 
                des="被日本政府列入「名勝」、「天然記念物」的高千穗峽谷，知名活動..." 
            />
            <!-- 7 -->
            <NewsCard 
                :link="require(`@/assets/img/News/7.jpg`)"
                type="其他" 
                date="20220401" 
                title="商城新品上市-福岡名產 努努雞!!" 
                des="受大家喜愛的博多名產-努努雞，在JS線上商城上架囉! 線上輕鬆點選..." 
            />
            <!-- 8 -->
            <NewsCard 
                :link="require(`@/assets/img/News/8.jpg`)"
                type="其他" 
                date="20220301" 
                title="行程車票票根優惠!" 
                des="JS旗下集團餐廳，唐戶河豚饗宴..." 
            />
            <!-- 9 -->
            <NewsCard 
                :link="require(`@/assets/img/News/9.jpg`)"
                type="活動" 
                date="20220201" 
                title="訂購夏季行程，豪斯登堡門票優惠" 
                des="如何以最划算的價格，體驗九州行程?..." 
            />
            <!-- 10 -->
            <NewsCard 
                :link="require(`@/assets/img/News/10.jpg`)"
                type="重要" 
                date="20220101" 
                title="列車停駛" 
                des="阿蘇火山爆發，九州各地能見度低，塵埃影響..." 
            />
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
    
    },
    mounted() {

    },
    data(){
      return{
        tab:1,
        page:1,
        fonts:[
            { name: '首頁', source: '/' },
            { name: '消息專區', source: 'News' }
        ],
        // news:[
        //   {
        //     date:'20221201',
        //     type:'重要',
        //     title:'「JS 春季行程方案」報名開始',
        //     text:'我們已經開始接受 2022 年 11 月至 2022 年 12 月發車的「JS 春季行程方案」...',
        //     img:'1',
        //   },
        //   {
        //     date:'20221131',
        //     type:'重要',
        //     title:'列車停駛',
        //     text:'因九州地區受台風3號 (台灣名稱 : 桃花颱風)影響，JS列車決定停駛...',
        //     img:'2',
        //   },
        //   {
        //     date:'20221115',
        //     type:'活動',
        //     title:'高千穗-夜神樂',
        //     text:'高千穗知名祭典活動-夜神樂 ，將於今年的11月...',
        //     img:'3',
        //   },
        //   {
        //     date:'20220801',
        //     type:'其他',
        //     title:'新商品上市-油封鬼頭刀',
        //     text:'受大家喜愛名產-油封鬼頭刀，在JS線上商城上架囉! 線上輕鬆點選...',
        //     img:'4',
        //   },
        //   {
        //     date:'20220601',
        //     type:'活動',
        //     title:'行程車票票根優惠!',
        //     text:'深夜食堂，天神屋台老闆們的款待...',
        //     img:'5',
        //   },
        //   {
        //     date:'20220501',
        //     type:'活動',
        //     title:'「高千穗峽谷」划船體驗報名優惠',
        //     text:'被日本政府列入「名勝」、「天然記念物」的高千穗峽谷，知名活動...',
        //     img:'6',
        //   },
        //   {
        //     date:'20220401',
        //     type:'其他',
        //     title:'商城新品上市-福岡名產 努努雞!!',
        //     text:'受大家喜愛的博多名產-努努雞，在JS線上商城上架囉! 線上輕鬆點選...',
        //     img:'7',
        //   },
        //   {
        //     date:'20220301',
        //     type:'其他',
        //     title:'行程車票票根優惠!',
        //     text:'JS旗下集團餐廳，唐戶河豚饗宴...',
        //     img:'8',
        //   },
        //   {
        //     date:'20220201',
        //     type:'活動',
        //     title:'訂購夏季行程，豪斯登堡門票優惠',
        //     text:'如何以最划算的價格，體驗九州行程?...',
        //     img:'9',
        //   },
        //   {
        //     date:'20220101',
        //     type:'重要',
        //     title:'列車停駛',
        //     text:'阿蘇火山爆發，九州各地能見度低，塵埃影響...',
        //     img:'10',
        //   }
        // ]
      }
    },
    methods:{

    }




  }
</script>
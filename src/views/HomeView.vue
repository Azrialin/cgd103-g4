<template>
  <Banner/>
  <div class="Home">
    <div>
      <div class="title">
        <h1>Topic 最新消息</h1>
      </div>
      <ul class="HomeNew-List">
        <li v-for="list in lists" :key="list">
          <div class="HomeNew">
            <div class="TopicsCard">
              <img class="col-5" :src="list.imageurl">
              <div class="HomeNew-Text">
                <p class="HomeNew-Title">{{list.HomeNew_Title}}</p>
                <p class="HomeNew-Subtitle">{{list.HomeNew_Subtitle}}</p>
              </div>
            </div>
          </div>
        </li>
      </ul>
      <div class="MoreButton">
        <button>more</button>
      </div>
      <div class="OtherNews">
        <div class="Covid-19">
          <div class="CovidText">
            <p>【JET SPEED】為了安全騎行</p>
            <button>關於新型冠狀病毒傳染病對策</button>
          </div>
        </div>
        <div class="Js-Official">
          <div class="Js-SocialMedia">
            <p>「JET SPEED」公式instergram</p>
          </div>
        </div>
      </div>
      <div class="HomeArticle">
        <ul>
          <li v-for="article in articles" :key="article">
            <div>
              <img class="col-5" :src="article.imgurl">
              <div class="HomeArticle-Text">
                <p class="HomeArticle-Title">{{article.Title}}</p>
                <p class="HomeArticle-Subtitle">{{article.SubTitle}}</p>
                <div class="MoreButton">more</div>
              </div>
            </div>
          </li>
        </ul>
      </div>
      <div class="HomeTrain">
        <div class="HomeTrain-Title">
          <h1>The cruise train</h1>
          <p> ____列車介紹</p>
        </div>
        <div class="HomeTrain-Pic">
          <img src="../assets/img/Train/461565832_78ffb91acb_b.webp" alt="">
          <img src="../assets/img/Train/461565832_78ffb91acb_b.webp" alt="">
        </div>
        <div class="HomeTrain-Text">
          <p class="HomeTrain-Text-Title">有豐富的品質， <br>只有在火車上才能體驗的特殊空間。 </p>
          <p class="HomeTrain-Text-SubTitle">
            有一個可以精確傳遞的視圖，因為它是一個精緻的一流空間。 
            休息室陳設著來自日本東部各地的代代相傳的手工藝品。 
            您可以在別具一格的吊燈下享用我們廚師烹製的美味佳餚。 
            可以欣賞動感列車窗的觀景車廂。
            以及可以度過高品質的悠閒時光的客房。 
            所有這些都將創造你一生中從未體驗過的全新火車旅程。
          </p>
          <div class="MoreButton">
            <button>more</button>
          </div>
        </div>
      </div>
      <div class="Home-Carousal">
        <div class="Carousal-Title">
          <h1>YOUR JOURNET</h1>
          <p> ____旅遊行程介紹</p>
          <div class="Carousal-Function">
            <img src="../assets/img/Train/5a3246699fac433c9ea856c06dbfee6f.jpg" alt="">
          </div>
          <swiper :modules="[Virtual]" :slides-per-view="3" :space-between="50" virtual>
            <swiper-slide
            v-for="(slideContent, index) in slides"
            :key="index"
            :virtualIndex="index"
            >{{slideContent}}</swiper-slide>
          </swiper>
        </div>
      </div>
    </div>
  </div>
  <router-view></router-view>
</template>

<script>
import Banner from "@/components/Banner.vue"
import { Virtual } from 'swiper';
  import { Swiper, SwiperSlide } from 'swiper/vue';

export default{
  name: "HeaderView",
  components:{
      Banner,Swiper,
      SwiperSlide,
  },
  data(){
    return{
      lists:[
        {
          imageurl:require('@/assets/img/News/1.jpg'),
          HomeNew_Title:'2022/11/06',
          HomeNew_Subtitle:'｢TRAIN SUITE 四季島｣2晚3天課程/冬季額外招聘已經開始。',
        },
        {
          imageurl:require('@/assets/img/News/1.jpg'),
          HomeNew_Title:'2022/11/06',
          HomeNew_Subtitle:'｢TRAIN SUITE 四季島｣2晚3天課程/冬季額外招聘已經開始。',
        },
        {
          imageurl:require('@/assets/img/News/1.jpg'),
          HomeNew_Title:'2022/11/06',
          HomeNew_Subtitle:'｢TRAIN SUITE 四季島｣2晚3天課程/冬季額外招聘已經開始。',
        },
        {
          imageurl:require('@/assets/img/News/1.jpg'),
          HomeNew_Title:'2022/11/06',
          HomeNew_Subtitle:'｢TRAIN SUITE 四季島｣2晚3天課程/冬季額外招聘已經開始。',
        }
      ],
    }
  },methods:{
  getdata(){
    fetch(process.env.VUE_APP_WEATHERAPI)
    .then(function(response){
      return response.json();
    })
    .then(function(myJson){
    console.log(myJson);
    });
  }
  },mounted(){
    this.getdata();
  },setup() {
      // Create array with 1000 slides
      const slides = Array.from({ length: 1000 }).map(
        (el, index) => `Slide ${index + 1}`
      );
      return {
        slides,
        Virtual,
      };
    },
}
</script>

<style scoped lang="scss">
@import "../assets/scss/layout/grid.scss";
@import "../assets/scss/base/font.scss";
  img{
    width: 100%;
  }
  .title{
    margin: 20px auto;
    h1{
      @include font(18px);
    }
  }
  li{
    margin-bottom: 30px;
  }
  .HomeNew{
    .TopicsCard{
      display: flex;
      gap: 10px;
      .HomeNew-Text{
        text-align: start;
        @include font(12px);
        font-weight: 500;
      }
    }
  }
  .MoreButton{
    width: 100%;
    text-align: right;
    button{
      @include font(14px);
      background-color:transparent;
      border: 0;
      border-bottom: 1px solid #BC955C;
      text-align: right;
    }
  }
  .OtherNews{
    margin: 30px auto;
    .Covid-19{
      //font-size: nth($font-size,7)+px;
      border: 1px solid #bc955c;
      text-align: start;
      background-color: #EBDFCE;
      .CovidText{
        margin: 10px 20px;
        @include font(14px);
        button{
          @include font(14px);
          width: 100%;
          margin: 10px auto;
          padding: 10px;
          font-weight: 500;
          text-align: center;
          background-color: #D7BF9D;
          border: none;
        }
      }
    }
    .Js-Official{
      .Js-SocialMedia{
        margin: 30px auto;
        border: 1px solid #bc955c;
        p{
          @include font(14px);
          margin: 20px;
          text-align: start;
        }
      }
    }
  }
  .HomeTrain{
    .HomeTrain-Title{
      margin: 10px auto 30px;
      h1{
        width: 75%;
        @include font(36px);
      }
      p{
        @include font(20px)
      }
    }
    .HomeTrain-Pic{
      @include font(18px);
    }
    .HomeTrain-Text{
      margin-bottom: 30px;
      @include font(14px);
      font-weight: 500;
      p{
        margin: 20px auto;
      }
    }
  }
  .Home-Carousal{
    .Carousal-Title{

    }
    .Carousal-Function{

    }
  }
</style>


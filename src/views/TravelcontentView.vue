<template>
  <Banner :src="require(`@/assets/img/Banner/banner_travel.jpg`)"/>
  <breadcrumb :fonts="fonts"/>
  <div class="about">
    <div id="circle" :style="{top:y+'px',left:x+'px'}">
      <div class="left"><i class="fa-solid fa-angle-up"></i></div>
      <div class="right"><i class="fa-solid fa-angle-up"></i></div>
    </div>
    <div class="container_tra">
      <div class="content_tra">
        <div class="backc backct">
          <router-link to="/travelcheck">
            <div class="trcheck">預約行程</div>
          </router-link>
        </div>
        <div class="contentmain">
          <h3>★ 3世界遺產＋3日本名勝</h3>
          <p>『銀燭秋光冷畫屏，輕羅小扇撲流螢。天階夜色涼如水，臥看牽牛織女星。』秋天代表豐收的喜悅，橘紅色柿子高掛樹頭。旅遊！是輕鬆的、是寫意的，以一壺清酒邀明月共舞，何等愜意逍遙遊！</p>
          <p>1. 紅葉名所：<span>秋高氣爽最適合出遊的季節，每當秋季來臨，染上一整片楓紅美不勝收。</span></p>
          <p>2. 世界遺產：<span>廣島縣「嚴島神社」＋廣島縣「原爆ドーム」＋山口縣「萩市」（萩有5處史蹟被登錄「日本明治產業革命遺產」）。</span></p>
          <p>3. 日本三景＋日本三塔＋日本三橋：</p>
          <p><span>日本三景：廣島「宮島」、宮城「松島」、京都「天橋立」</span><span>日本三塔：山口「琉璃光寺」、京都「醍醐寺」、奈良「法隆寺」。</span><span>日本三橋：山口「錦帶橋」、東京「日本橋」、長崎「眼鏡橋」。</span>
          </p>
        </div>

        <div class="contentmain">
          <h3>★ 湯泉「沁」美宿</h3>
          <p>松政 優碧蘆：<span>前身為昭和4年澡堂老舖，俳人種田山頭火曾造訪「千人湯」；平成9年改建為溫泉旅館，引以為豪100%源泉露天風呂，沉浸湯田溫泉「白狐之湯」傳說。</span></p>
          <p>油谷灣 楊貴館：<span>「春寒賜浴華清池，溫泉水滑洗凝脂。」位於可俯瞰日本海的油谷灣上，擁有著「美人の湯」美稱的溫泉，伴著絕色夕陽美景療癒您的身心。</span></p>
     
        </div>
        <div class="contentmain">
          <h3>★ 醍醐味！珍饈美饌</h3>
          <p>1. 日本料理真諦：<span>返璞歸真追尋食材「原味」，依據四季不同佐山海幸時鮮，展現季節更替的和韻之美；「料理」帶給人們幸福，透過味蕾…終於明白，越是簡單越不平凡呀！</span></p>
          <p>2. 溫泉旅館會席：<span>聽著風吹過山川草木聲音，看著窗外春櫻、夏綠、楓紅、雪舞；「款待的心」結合「和韻之美」，今晚，代表溫泉旅館的會席晚宴，就從第一品料理開始上演，邀請您親自細細品宴。</span></p>
          <p>3. 主廚創作套餐：<span>傳統與現代的光影流動，藝術與美感的交織融合；從主廚的創意與巧思中，從一皿皿餐盤方寸之間，「五感食藝」不再只是名詞，發現優雅卻帶點自傲的…料理職人心中「堅持」。</span></p>
        </div>
        <h2>行程介紹</h2>
        <!-- <Carousel class="bannerfa">
          <CarouselItem class="banner" v-for="img in imgs" :key="img" v-model="value">
            <div class="demo-carousel" v-for="(sub,index) in img.pic" :key="sub">
              <p class="wch">行程{{index+1}}</p>
              <img :src="sub" alt="">
            </div>
          </CarouselItem>
        </Carousel> -->
        <swiper class="bannerfa" :pagination="{'clickable': true}" :modules="modules" :navigation="{nextEl,prevEl}" :slides-per-view="2" @swiper="onSwiper" @slideChange="onSlideChange" @mousemove="move" @mouseleave="leave">
          <swiper-slide class="banner" v-for="(img,index) in imgs" :key="img">
            <p>行程{{index+1}}</p>
            <img :src="img" alt="">
          </swiper-slide>
        </swiper>
        <h2>推薦特產</h2>
        <div class="goodeat">
          <ul id="eatgroup" class="eatgroup">
            <li class="eatlist" v-for="eat in eats" :key="eat">
              <img :src="eat['src']" alt="">
              <p>{{eat['alt']}}</p>
            </li>
          </ul>
        </div>
        <div class="backc">
          <router-link to="/travel">
            <div class="back">返回</div>
          </router-link>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
    import Header from "@/components/Header.vue"
    import Banner from "@/components/Banner.vue"
    import breadcrumb from "@/components/breadcrumb.vue"
    import { Swiper, SwiperSlide } from 'swiper/vue';
    import { Pagination,Navigation } from 'swiper';
    import 'swiper/css';
    import 'swiper/css/navigation';
    import 'swiper/css/pagination';
    import mouse from "@/composable/mouse.js"
    export default {
        name: "HeaderView",
        components:{
          Swiper,
          SwiperSlide,
          Header,
          Banner,
          breadcrumb,
        },
        data() {
          return{
            imgs:[require(`@/assets/img/products/pro1.jpg`),require(`@/assets/img/products/pro2.jpg`),require(`@/assets/img/products/pro3.jpg`),require(`@/assets/img/products/pro4.jpg`),require(`@/assets/img/products/pro5.jpg`)],
            eats:[{alt:"火車餅乾",src:require(`@/assets/img/products/pro8.jpg`)},{alt:"鐵道醬油",src:require(`@/assets/img/products/pro9.jpg`)},{alt:"長途鐵盒",src:require(`@/assets/img/products/pro10.jpg`)}],
            fonts:[{name:'首頁',source:'/'},{name:'行程方案',source:'travel'},{name:'行程詳情',source:'travelcontent'}],  // source各位自己輸入對應的router路徑^^
            modules: [Pagination,Navigation],
            x:0,
            y:0,
          }
        },
        navigation: {
          nextEl: ".swiper-button-next", // 上一頁按鈕物件
          prevEl: ".swiper-button-prev", // 下一頁按鈕物件
        },
        methods: {
          move(e){
            let circle = document.getElementById("circle");
            this.x = e.pageX;
            this.y = e.pageY;
            circle.style.opacity = 1;
          },
          leave(e){
            let circle = document.getElementById("circle");
            this.x = e.pageX;
            this.y = e.pageY;
            circle.style.opacity = 0;
          }
        },
    }
</script>
<style lang="scss" scoped>
@import "../assets/scss/base/font.scss";
@import "../assets/scss/base/color.scss";
@import "../assets/scss/components/btn.scss";
// *{
//   outline: solid 1px;
// }
  #circle{
    position: absolute;
    width: 100px;
    height: 100px;
    border-radius: 100%;
    background-color: rgba(#fff,0.7);
    border: solid 1px rgba(#000,0.3);
    z-index: 999;
    pointer-events: none;
    transition: opacity 0.3s;
    transform: translate(-50%,-50%);
    opacity: 0;
    display: flex;
    justify-content: space-evenly;
    .left{
      transform: rotate(90deg);
    }
    .right{
      transform: rotate(-90deg);
    }
  }
  .container_tra{
    width: 100%;
    background-color: #fff;
    .content_tra{
      width: 100%;
      max-width: 1200px;
      margin: auto;
      h2{
        @include font(26px);
        text-align: center;
        padding: 40px 0px;
      }
      .swiper{
        --swiper-theme-color: #D7BF9D;
        --swiper-navigation-color: #D7BF9D;
        --swiper-navigation-size: 40px;
        --swiper-navigation-border-radius:100%;
      }
      .backc.backct{
        position: sticky;
        top: 70px;
        z-index: 99;
        justify-content: flex-end;
        padding: 0;
        .trcheck {
          @include font(20px);
          cursor: pointer;
          text-align: center;
          background-color: $front_color_main;
          color: #fff;
          padding: 15px 30px;
          border: solid 1px $clr_gold_L1;
          border-radius: 10px;
          box-sizing: border-box;
          margin: 0px auto;
          transition: 0.3s;
          &:hover{
            background-color: #fff;
            color: $front_color_main;
            box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.05);
          }
        }
      }
      h3{
        @include font(22px);
        padding: 15px 0px;
      }
      p{
        @include font(14px);
      }

      .bannerfa{
        cursor: pointer;
        padding-right: 0px;
        margin-bottom: 40px;
        .swiper-button-next,.swiper-button-prev{
          color: #fff;
          background-color: rgba(#000,0.5);
          padding: 10px;
        }
        .banner{
          box-sizing: border-box;
          border-radius: 10px;
          padding: 10px;
          p{
            padding: 10px;
          }
          img{
            border-radius: 10px;
            width: 100%;
            box-shadow: 0px 3px 7px rgba(#444,0.3);
          }
        }
      }
      .goodeat{
        width: 100%;
        .eatgroup{
          display: flex;
          flex-direction: column;
          .eatlist{
            width: 100%;
            padding: 10px;
            img{
              cursor: pointer;
              width: 100%;
              border-radius: 10px;
              box-shadow: 0px 3px 7px rgba(#444,0.3);
            }
            p{
              text-align: center;
              padding: 5px 0px;
            }
          }
        }
      }
      .backc{
        display: flex;
        justify-content: center;
        padding: 40px 0px;
        a{
          text-decoration: none;
        }
        .back{
          @include font(20px);
          cursor: pointer;
          text-align: center;
          background-color: $clr_gray_L5;
          color: $clr_gold_L1;
          padding: 15px 30px;
          border: solid 1px $clr_gold_L1;
          border-radius: 10px;
          box-sizing: border-box;
          margin: 0px auto;
        }
      }
    }
  }
  @media screen and (min-width: 1024px){
    .container_tra{
      .content_tra{
        .contentmain{
          padding: 15px;
        }
        .bannerfa{
          padding-right: 150px;
          .banner{
            img{
              width: 100%;
            }
          }
        }
        h2{
          @include font(28px);
          text-align: center;
        }
        h3{
          @include font(28px);
        }
        p{
          @include font(16px);
        }
        .goodeat{
          width: 100%;
          .eatgroup{
            flex-direction: row;
            .eatlist{
              width: 33.333333%;
              padding: 10px;
              img{
                width: 100%;
                border-radius: 10px;
              }
              p{
                text-align: center;
              }
            }
          }
        }
      }
    }
  }
</style>
<template>
  <Banner/>
  <breadcrumb :fonts="fonts"/>
  <div class="about">
    <!-- <div id="sidehead"></div> -->
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
        <swiper class="bannerfa" :slides-per-view="2" :pagination="{ clickable: true }" @swiper="onSwiper" @slideChange="onSlideChange">
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
    import { Pagination } from 'swiper';
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
        setup() {
          const onSwiper = (swiper) => {
            console.log(swiper);
          };
          const onSlideChange = () => {
            console.log('slide change');
          };
          const isshock = true;

          return{
            imgs:[require(`@/assets/img/products/pro.jpg`),require(`@/assets/img/products/pro.jpg`),require(`@/assets/img/products/pro.jpg`),require(`@/assets/img/products/pro.jpg`),require(`@/assets/img/products/pro.jpg`)],
            eats:[{alt:"超好吃食物",src:"https://picsum.photos/300/200/?random=10"},{alt:"超好吃食物",src:"https://picsum.photos/300/200/?random=10"},{alt:"超好吃食物",src:"https://picsum.photos/300/200/?random=10"}],
            fonts:[{name:'首頁',source:'/'},{name:'行程方案',source:'travel'},{name:'行程詳情',source:'travelcontent'}],  // source各位自己輸入對應的router路徑^^
            onSwiper,
            onSlideChange,
            modules: Pagination,
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
  // #sidehead{
  //   position: absolute;
  //   width: 100px;
  //   height: 100px;
  //   background-color: #f0a;
  // }
  .container_tra{
    width: 100%;
    background-color: #fff;
    .content_tra{
      width: 100%;
      max-width: 1200px;
      margin: auto;
      h2{
        @include font(32px);
        text-align: center;
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
          color: $color_e6;
          padding: 15px 30px;
          border: solid 1px $clr_gold_L1;
          border-radius: 10px;
          box-sizing: border-box;
          margin: 0px auto;
          transition: 0.3s;
          &:hover{
            background-color: $front_color_hover;
            color: $color_444;
            box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.05);
          }
        }
      }
      h3{
        @include font(28px);
      }
      p{
        @include font(16px);
      }
      .bannerfa{
        cursor: pointer;
        .banner{
          border-radius: 10px;
          padding: 10px;
          img{
            border-radius: 10px;
            width: 100%;
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
              width: 100%;
              border-radius: 10px;
            }
            p{
              text-align: center;
            }
          }
        }
      }
      .backc{
        display: flex;
        justify-content: center;
        padding: 40px 0px;
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
          h3{
            padding: 15px 0px;
          }
          p{
            padding: 5px 0px;
          }
        }
        h2{
          padding: 40px 0px;
        }
        .bannerfa{
          margin-bottom: 40px;
          padding-right: 150px;
          .banner{
            border-radius: 10px;
            padding: 10px;
            img{
              width: 100%;
            }
          }
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
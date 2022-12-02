<template>
  <Banner/>
  <breadcrumb :fonts="fonts"/>
  <div class="about">
    <div class="container_tra">
      <div class="content_tra">
        
        <h2>行程介紹</h2>
        <swiper class="bannerfa" :slides-per-view="3" @swiper="onSwiper" @slideChange="onSlideChange">
          <div class="swiper-button-next"></div>
          <swiper-slide class="banner" v-for="(img,index) in imgs" :key="img">
            <p>行程{{index+1}}</p>
            <img :src="img" alt="">
          </swiper-slide>
        </swiper>
        <h2>推薦特產</h2>
        <div class="goodeat">
          <ul class="eatgroup">
            <li class="eatlist" v-for="eat in eats" :key="eat">
              <img :src="eat['src']" alt="">
              <p>{{eat['alt']}}</p>
            </li>
          </ul>
        </div>
        <div class="back"><router-link to="/travel">返回</router-link></div>
      </div>
    </div>
  </div>
</template>
<script>
    import Header from "@/components/Header.vue"
    import Banner from "@/components/Banner.vue"
    import breadcrumb from "@/components/breadcrumb.vue"
    import { Swiper, SwiperSlide } from 'swiper/vue';
    import 'swiper/css';
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
          return{
            imgs:[require(`@/assets/img/products/pro.jpg`),require(`@/assets/img/products/pro.jpg`),require(`@/assets/img/products/pro.jpg`),require(`@/assets/img/products/pro.jpg`),require(`@/assets/img/products/pro.jpg`)],
            eats:[{alt:"超好吃食物",src:"https://picsum.photos/300/200/?random=10"},{alt:"超好吃食物",src:"https://picsum.photos/300/200/?random=10"},{alt:"超好吃食物",src:"https://picsum.photos/300/200/?random=10"}],
            fonts:[{name:'首頁',source:'/'},{name:'行程方案',source:'travel'},{name:'行程詳情',source:'travelcontent'},{name:'預約行程',source:'travelcheck'}],  // source各位自己輸入對應的router路徑^^
            navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev"
            }
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
      .back{
          @include font(20px);
          cursor: pointer;
          text-align: center;
          background-color: $clr_gray_L5;
          color: $clr_gold_L1;
          padding: 15px;
          width: 142px;
          border: solid 1px $clr_gold_L1;
          border-radius: 10px;
          box-sizing: border-box;
          margin: 0px auto;
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
        .back{
          @include font(20px);
          cursor: pointer;
          text-align: center;
          background-color: $clr_gray_L5;
          color: $clr_gold_L1;
          padding: 15px;
          width: 142px;
          border: solid 1px $clr_gold_L1;
          border-radius: 10px;
          box-sizing: border-box;
          margin: 0px auto;
        }
      }
    }
  }
</style>
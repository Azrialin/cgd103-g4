<template>
  <Banner :src="require(`@/assets/img/Banner/banner_travel.jpg`)"/>
  <breadcrumb :fonts="fonts"/>
  <transition name="bang">
    <div class="bbix" v-show="open" @click.self="dbcheck">
      <div class="choosearea">
        <select class="choose" v-model="choose">
          <option v-if="!bad" value="" disabled>-選擇日期-</option>
          <option v-if="bad" value="" disabled>-暫無行程-</option>
          <option :value="[option.departure_date,option.group_id]" v-for="option in options" :key="option">{{option.departure_date}}</option>
          <!-- <option value="2023/03/10">2023/03/10</option>
          <option value="2023/03/11">2023/03/11</option>
          <option value="2023/03/12">2023/03/12</option>
          <option value="2023/03/13">2023/03/13</option> -->
        </select>
      </div>
    </div>
  </transition>
  <div class="about">
    <div id="circle" :style="{top:y+'px',left:x+'px'}">
      <div class="left"><i class="fa-solid fa-angle-up"></i></div>
      <div class="right"><i class="fa-solid fa-angle-up"></i></div>
    </div>
    <div class="container_tra">
      <div class="content_tra">
        <div class="backc backct">

          <!-- <router-link :to="`/travelcheck?date=${choose}`"> -->
            <div class="trcheck" @click="open=!open">預約行程</div>
          <!-- </router-link> -->

        </div>

        <div class="contentmain">
          <h3>{{word['head']}}</h3>
          <p>{{word['inner']}}
          </p>
        </div>

        <h2>行程介紹</h2>
        <swiper class="bannerfa" :pagination="{'clickable': true}" :modules="modules" :navigation="{nextEl,prevEl}" :slides-per-view="xyz" @swiper="onSwiper" @slideChange="onSlideChange" @mousemove="move" @mouseleave="leave">
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
    import {BASE_URL} from '@/assets/js/common.js'
    import Header from "@/components/Header.vue"
    import Banner from "@/components/Banner.vue"
    import breadcrumb from "@/components/breadcrumb.vue"
    import { Swiper, SwiperSlide } from 'swiper/vue';
    import { Pagination,Navigation } from 'swiper';
    import 'swiper/css';
    import 'swiper/css/navigation';
    import 'swiper/css/pagination';
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
          bad:false,
          dat:[],
          word: {            
            // head:"★ 3世界遺產＋3日本名勝",
            head: JSON.parse(localStorage.getItem('Title')).theTitle,
            inner: JSON.parse(localStorage.getItem('Title')).theArticle
          },
          xyz:3,
          open: false,
          imgs:[require(`@/assets/img/products/pro1.jpg`),require(`@/assets/img/products/pro2.jpg`),require(`@/assets/img/products/pro3.jpg`),require(`@/assets/img/products/pro4.jpg`),require(`@/assets/img/products/pro5.jpg`)],
          eats:[{alt:"火車餅乾",src:require(`@/assets/img/products/pro8.jpg`)},{alt:"鐵道醬油",src:require(`@/assets/img/products/pro9.jpg`)},{alt:"長途鐵盒",src:require(`@/assets/img/products/pro10.jpg`)}],
          fonts:[{name:'首頁',source:'/'},{name:'行程方案',source:'travel'},{name:'行程詳情',source:'travelcontent'}],  // source各位自己輸入對應的router路徑^^
          options:[
            // "2023 / 03 / 04","2023 / 03 / 13","2023 / 03 / 24","2023 / 03 / 30","2023 / 04 / 07","2023 / 04 / 12","2023 / 04 / 20"
            ],
          modules: [Pagination,Navigation],
          x:0,
          y:0,
          choose:'',
          gg:"",
        }
      },
    
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      methods: {
        move(e){
          let windowidth = window.innerWidth;
          let circle = document.getElementById("circle");
          if(windowidth > 1024){
            this.x = e.pageX;
            this.y = e.pageY;
            circle.style.opacity = 1;
          }
        },
        leave(e){
          let windowidth = window.innerWidth;
          let circle = document.getElementById("circle");
          if(windowidth < 1024){
            this.x = e.pageX;
            this.y = e.pageY;
            circle.style.opacity = 0;
          }else{
            this.x = e.pageX;
            this.y = e.pageY;
            circle.style.opacity = 0; 
          }
        },
        dbcheck(){
          if(this.open == true){
            this.open = false;
            return this.open;
          }
        },
        getdate(){
          // const datURL = new URL('http://localhost/cgd103-g4/public/phpfiles/getTravelcontentdate.php');
          // fetch(datURL).then((res)=>res.json()).then((json)=>{
          fetch(`${BASE_URL}/getTravelcontentdate.php`).then((res)=>res.json()).then((json)=>{
            this.dat = json;
            this.options = this.dat.filter(item=>{
              return item.package_no == JSON.parse(localStorage.getItem('Title')).theNo;
            });
            if(this.options.length <=0 ){
              this.bad = true;
            }else{
              this.bad = false;
            }
          });
        },
      },
      watch:{
        choose(nVal) {
          this.$router.push(`/travelcheck?date=${nVal}${this.gg}`)
        },
      },
      created() {
        this.getdate();
        let windowidth = window.innerWidth;
        if(windowidth < 1024){
          this.xyz = 1;
        }else{
          this.xyz = 3;
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
.good{
  display: block;
}
.close{
  display: none;
}
.bang-leave-active,.bang-enter-active{
  transition: 0.5s;
}
.bang-enter-from,.bang-leave-to{
  opacity: 0;
}
.bang-enter-to,.bang-leave-from{
  opacity: 1;
}
.bbix{
  z-index: 998;
  position: fixed;
  left: 0;
  top: 0;
  width: 100vw;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: rgba(#000,0.5);
  .choosearea{
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0px 5px 20px 2px rgba(#000,0.3);
    width: 50%;
    padding: 40px 50px;
    .choose{
      @include font(16px);
      color: $color_444;
      text-align: center;
      height: 60px;
      width: 100%;
      border-radius: 5px;
      option{
        color: $color_444;
      }
    }
  }
}
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
          transition: 0.3s;
          &:hover{
            background-color: #fff;
            color: $front_color_main;
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
  .bbix{
    .choosearea{
      width: 30%;
      padding: 50px;
      .choose{
        @include font(18px);
        text-align: center;
      }
    }
  }
    .container_tra{
      .content_tra{
        .contentmain{
          padding: 15px;
        }
        .bannerfa{
          // padding-right: 150px;
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
          @include font(20px);
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
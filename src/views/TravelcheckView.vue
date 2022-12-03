<template>
  <Banner :src="require(`@/assets/img/Banner/banner_travel.jpg`)"/>
  <breadcrumb :fonts="fonts"/>
  <div class="container_form">
    <h2>行程預約</h2>
    <div class="content_form">
      <div class="title_name">
        <h4>2023/01/01</h4>
        <h3>山口圓舞曲，三世界遺產</h3>
        <h4>行程代號:JTR05221122A</h4>
        <h4>費用:100000/人</h4>
      </div>
      <div class="main_chu">
        <div class="main_human">
          <h3>主要聯絡人</h3>
          <div class="person">
            <p>聯絡人*</p>
            <input class="inputcompo"/>
          </div>
          <div class="phone">
            <p>聯絡電話*</p>
            <input class="inputcompo"/>
          </div>
          <div class="email">
            <p>E-Mail</p>
            <input class="inputcompo"/>
          </div>
          <div class="say">
            <p>備註</p>
            <input class="inputcompo"/>
          </div>
        </div>
        <div class="main_come">
          <h3>旅客資料</h3>
          <div class="country">
            <p>國籍*</p>
            <input class="inputcompo"/>
          </div>
          <div class="many">
            <p>旅行人數*</p>
            <input class="inputcompo"/>
          </div>
          <div class="card">
            <p>信用卡號碼*</p>
            <input class="inputcompo"/>
          </div>
        </div>
      </div>
      <div class="main_online">
        <h3>線上預約須知</h3>
        <div class="okay">
          <input type="checkbox">同意我們的<a href="">使用條款</a>和<a href="">隱私政策</a>
        </div>
        <div class="checksub">
          <a href=""><p>確認送出</p></a>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
    import Header from "@/components/Header.vue"
    import Banner from "@/components/Banner.vue"
    import breadcrumb from "@/components/breadcrumb.vue"
<<<<<<< HEAD
    import input from "@/components/Input.vue"
=======
    import { Swiper, SwiperSlide } from 'swiper/vue'
    import 'swiper/css';
>>>>>>> Fishray
    export default {
      name: "HeaderView",
      components:{
        input,
        Header,
        Banner,
        breadcrumb,
      },
      data(){
        return{
          fonts:[{name:'首頁',source:'/'},{name:'行程方案',source:'travel'},{name:'行程詳情',source:'travelcontent'},{name:'預約行程',source:'travelcheck'}],
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
.container_form{
  // background-color: #f0a;
  box-sizing: border-box;
  padding: 10px 10px 100px 10px ;
  width: 100%;
  h2{
    @include font(32px);
    text-align: center;
    padding: 40px;
  }
  .content_form{
    box-sizing: border-box;
    width: 100%;
    background-color: #f8f8f8;
    padding: 20px 20px;
    border-radius: 10px;
    border: 1px solid $clr_gold_L2;
    .title_name{
      border-bottom: solid 1px $front_color_main;
      padding: 0px 20px 20px 20px;
      h3{
        @include font(32px);
        text-align: center;
        padding: 10px;
      }
      h4{
        @include font(16px);
        text-align: center;
        padding: 10px;
      }
    }
    .main_chu{
      .main_human{
        padding: 20px 20px 50px 20px;
        .inputcompo{  
          box-sizing: border-box;
          width: 100%;
          padding: 20px 10px;
          border: solid 1px $front_color_main;
          border-radius: 10px;
          font-size: 24px;
        }
        p{
          @include font(16px);
          padding: 20px 0px;
        }
        h3{
          @include font(24px);
          padding: 20px 0px;
        }
        
        
      }
      .main_come{
        padding: 20px 20px 50px 20px;
        .inputcompo{  
          box-sizing: border-box;
          width: 100%;
          padding: 20px 10px;
          border: solid 1px $front_color_main;
          border-radius: 10px;
          font-size: 24px;
        }
        p{
          @include font(16px);
          padding: 20px 0px;
        }
        h3{
          @include font(24px);
          padding: 20px 0px;
        }
        
        
      }
    }
    .main_online{
      padding: 0px 20px;
      border-top: 1px solid $front_color_main;
      // margin-top: 30px;
      .inputcompo{  
        box-sizing: border-box;
        width: 100%;
        padding: 20px 10px;
        border: solid 1px $front_color_main;
        border-radius: 10px;
        font-size: 24px;
      }
      h3{
        @include font(24px);
        padding-top: 40px;
      }
      .okay{
        @include font(16px);
        padding: 40px;
        text-align: center;
        a{
          text-decoration: none;
          color: $front_color_main
        }
      }
      .checksub{
        @include font(16px);
        display: flex;
        justify-content: center;
        a{
          text-decoration: none;
          background-color: #fff;
          padding: 15px;
          border-radius: 10px;
          border: solid 1px $front_color_main;
          color: $front_color_main;
        }
      }
    }
  }
}
@media screen and (min-width: 1024px){
  .main_chu{
    display: flex;
    .main_human{
      padding: 20px 20px 50px 20px;
      width: 50%;
    }
    .main_come{
      border-left: 1px solid $front_color_main;
      padding: 20px 20px 50px 20px;
      width: 50%;
    }
  }
}
</style>
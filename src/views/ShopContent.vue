<template>
  <div class="pro-content">
    <breadcrumb :fonts="fonts" />
    <div class="pro-main">
      <div class="pro-pic">
        <img :src="`../img/products/${product.prod_pic_intro_0}`" />
      </div>
      <div class="pro-txt">
        <h2 class="pro-txt-title">{{ product.prod_name }}</h2>
        <div class="pro-price">
          販售價格:
          <span class="pro-price-num">${{ product.prod_price }}</span>
        </div>
        <div class="pro-price">
          購買數量:
          <span class="pro-amount-btn">
            <button @click="reduceCount" class="minus">-</button>
            <input type="text" v-model.number="amount" class="input" />
            <button @click="addCount" class="minus">+</button>
          </span>
        </div>
        <div class="pro-btn">
          <button type="butto" class="pro-btn-btn btn-gold_2nd $clr_gold_L1" @click="addCart">
            <i class="fa-solid fa-plus"></i>加入購物車
          </button>
          <button class="pro-btn-btn btn-gold" @click="buy">
            <i class="fa-solid fa-bag-shopping"></i>立即購買
          </button>
        </div>
      </div>
      <div class="produce-intro">
        <div class="pro-produce">
          {{ product.prod_intro }}
        </div>
      </div>
      <div class="pro-pro-pic">
        <div class="pro-pic-big">
          <img :src="`../img/products/${product.prod_pic_intro_1}`" />
        </div>
        <div class="pro-pic-big">
          <img :src="`../img/products/${product.prod_pic_intro_2}`" />
        </div>
      </div>
      <div class="pro-warn">
        <h3>訂購須知</h3>
        <ul class="pro-warn-txt">
          <li>
            <i class="fa-solid fa-circle-dot"></i>
            付款方式：信用卡付款
          </li>
          <li>
            <i class="fa-solid fa-circle-dot"></i>
            下訂後3~5個工作日內出貨，遇假日順延
          </li>
          <li>
            <i class="fa-solid fa-circle-dot"></i>
            商品為生鮮料理，恕不接受預購
          </li>
          <li>
            <i class="fa-solid fa-circle-dot"></i>
            在偏遠島嶼的情況下，我們可能無法送貨到商店指南中指定的地區以外的地區。
          </li>
        </ul>
      </div>
      <div class="pro-more">
        <div id="circle" :style="{ top: y + 'px', left: x + 'px' }">
          <div class="left"><i class="fa-solid fa-angle-up"></i></div>
          <div class="right"><i class="fa-solid fa-angle-up"></i></div>
        </div>
        <h3>瀏覽更多商品</h3>
        <div class="swip-container">
          <swiper
            class="bannerfa"
            :pagination="{ clickable: true }"
            :modules="modules"
            :navigation="{ nextEl, prevEl }"
            :slides-per-view="xyz"
            @swiper="onSwiper"
            @slideChange="onSlideChange"
            @mousemove="move"
            @mouseleave="leave"
          >
            <swiper-slide
              class="swiper-pro"
              v-for="item in list"
              :key="item.id"
            >
            
              <productcard
                :title="item.prod_name"
                :price="item.prod_price"
                :img="`../img/products/${item.prod_pic_intro_0}`"
              />
            
            </swiper-slide>
          </swiper>
        </div>
      </div>
      <button class="back btn-gold" @click="back">返回商品列表</button>
    </div>
  </div>
</template>

<script>
import breadcrumb from "@/components/breadcrumb.vue";
import { Swiper, SwiperSlide } from "swiper/vue";
import { Pagination, Navigation } from "swiper";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";
import productcard from "@/components/ProductCard.vue";
import store from '@/store';
import {BASE_URL} from '@/assets/js/common.js'

// import Pagination from "@/components/pagination/Pagination.vue"

export default {
  name: "ShopContent",
  // props:{
  //   id:Number,
  //   },
  components: {
    breadcrumb,
    Swiper,
    SwiperSlide,
    productcard,
  },

  data() {
    const onSwiper = (swiper) => {
      console.log(swiper);
    };
    const onSlideChange = () => {
      console.log("slide change");
    };
    const isshock = true;
    return {
      // cardContext2: { list : []}, 鴻銘寫的先留著
      // addCart,
      xyz: 6,
      amount: 1,
      fonts: [
        { name: "首頁", source: "/" },
        { name: "線上商城", source: "shop" },
        // { name: "商品詳情", source: `${item.prod_id}` },
      ],
      onSwiper,
      onSlideChange,
      modules: Pagination,
      product: [
        // title: "福砂屋九州長崎蛋糕",
        // price: "460",
        // txt: "採用精選雞蛋、砂糖、糖漿和小麥粉的簡單材料，全程不用攪拌機，完全靠師傅手感攪拌，製作出口味道地且香甜綿潤的蛋糕點心。長崎蛋糕底砂糖結晶顆粒的粗糖，是攪拌蛋糕材料時留下來的，也是福砂屋長崎蛋糕的特徵。作為長崎蛋糕的傑作，特製五三燒長崎蛋糕的風味更濃，且香氣更濃郁。它由技術熟練的糕點師傅以高超技術製成，生量數量少，是福砂屋的特製長崎蛋糕，廣受長崎 蛋糕饕客們喜愛。",
        // src1: require(`@/assets/img/products/pro-b.jpg`),
        // src2: require(`@/assets/img/products/pro-b-1.jpg`),
        // src3: require(`@/assets/img/products/pro-b-2.jpg`),
      ],
      cartlist:[],
      list: [
        // {
        //   id: 1,
        //   img: require(`@/assets/img/products/pro1.jpg`),
        //   title: "JS怪奇薯條",
        //   price: 180,
        // },
        // {
        //   id: 2,
        //   img: require(`@/assets/img/products/pro2.jpg`),
        //   title: "曲奇餅乾",
        //   price: 280,
        // },
        // {
        //   id: 3,
        //   img: require(`@/assets/img/products/pro3.jpg`),
        //   title: "透明醬油",
        //   price: 320,
        // },
        // {
        //   id: 4,
        //   img: require(`@/assets/img/products/pro4.jpg`),
        //   title: "長崎蛋糕",
        //   price: 460,
        // },
        // {
        //   id: 5,
        //   img: require(`@/assets/img/products/pro5.jpg`),
        //   title: "明太子醬",
        //   price: 480,
        // },
        // {
        //   id: 6,
        //   img: require(`@/assets/img/products/pro6.jpg`),
        //   title: "昆布湯包",
        //   price: 320,
        // },
        // {
        //   id: 7,
        //   img: require(`@/assets/img/products/pro7.jpg`),
        //   title: "旺旺仙貝",
        //   price: 150,
        // },
        // {
        //   id: 8,
        //   img: require(`@/assets/img/products/pro8.jpg`),
        //   title: "七彩洋芋片",
        //   price: 280,
        // },
      ],
      cartlists:[

      ],
      modules: [Pagination, Navigation],
      x: 0,
      y: 0,
    };
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  mounted() {
    this.getData();
    this.getData2();
  },
  methods: {
    addCount() {
      this.amount += 1;
    },
    reduceCount() {
      if (this.amount <= 0) return;
      this.amount -= 1;
    },
    buy() {
      this.$router.push("/shopcart?step=0");
    },
    back() {
      this.$router.push("/shop");
    },
    move(e) {
      let windowidth = window.innerWidth;
      let circle = document.getElementById("circle");
      if (windowidth > 1024) {
        this.x = e.pageX;
        this.y = e.pageY;
        circle.style.opacity = 1;
      }
    },
    leave(e) {
      let windowidth = window.innerWidth;
      let circle = document.getElementById("circle");
      if (windowidth < 1024) {
        this.x = e.pageX;
        this.y = e.pageY;
        circle.style.opacity = 0;
      } else {
        this.x = e.pageX;
        this.y = e.pageY;
        circle.style.opacity = 0;
      }
    },
    //============== 上面的資料

    getData2() {
      const productid = this.$route.params.id;
      console.log(productid);
      // fetch(`{BASE_URL}/getProducts.php`)
      fetch(`${BASE_URL}/getProducts.php`)
        .then((res) => res.json())
        .then((txt) => {
           this.product = txt[`${productid - 1}`];
        })
        // combinedata(){

        // };
    },
    saveData2() {
      console.log(this.product);
    },
    // =============輪播圖
    getData() {
      // this.result = result;
      fetch(`${BASE_URL}/getProducts.php`)
        .then((res) => res.json())
        .then((vv) => {
          this.list = vv;
          console.log(this.list);
        });
    },
    saveData() {
      console.log(this.list);
    },
    addCart() { //要怎麼放進vuex??
      const productid = this.$route.params.id;
      fetch(`${BASE_URL}/getProducts.php`)
        .then((res) => res.json())
        .then((txt) => {
          this.product.amount = this.amount;
        })
      console.log(this.product);
      this.$store.commit("addCart",this.product); //看鴻銘的code 
    },
    
    
  },  
  created() {
    let windowidth = window.innerWidth;
    if (windowidth < 1024) {
      this.xyz = 2;
    } else {
      this.xyz = 6;
    }
  },
  computed: {
  },
};
</script>

<style lang="scss" scoped>
@import "../assets/scss/base/font.scss";
@import "../assets/scss/base/color.scss";
@import "../assets/scss/components/btn.scss";
@import "../assets/scss/layout/grid.scss";
.pro-content {
  width: 100%;
  margin: auto;
  max-width: 1200px;
  .pro-main {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    .pro-pic {
      img {
        width: 70%;
        // border-radius: 10px;
      }
    }
    .pro-txt {
      color: $clr_gray_L1;
      .pro-txt-title {
        letter-spacing: 0px;
        margin: 15px;
      }
      .pro-price {
        margin: 20px;
        display: flex;
        align-items: center;
      }

      .pro-amount-btn {
        width: 30%;
        display: flex;
        justify-content: space-around;
        align-items: center;
        border: 1px solid $front_color_main;
        border-radius: 10px;
        button {
          border: none;
          background-color: transparent;
        }
        input {
          border: none;
          background-color: transparent;
          text-align: center;
        }
      }
    }
    .pro-btn {
      display: flex;
      flex-wrap: wrap;
      width: 99%;
      margin: auto;
      justify-content: flex-start;
      margin: 20px 0px;
      .pro-btn-btn {
        margin: 0px 5px;
      }
    }
    .produce-intro {
      display: flex;
      justify-content: center;

      .pro-produce {
        color: $clr_gray_L2;
        margin: 20px 0px 30px 0px;
        line-height: 1.5;
      }
    }
    .pro-pro-pic {
      width: 100%;
      display: flex;
      flex-wrap: wrap;
      .pro-pic-big {
        margin: 20px;
        img {
          width: 100%;
        }
      }
    }
    .pro-warn {
      margin: auto;
      width: 100%;
      h3 {
        width: 100%;
        margin: 20px 0px;
        color: $clr_gray_L2;
        text-align: center;
      }
      .pro-warn-txt {
        text-align: left;
        margin: auto;
        color: $clr_gray_L2;

        li {
          margin: 10px 0px;
        }
        .fa-circle-dot {
          color: $clr_gold_L2;
        }
      }
    }
    .pro-more {
      margin: auto;
      margin-top: 50px;
      width: 100%;
      .swiper {
        --swiper-theme-color: #d7bf9d;
        --swiper-navigation-color: #d7bf9d;
        --swiper-navigation-size: 40px;
        --swiper-navigation-border-radius: 100%;
      }
      #circle {
        position: absolute;
        width: 100px;
        height: 100px;
        border-radius: 100%;
        background-color: rgba(#fff, 0.7);
        border: solid 1px rgba(#000, 0.3);
        z-index: 999;
        pointer-events: none;
        transition: opacity 0.3s;
        transform: translate(-50%, -50%);
        opacity: 0;
        display: flex;
        justify-content: space-evenly;
        .left {
          transform: rotate(90deg);
        }
        .right {
          transform: rotate(-90deg);
        }
      }
      h3 {
        width: 100%;
        margin: 20px 0px;
        color: $clr_gray_L2;
        text-align: center;
      }
      .swip-container {
        width: 100%;
      }
    }
    .back {
      margin: auto;
      margin-top: 50px;
      margin-bottom: 50px;
    }
  }
}

@media screen and (max-width: 768px) {
  .pro-main {
    flex-direction: column;
    .pro-pic {
      width: 100%;
    }
    .pro-txt {
      width: 100%;
      .pro-txt-title {
        @include font(28px);
      }
      .pro-price {
        @include font(18px);
      }
      .pro-price-num {
        @include font(22px);
        margin: auto;
      }
      .pro-amount-btn {
        text-align: center;
        margin: auto;
        input {
          width: 25%;
          @include font(20px);
        }
        button {
          @include font(18px);
        }
      }
      .pro-btn-btn {
        @include font(12px);
        text-align: center;
      }
    }
    .pro-produce {
      width: 100%;
      @include font(14px);
    }
    .pro-pic-big {
      width: 100%;
    }
    .pro-warn {
      h3 {
        @include font(20px);
      }
      .pro-warn-txt {
        width: 95%;
        @include font(12px);
      }
    }
    .pro-more {
      h3 {
        @include font(20px);
      }
    }
  }
}

@media screen and (min-width: 769px) {
  .pro-pic {
    width: 50%;
  }
  .pro-txt {
    width: 45%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    margin-left: 50px;
    .pro-txt-title {
      @include font(34px);
    }
    .pro-price {
      @include font(20px);
    }
    .pro-price-num {
      @include font(30px);
      margin-left: 30px;
    }
    .pro-amount-btn {
      margin-left: 30px;
      // width: 60%;
      input {
        width: 20%;
        @include font(20px);
      }
      button {
        @include font(26px);
      }
    }
  }
  .pro-produce {
    width: 70%;
    @include font(18px);
  }
  .pro-pic-big {
    width: 45%;
  }
  .pro-warn {
    h3 {
      @include font(28px);
    }
    .pro-warn-txt {
      width: 65%;
      @include font(18px);
    }
  }
  .pro-more {
    h3 {
      @include font(28px);
    }
    .mob {
      display: none;
    }
    .bannerfa {
      width: 100%;
      cursor: pointer;
      // padding-left: 30px;
      .swiper-pro {
        border-radius: 10px;
        padding: 10px;
        img {
          width: 50%;
        }
      }
    }
  }
}
</style>

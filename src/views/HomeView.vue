<template>
  <Banner class="col" :src="require(`@/assets/img/Banner/banner_index.jpg`)" />
  <div class="Home">
    <div>
      <div class="title">
        <h1>Topic 最新消息</h1>
      </div>
      <ul class="HomeNew-List">
        <li v-for="list in lists" :key="list">
          <div class="HomeNew">
            <div class="TopicsCard">
              <img class="col-5" :src="list.imageurl" />
              <div class="HomeNew-Text">
                <p class="HomeNew-Title">{{ list.HomeNew_Title }}</p>
                <p class="HomeNew-Subtitle">{{ list.HomeNew_Subtitle }}</p>
              </div>
            </div>
          </div>
        </li>
        <div class="MoreButton">
          <button>more</button>
        </div>
        <div class="OtherNews">
          <div class="HomeNew-Pc col-xl-4">
            <div class="HomeNew-Pc-Card">
              <img src="https://picsum.photos/300/200/?random=10" />
              <div class="HomeNew-Pc-Text">
                <p>2022/11/06</p>
                <p>｢TRAIN SUITE 四季島｣2晚3天課程/冬季額外招聘已經開始。</p>
              </div>
            </div>
          </div>
          <div class="Covid-19 col-xl-4">
            <div class="CovidText">
              <p>【JET SPEED】為了安全騎行</p>
              <button>關於新型冠狀病毒傳染病對策</button>
            </div>
          </div>
          <div class="Js-Official col-xl-4">
            <div class="Js-SocialMedia">
              <img src="../assets/img/instagram.jpg" alt="" />
              <p>「JET SPEED」公式instergram</p>
            </div>
          </div>
        </div>
      </ul>
      <div class="HomeArticle">
        <ul>
          <li v-for="article in articles" :key="article" class="row-cols-xl">
            <div>
              <div class="HomeArticle-Item">
                <img class="col-5 col-xl-10" :src="article.imageurl" />
                <div class="HomeArticle-Text">
                  <p class="HomeArticle-Title">{{ article.Title }}</p>
                  <p class="HomeArticle-Subtitle">{{ article.SubTitle }}</p>
                </div>
              </div>
            </div>
            <div class="MoreButton">
              <button>more</button>
            </div>
          </li>
        </ul>
      </div>
      <div class="HomeTrain">
        <div class="HomeTrain-Title">
          <h1>The cruise train</h1>
          <p>____列車介紹</p>
        </div>
        <div class="HomeTrain-Graphic">
          <div class="HomeTrain-Pic">
            <img src="../assets/img/Train/461565832_78ffb91acb_b.webp" alt="" />
            <img src="../assets/img/Train/461565832_78ffb91acb_b.webp" alt="" />
          </div>
          <div class="HomeTrain-Text">
            <div class="HomeTrain-Title-Pc">
              <h1>The cruise train</h1>
              <p>____列車介紹</p>
            </div>
            <p class="HomeTrain-Text-Title">
              有豐富的品質， <br />只有在火車上才能體驗的特殊空間。
            </p>
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
      </div>
      <div class="Home-Carousal">
        <div class="Carousal-Title">
          <h1 class="Home-Carousal-First">YOUR JOURNET</h1>
          <p class="Home-Carousal-Second">____旅遊行程介紹</p>
          <swiper :navigation="true" :modules="modules" class="mySwiper">
            <swiper-slide>
              <img src="../assets/img/Scape/01.jpg" alt="" />
              <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
            </swiper-slide>
            <swiper-slide>
              <img src="../assets/img/Scape/02.jpg" alt="" />
              <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
            </swiper-slide>
            <swiper-slide>
              <img src="../assets/img/Scape/03.jpg" alt="" />
              <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
            </swiper-slide>
            <swiper-slide>
              <img src="../assets/img/Scape/04.jpg" alt="" />
              <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
            </swiper-slide>
            <swiper-slide>
              <img src="../assets/img/Scape/05.jpg" alt="" />
              <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
            </swiper-slide>
            <swiper-slide>
              <img src="../assets/img/Scape/06.jpg" alt="" />
              <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
            </swiper-slide>
            <swiper-slide>
              <img src="../assets/img/Scape/07.jpg" alt="" />
              <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
            </swiper-slide>
            <swiper-slide>
              <img src="../assets/img/Scape/08.jpg" alt="" />
              <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
            </swiper-slide>
            <swiper-slide>
              <img src="../assets/img/Scape/09.jpg" alt="" />
              <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
            </swiper-slide>
          </swiper>
        </div>
      </div>
    </div>
  </div>
  <router-view></router-view>
</template>

<script>
import Banner from "@/components/Banner.vue";

// Import Swiper Vue.js components
import { Swiper, SwiperSlide } from "swiper/vue";

// Import Swiper styles
import "swiper/css";

import "swiper/css/navigation";

// import required modules
import { Navigation } from "swiper";

export default {
  name: "HeaderView",
  components: {
    Banner,
    Swiper,
    SwiperSlide,
  },
  data() {
    return {
      modules: [Navigation],
      lists: [
        {
          imageurl: require("@/assets/img/News/1.jpg"),
          HomeNew_Title: "2022/11/06",
          HomeNew_Subtitle:
            "｢TRAIN SUITE 四季島｣2晚3天課程/冬季額外招聘已經開始。",
        },
        {
          imageurl: require("@/assets/img/News/1.jpg"),
          HomeNew_Title: "2022/11/06",
          HomeNew_Subtitle:
            "｢TRAIN SUITE 四季島｣2晚3天課程/冬季額外招聘已經開始。",
        },
        {
          imageurl: require("@/assets/img/News/1.jpg"),
          HomeNew_Title: "2022/11/06",
          HomeNew_Subtitle:
            "｢TRAIN SUITE 四季島｣2晚3天課程/冬季額外招聘已經開始。",
        },
        {
          imageurl: require("@/assets/img/News/1.jpg"),
          HomeNew_Title: "2022/11/06",
          HomeNew_Subtitle:
            "｢TRAIN SUITE 四季島｣2晚3天課程/冬季額外招聘已經開始。",
        },
      ],
      articles: [
        {
          imageurl: require("@/assets/img/News/1.jpg"),
          Title: "－旅遊行程介紹",
          SubTitle: "介紹當前推薦的旅遊行程",
        },
        {
          imageurl: require("@/assets/img/News/1.jpg"),
          Title: "－商品系列",
          SubTitle: "介紹當前推薦的旅遊行程",
        },
        {
          imageurl: require("@/assets/img/News/1.jpg"),
          Title: "－列車介紹",
          SubTitle: "介紹當前推薦的旅遊行程",
        },
      ],
    };
  },
  methods: {
    getdata() {
      fetch(process.env.VUE_APP_WEATHERAPI)
        .then(function (response) {
          return response.json();
        })
        .then(function (myJson) {
          console.log(myJson);
        });
    },
  },
  mounted() {
    this.getdata();
  },
};
</script>

<style scoped lang="scss">
@import "../assets/scss/layout/grid.scss";
@import "../assets/scss/base/font.scss";
img {
  width: 100%;
}
.title {
  margin: 20px auto;
  h1 {
    @include font(18px);
  }
}
li {
  margin-bottom: 30px;
}
.HomeNew-List {
  .HomeNew {
    .TopicsCard {
      display: flex;
      gap: 10px;
      .HomeNew-Text {
        text-align: start;
        @include font(12px);
        font-weight: 500;
      }
    }
  }
  .OtherNews {
    .HomeNew-Pc {
      display: none;
    }
    .HomeNew-Pc {
      display: none;
    }
    margin: 30px auto;
    .Covid-19 {
      //font-size: nth($font-size,7)+px;
      border: 1px solid #bc955c;
      text-align: start;
      background-color: #ebdfce;
      .CovidText {
        margin: 10px 20px;
        @include font(14px);
        button {
          @include font(14px);
          width: 100%;
          margin: 10px auto;
          padding: 10px;
          font-weight: 500;
          text-align: center;
          background-color: #d7bf9d;
          border: none;
        }
      }
    }
    .Js-Official {
      .Js-SocialMedia {
        margin: 30px auto;
        border: 1px solid #bc955c;
        p {
          @include font(14px);
          margin: 20px;
          text-align: start;
        }
        img {
          display: none;
        }
      }
    }
  }
}
.MoreButton {
  width: 100%;
  text-align: right;
  button {
    @include font(14px);
    background-color: transparent;
    border: 0;
    border-bottom: 1px solid #bc955c;
    text-align: right;
  }
}
.HomeArticle {
  .HomeArticle-Item {
    display: flex;
    gap: 10px;
    .HomeArticle-Text {
      @include font(14px);
      text-align: left;
    }
  }
}
.HomeTrain {
  display: flex;
  flex-direction: column;
  .HomeTrain-Title {
    margin: 10px auto 20px;
    h1 {
      width: 100%;
      @include font(32px);
    }
    p {
      @include font(20px);
    }
  }
  .HomeTrain-Pic {
    @include font(18px);
  }
  .HomeTrain-Text {
    margin-bottom: 20px;
    @include font(14px);
    font-weight: 500;
    p {
      margin: 20px auto;
    }
    .HomeTrain-Title-Pc {
      display: none;
    }
  }
}
.Home-Carousal {
  .Carousal-Title {
    .mySwiper {
      img {
        height: 250px;
      }
      p {
        @include font(24px);
        color: #444;
        text-align: center;
        margin-bottom: 30px
      }
    }
    .Home-Carousal-First {
      @include font(32px);
    }
    .Home-Carousal-Second {
      @include font(20px);
      margin-bottom: 20px;
    }
  }
}

@media (min-width: 1200px) {
  .title {
    display: none;
  }
  .HomeNew-List {
    .HomeNew {
      visibility: hidden;
      display: none;
    }
    .OtherNews {
      display: flex;
      justify-content: space-between;
      .HomeNew-Pc {
        display: block;
        border: 1px solid black;
        width: 30%;
        .HomeNew-Pc-Card {
          display: flex;
          margin: 20px 10px;
          img {
            width: 25%;
          }
          .HomeNew-Pc-Text {
            @include font(14px);
            text-align: left;
            padding: 10px;
          }
        }
      }
      .Js-Official {
        .Js-SocialMedia {
          display: flex;
          margin: auto;
          height: 100%;
          img {
            width: auto;
            display: inherit;
          }
        }
      }
    }
    .MoreButton {
      button {
        display: none;
      }
    }
  }
  .HomeArticle {
    padding: 30px 0;
    ul {
      display: flex;
      li {
        flex-grow: 1;
        .HomeArticle-Item {
          display: block;
          .HomeArticle-Text {
            padding: 0 30px;
          }
        }
        .MoreButton {
          button {
            margin-right: 30px;
          }
        }
      }
    }
  }
  .HomeTrain {
    display: flex;
    padding: 30px 0;
    .HomeTrain-Title {
      display: none;
      h1 {
        width: 75%;
        @include font(36px);
      }
      p {
        @include font(20px);
      }
    }
    .HomeTrain-Graphic {
      display: flex;
      gap: 20px;
      .HomeTrain-Pic {
        width: 50%;
      }
      .HomeTrain-Text {
        width: 50%;
        @include font(24px);
        margin: auto 20px;
        .HomeTrain-Title-Pc {
          @include font(36px);
          margin-bottom: 40px;
        }
        button {
          @include font(20px);
        }
        .HomeTrain-Title-Pc {
          display: inherit;
        }
      }
    }
  }
  .Home-Carousal {
    .Carousal-Title {
      .mySwiper {
        img {
          height: 600px;
        }
        p {
        }
      }
    }
  }
}
</style>


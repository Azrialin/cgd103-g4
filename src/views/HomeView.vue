<template>
  <Banner class="col" :src="require(`@/assets/img/Banner/banner_index.jpg`)">
    <div class="BannerTEXT">
      <img class="BannerLogo" src="../assets/img/Group_625335.svg" alt="" />
      <div class="Bannertxt">
        <p>
          深遊探訪<br />遇見這個國家的深度，<br />欣賞偶爾的放鬆<br />在你的生活中<br />成為“最高級”的體驗<br />日本九州的每列火車。
        </p>
      </div>
    </div>
  </Banner>
  <div class="Home">
    <div>
      <div class="WeatherApi">
        <div class="Api-Header">
          <p>{{ country_name }}　{{ place_name }}　{{ data_catch_time }}</p>
        </div>
        <div class="Api-Footer">
          <div class="weatherTemp">
            <p>{{ temperature }}</p>
            <p>{{ weather_description }}</p>
            <p>最低溫: {{ temperatureMin }}　最高溫:{{ temperatureMax }}</p>
          </div>
          <img :src="weather_pic" alt="" />
        </div>
      </div>
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
              <img src="../assets/img/Scape/21.jpg" />
              <div class="HomeNew-Pc-Text">
                <p>2022/11/06</p>
                <p>｢JET SPEED｣雙世界遺產/超值一日遊開放預約中。</p>
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
              <p>「JET SPEED」官方instergram</p>
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
            <router-link :to="article.link">
              <div class="MoreButton">
                <button>more</button>
              </div>
            </router-link>
          </li>
        </ul>
      </div>
      <div class="HomeTrain">
        <div class="HomeTrain-Title">
          <h1>The cruise train</h1>
          <p>列車介紹</p>
        </div>
        <div class="HomeTrain-Graphic">
          <div class="HomeTrain-Pic">
            <img
              src="../assets/img/Train/outside/img_602dfce09a61b.png"
              alt=""
            />
            <img
              src="../assets/img/Train/outside/img_602e12443ccb7.jpeg"
              alt=""
            />
          </div>
          <div class="HomeTrain-Text">
            <div class="HomeTrain-Title-Pc">
              <h1>The cruise train</h1>
              <p>列車介紹</p>
            </div>
            <p class="HomeTrain-Text-Title">
              有豐富的品質， <br />只有在火車上才能體驗的特殊空間。
            </p>
            <p class="HomeTrain-Text-SubTitle">
              JETSPEED觀光列車的設計概念為「新時代、新文化、新希望」，內裝巧妙融入明治時期元素，成就了一台擁有與眾不同「空想氛圍」彩繪觀光列車，因為融入高知獨特歷史文化的美麗外觀，讓鐵道迷們不斷爭相詢問。
              您可以在獨特的氛圍下享用我們的 特色佳餚。
              將為您創造一生中從未體驗過的新火車之旅。
            </p>
            <router-link to="/train">
              <div class="MoreButton">
                <button>more</button>
              </div>
            </router-link>
          </div>
        </div>
      </div>
      <div class="Home-Carousal">
        <div class="Carousal-Title">
          <h1 class="Home-Carousal-First">YOUR JOURNET</h1>
          <p class="Home-Carousal-Second">旅遊行程介紹</p>
          <swiper :navigation="true" :modules="modules" class="mySwiper">
            <swiper-slide>
              <router-link to="/travel">
                <img src="../assets/img/Scape/11.jpg" alt="" />
              </router-link>
            </swiper-slide>
            <swiper-slide>
              <router-link to="">
                <img src="../assets/img/Scape/13.jpg" alt="" />
              </router-link>
            </swiper-slide>
            <swiper-slide>
              <router-link to="/travel">
                <img src="../assets/img/Scape/17.jpg" alt="" />
              </router-link>
            </swiper-slide>
            <swiper-slide>
              <router-link to="/travel">
                <img src="../assets/img/Scape/04.jpg" alt="" />
              </router-link>
            </swiper-slide>
            <swiper-slide>
              <router-link to="/travel">
                <img src="../assets/img/Scape/05.jpg" alt="" />
              </router-link>
            </swiper-slide>
            <swiper-slide>
              <router-link to="/travel">
                <img src="../assets/img/Scape/06.jpg" alt="" />
              </router-link>
            </swiper-slide>
            <swiper-slide>
              <router-link to="/travel">
                <img src="../assets/img/Scape/07.jpg" alt="" />
              </router-link>
            </swiper-slide>
            <swiper-slide>
              <router-link to="/travel">
                <img src="../assets/img/Scape/08.jpg" alt="" />
              </router-link>
            </swiper-slide>
            <swiper-slide>
              <router-link to="/travel">
                <img src="../assets/img/Scape/10.jpg" alt="" />
              </router-link>
            </swiper-slide>
          </swiper>
        </div>
      </div>
      <router-link to="/travel">
        <button class="moretravel">預覽行程</button>
      </router-link>
      <GotoParadise />
    </div>
  </div>
  <router-view></router-view>
</template>

<script>
import Banner from "@/components/Banner.vue";
import GotoParadise from "@/components/news/GotoParadise.vue";
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
    GotoParadise,
  },
  data() {
    return {
      temperature: "",
      modules: [Navigation],
      lists: [
        {
          imageurl: require("@/assets/img/Scape/08.jpg"),
          HomeNew_Title: "2022/11/06",
          HomeNew_Subtitle:
            "｢Jet Speed 九州之旅｣2晚3天課程/冬季額外招聘已經開始。",
          link: "/travel",
        },
        {
          imageurl: require("@/assets/img/Scape/01.jpg"),
          HomeNew_Title: "2022/11/06",
          HomeNew_Subtitle:
            "JET SPEED成立5周年紀念特展將於2022年5月5日舉行紀念遊行活動...",
          link: "/shop",
        },
        {
          imageurl: require("@/assets/img/News/3.jpg"),
          HomeNew_Title: "2022/11/06",
          HomeNew_Subtitle: "高千穗知名祭典活動-夜神樂 ，將於今年的11月...",
          link: "/train",
        },
      ],
      articles: [
        {
          imageurl: require("../assets/img/Scape/01.jpg"),
          Title: "-列車旅遊行程介紹",
          SubTitle: "推薦給您最優質的列車旅行",
          link: "/travel",
        },
        {
          imageurl: require("@/assets/img/products/pro-b-1.jpg"),
          Title: "-特色產品介紹",
          SubTitle: "當地特產及紀念週邊推薦",
          link: "/shop",
        },
        {
          imageurl: require("../assets/img/Train/outside/img_602dfce09a61b.png"),
          Title: "-列車介紹",
          SubTitle: "列車環境簡介",
          link: "/train",
        },
      ],
    };
  },
  methods: {
    async getdata() {
      const response = await fetch(process.env.VUE_APP_WEATHERAPI, {
        method: "GET",
        mode: "cors",
      });
      const data = await response.json();
      this.temperature = parseInt(data.main.temp) + "°C";
      this.temperatureMin = parseInt(data.main.temp_min - 1) + "°C";
      this.temperatureMax = parseInt(data.main.temp_max) + "°C";
      this.weather_description = data.weather[0].description;
      this.weather_pic =
        "http://openweathermap.org/img/wn/" + data.weather[0].icon + "@2x.png";
      this.place_name = data.name;
      this.country_name = data.sys.country;
      this.data_catch_time = new Date(data.dt * 1000)
        .toLocaleString()
        .split(" ")[1];

      console.log(data);
    },
  },
  created() {
    this.getdata();
    //設定計時器
    // setInterval(()=>{
    // },3600*1000)
  },
};
</script>

<style scoped lang="scss">
@import "../assets/scss/layout/grid.scss";
@import "../assets/scss/base/font.scss";
img {
  width: 100%;
  object-fit: cover;
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
.BannerTEXT {
  display: none;
}
//天氣預報區域
.WeatherApi {
  .Api-Header {
    margin: 30px auto 0;
    p {
      font-size: 24px;
      padding: 10px 30px;
      background-color: #bc955c;
      text-align: left;
    }
  }
  .Api-Footer {
    display: flex;
    justify-content: space-between;
    padding: 10px 30px;
    background-color: #ebdfce;
    .weatherTemp {
      font-size: 24px;
      text-align: left;
      display: flex;
      flex-direction: column;
      justify-content: space-around;
    }
    img {
      width: auto;
    }
  }
}
//------------
.HomeNew-List {
  .HomeNew {
    .TopicsCard {
      display: flex;
      gap: 10px;
      height: 80px;
      .HomeNew-Text {
        text-align: start;
        @include font(12px);
      }
    }
  }
  .OtherNews {
    margin: 30px auto;
    .HomeNew-Pc {
      display: none;
    }
    .Covid-19 {
      //font-size: nth($font-size,7)+px;
      border: 1px solid #bc955c;
      text-align: start;
      background-color: #ebdfce;
      .CovidText {
        margin: 10px 20px;
        @include font(16px);
        button {
          @include font(16px);
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
          @include font(16px);
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
    @include font(16px);
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
      @include font(12px);
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
    @include font(16px);
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
        object-fit: cover;
      }
      p {
        @include font(24px);
        color: #444;
        text-align: center;
        margin-bottom: 30px;
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
.moretravel {
  @include font(14px);
  color: #e6e6e6;
  background-color: #bc955c;
  text-align: center;
  margin: 30px auto;
  border: 1px solid transparent;
  border-radius: 10px;
  padding: 10px;
  width: 180px;
  appearance: none;
}

@media (min-width: 1200px) {
  //天氣預報區域
  .WeatherApi {
    .Api-Header {
      margin: 30px auto 0;
      p {
        font-size: 24px;
        padding: 10px 30px;
        background-color: #bc955c;
        text-align: left;
      }
    }
    .Api-Footer {
      display: flex;
      justify-content: space-between;
      padding: 10px 30px;
      background-color: #ebdfce;
      .weatherTemp {
        font-size: 24px;
        text-align: left;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
      }
      img {
        width: auto;
      }
    }
  }
  .BannerTEXT {
    display: flex;
    gap: 20px;
    position: absolute;
    top: 40%;
    left: 30%;
    .BannerLogo {
      width: 30%;
      object-fit: contain;
    }
    .Bannertxt {
      p {
        @include font(24px);
        color: #fff;
        writing-mode: vertical-rl;
        text-align: left;
        line-height: 60px;
      }
    }
  }
  .top-banner {
    height: 680px;
    overflow: hidden;
    :deep(img) {
      object-fit: cover;
    }
  }
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
            object-fit: cover;
          }
          .HomeNew-Pc-Text {
            @include font(14px);
            text-align: left;
            padding: 10px;
          }
        }
      }
      .Covid-19 {
        .CovidText {
          margin: 20px;
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
          width: 400px;
          gap: 20px;
          img {
            width: 100%;
          }
          .HomeArticle-Text {
            margin-top: 10px;
            .HomeArticle-Title {
              font-size: 20px;
              margin: 10px auto;
            }
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
        width: 60%;
        img {
          height: 300px;
        }
      }
      .HomeTrain-Text {
        width: 50%;
        margin: auto 20px;
        .HomeTrain-Title-Pc {
          @include font(32px);
          margin-bottom: 40px;
          display: inherit;
          p {
            @include font(20px);
          }
        }
        .HomeTrain-Text-SubTitle,
        .HomeTrain-Text-Title {
          @include font(16px);
        }
        button {
          @include font(20px);
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
      }
    }
  }
}
</style>


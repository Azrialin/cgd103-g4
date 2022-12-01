<template>
  <Header/>
  <Banner/>
  <breadcrumb :fonts="fonts"/>
  <div class="about">
    <div class="container_tra">
      <div class="content_tra">
        <ul class="tra_group">
          <li v-for="list in lists" :key="list">
            <div class="tra_card">
              <div class="tra_img">
                <router-link to="/travelcontent" class="aaa"><img src="https://picsum.photos/300/200/?random=10" alt=""></router-link>
              </div>
              <div class="tra_intro">
                <h3>{{list['title']}}</h3>
                <h4>{{list['subtitle']}}</h4>
                <p class="content font-16-15em">{{list['content']}}</p>
                <div class="tago">
                  <p>{{list['tag']}}</p>
                  <router-link to="/travelcontent">預約行程</router-link>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>
<script>
    import Header from "@/components/Header.vue"
    import Banner from "@/components/Banner.vue"
    import breadcrumb from "@/components/breadcrumb.vue"
    export default {
        name: "HeaderView",
        components:{
            Header,
            Banner,
            breadcrumb
        },
        data(){
          return{
            lists:[{title:"山口賀新年，福兔湯泉戀",subtitle:"雙世界遺產，超值一日遊",content:"雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊",tag:"#產品推薦、餐點",price:"6,3456"},
            {title:"山口賀新年，福兔湯泉戀",subtitle:"雙世界遺產，超值一日遊",content:"雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊",tag:"#產品推薦、餐點",price:"6,3456"},
            {title:"山口賀新年，福兔湯泉戀",subtitle:"雙世界遺產，超值一日遊",content:"雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊",tag:"#產品推薦、餐點",price:"6,3456"},
            {title:"山口賀新年，福兔湯泉戀",subtitle:"雙世界遺產，超值一日遊",content:"雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊",tag:"#產品推薦、餐點",price:"6,3456"}],
            fonts:[{name:'首頁',source:'train'},{name:'行程方案',source:'train'},{name:'行程內文',source:'train'}],  // source各位自己輸入對應的router路徑^^
            
          }
        }
    }
</script>
<style lang="scss" scoped>
@import "../assets/scss/base/font.scss";
@import "../assets/scss/base/color.scss";
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
      .tra_group{
        padding: 0;
        list-style: none;
        .tra_card{
          box-sizing: border-box;
          padding: 10px;
          width: 100%;
          .tra_img:hover{
            border-radius: 30px;
          }
          .tra_img{
            box-sizing: border-box;
            padding: 10px;
            border-radius: 10px;
            box-sizing: border-box;
            width: 100%;
            img{
              width: 100%;
              border-radius: 10px;
              &:hover{
                border-radius: 20px;
              }
            }
          }
          .tra_intro{
            box-sizing: border-box;
            padding: 10px;
            width: 100%;
            h3{
              @include font(36px);
            }
            h4{
              @include font(20px);
              padding-bottom: 30px;
              margin-bottom: 30px;
              border-bottom: 2px solid $color_ccc;
            }
            .content{
              padding-bottom: 30px;
              margin-bottom: 30px;
              border-bottom: 2px solid $color_ccc;
            }
            .tago{
              display: flex;
              align-items: center;
              p{
                @include font(16px);
                text-align: start;
                background-color: $front_color_disable;
                color: $color_444;
                padding: 15px;
                width: 30%;
                border-radius: 10px;
                box-sizing: border-box;
              }
              a{
                @include font(16px);
                transition: 0.3s;
                background-color: $front_color_main;
                display: flex;
                align-items: center;
                justify-content: center;
                color: $color_e6;
                text-decoration: none;
                width: 30%;
                padding: 15px;
                box-sizing: border-box;
                border-radius: 10px;
                height: fit-content;
                margin: 0px 20px;
                &:hover{
                  background-color: $front_color_hover;
                  color: $color_444;
                }
              }
            }
          }
        }
      }
    }
  }
  @media screen and (min-width: 1024px){
    .container_tra{
      .content_tra{
        .tra_group{
          li{
            padding: 20px 0px;
          }
          li:nth-child(2n){
            background-color: #f8f8f8;
          }
          li:nth-child(2n) .tra_card{
            display: flex;
            flex-direction: row-reverse;
          }
          .tra_card{
            display: flex;
            .tra_img{
              padding: 0;
              width: 55%;
              overflow: hidden;
              transition: 1s;
              img{
                transition: 1s;
              }
              img:hover{
                transition: 1s;
                transform: scale(1.01);
              }
            }
            .tra_intro{
              padding: 20px;
              justify-content: center;
              display: flex;
              flex-direction: column;
              width: 45%;
              .tago{
                p{
                  white-space: nowrap;
                  width: 50%;
                }
                a{
                  width: 50%;
                }
              }
            }
          }
        }
      }
    }
  }
</style>
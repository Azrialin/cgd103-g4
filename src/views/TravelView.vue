<template>
  <Header/>
  <breadcrumb/>
  <div class="about">
    <div class="container_tra">
      <div class="content_tra">
        <ul class="tra_group">
          <li v-for="list in lists" :key="list">
            <div class="tra_card">
              <div class="tra_img">
                <a href=""><img src="https://picsum.photos/300/200/?random=10" alt=""></a>
              </div>
              <div class="tra_intro">
                <h3>{{list['title']}}</h3>
                <h4>{{list['subtitle']}}</h4>
                <p class="font-16-15em">{{list['content']}}</p>
                <div class="tago">
                  <p>{{list['tag']}}</p>
                  <a href="">預約行程</a>
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
    import breadcrumb from "@/components/breadcrumb.vue"
    export default {
        name: "HeaderView",
        components:{
            Header,
            breadcrumb
        },
        data(){
          return{
            lists:[{title:"山口賀新年，福兔湯泉戀",subtitle:"雙世界遺產，超值一日遊",content:"雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊",tag:"#產品推薦、活動、餐點"},
            {title:"山口賀新年，福兔湯泉戀",subtitle:"雙世界遺產，超值一日遊",content:"雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊",tag:"#產品推薦、活動、餐點"},
            {title:"山口賀新年，福兔湯泉戀",subtitle:"雙世界遺產，超值一日遊",content:"雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊",tag:"#產品推薦、活動、餐點"},
            {title:"山口賀新年，福兔湯泉戀",subtitle:"雙世界遺產，超值一日遊",content:"雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊",tag:"#產品推薦、活動、餐點"}],
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
      .tra_group{
        padding: 0;
        list-style: none;
        .tra_card{
          width: 100%;
          .tra_img{
            padding: 10px;
            width: 100%;
            a img{
              width: 100%;
              border-radius:10px ;
            }
          }
          .tra_intro{
            padding: 10px;
            width: 100%;
            h3{
              @include font(36px);
            }
            h4{
              @include font(20px);
            }
            .tago{
              display: flex;
              align-items: center;
              p{
                @include font(16px);
                text-align: start;
                background-color: $front_color_main;
                padding: 15px;
                width: 30%;
                border-radius: 10px;
                color: $color_e6;
              }
              a{
                @include font(16px);
                background-color: $front_color_main;
                display: flex;
                align-items: center;
                justify-content: center;
                color: $color_e6;
                text-decoration: none;
                width: 30%;
                padding: 15px;
                border-radius: 10px;
                height: fit-content;
                margin: 0px 20px;
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
            padding-bottom: 20px;
          }
          li:nth-child(2n) .tra_card{
            display: flex;
            flex-direction: row-reverse;
          }
          .tra_card{
            display: flex;
            .tra_img{
              width: 50%;
            }
            .tra_intro{
              display: flex;
              flex-direction: column;
              justify-content: space-evenly;
              width: 50%;
              .tago{
                p{
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
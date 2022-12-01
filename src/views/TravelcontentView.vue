<template>
  <breadcrumb/>
  <div class="about">
    <div class="container_tra">
      <div class="content_tra">
        123
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
            lists:[{title:"山口賀新年，福兔湯泉戀",subtitle:"雙世界遺產，超值一日遊",content:"雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊",tag:"#產品推薦、餐點"},
            {title:"山口賀新年，福兔湯泉戀",subtitle:"雙世界遺產，超值一日遊",content:"雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊",tag:"#產品推薦、餐點"},
            {title:"山口賀新年，福兔湯泉戀",subtitle:"雙世界遺產，超值一日遊",content:"雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊",tag:"#產品推薦、餐點"},
            {title:"山口賀新年，福兔湯泉戀",subtitle:"雙世界遺產，超值一日遊",content:"雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊",tag:"#產品推薦、餐點"}],
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
          padding: 10px;
          width: 100%;
          .tra_img:hover{
            border-radius: 30px;
          }
          .tra_img{
            border-radius: 10px;
            overflow: hidden;
            box-sizing: border-box;
            width: 100%;
            transition: 0.5s;
            a img{
              width: 100%;
              transition: 0.5s;
              &:hover{
                transform: scale(1.05);
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
                background-color: $front_color_main;
                padding: 15px;
                width: 30%;
                border-radius: 10px;
                color: $color_e6;
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
                border-radius: 10px;
                height: fit-content;
                margin: 0px 20px;
                &:hover{
                  background-color: $front_color_hover;
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
              width: 60%;
            }
            .tra_intro{
              display: flex;
              flex-direction: column;
              justify-content: space-evenly;
              width: 40%;
              h4{
                margin-bottom: 0;
              }
              .content{
                margin-top: -30px;
                margin-bottom: 0;
              }
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
<template>
  <Banner :src="require(`@/assets/img/Banner/banner_travel.jpg`)"/>
  <breadcrumb :fonts="fonts"/>
  <div class="about">
    <div class="container_tra">
      <div class="content_tra">
        <ul class="tra_group">
          <!-- <li v-for="list in lists" :key="list"> -->
          <li v-for="result in results" :key="result">
            <div class="tra_card">
              <div class="tra_img">
                <router-link to="/travelcontent" @click="go(result['package_title'],result['package_price'],result['package_indes'],result['package_no'])" class="aaa">
                  <!-- <div class="boxb">${{list['price']}} 起</div> -->
                  <div class="boxb">${{result['package_price']}} 起</div>
                  <!-- <img :src="list['src']" alt=""> -->
                  <img :src="`./img/Scape/${result['package_pic']}`">
                </router-link>
              </div>
              <div class="tra_intro">
                <!-- <h3>{{list['title']}}</h3> -->
                <h3>{{result['package_title']}}</h3>
                <!-- <h4>{{list['subtitle']}}</h4> -->
                <h4>{{result['package_subtitle']}}</h4>
                <!-- <p class="content font-16-15em">{{list['content']}}</p> -->
                <p class="content font-16-15em">{{result['package_des']}}</p>
                <div class="tago">
                  <!-- <p>{{list['tag']}}</p> -->
                  <p>{{result['package_tag']}}</p>
                  <router-link to="/travelcontent" @click="go(result['package_title'],result['package_price'],result['package_indes'],result['package_no'])">行程詳情</router-link>
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
    import {BASE_URL} from '@/assets/js/common.js'
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
            resultts:[],
            results:[],
            // lists:[{src:require(`@/assets/img/News/6.jpg`),title:"山口賀新年，福兔湯泉戀",subtitle:"雙世界遺產，超值一日遊",content:"雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊",tag:"#產品推薦、餐點",price:"6,3456"},
            // {src:require(`@/assets/img/News/6.jpg`),title:"山口賀新年，福兔湯泉戀",subtitle:"雙世界遺產，超值一日遊",content:"雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊",tag:"#產品推薦、餐點",price:"6,3456"},
            // {src:require(`@/assets/img/News/6.jpg`),title:"山口賀新年，福兔湯泉戀",subtitle:"雙世界遺產，超值一日遊",content:"雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊",tag:"#產品推薦、餐點",price:"6,3456"},
            // {src:require(`@/assets/img/News/6.jpg`),title:"山口賀新年，福兔湯泉戀",subtitle:"雙世界遺產，超值一日遊",content:"雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊",tag:"#產品推薦、餐點",price:"6,3456"}],
            fonts:[{name:'首頁',source:'/'},{name:'行程方案',source:'travel'}],  // source各位自己輸入對應的router路徑^^
            
          }
        },
        created(){
          this.getData();
        },
        // watch:{
        //   go(apri,bpri){
        //     window.location.href = `a.html?apri=${apri}&bpri=${bpri}`;
        //   }
        // },
        methods: {
          getData(){
            // const myurl = new URL('http://localhost/cgd103-g4/public/phpfiles/getTravelView.php');
            // fetch(myurl)
            fetch(`${BASE_URL}/getTravelView.php`)
              .then((res) => res.json())
              .then((json) =>{
                this.resultts=json;
                this.results = this.resultts.filter(v=>{
                  return v.package_status === "上架";
                })
              })
          },
          go(theTitle,thePrice,theArticle,theNo){
            let obj = {
              theTitle, 
              thePrice,
              theArticle,
              theNo
            }
            localStorage.setItem('Title',JSON.stringify(obj))
          },
        },
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
          .tra_img{
            position: relative;
            box-sizing: border-box;
            padding: 10px;
            border-radius: 10px;
            box-sizing: border-box;
            width: 100%;
            .boxb{
              @include font(14px);
              width: 100px;
              height: 40px;
              border-radius: 10px 0px 0px 0px;
              background-color: #fff;
              position: absolute;
              right: 10px;
              bottom: 10px;
              z-index: 1;
              display: flex;
              align-items: center;
              justify-content: center;
            }
            img{
              width: 100%;
              height: 400px;
              object-fit: cover;
              border-radius: 10px;
            }
          }
          .tra_intro{
            box-sizing: border-box;
            padding: 10px;
            width: 100%;
            h3{
              @include font(22px);
              white-space: nowrap;
              padding-bottom: 5px;
            }
            h4{
              @include font(14px);
              padding-bottom: 30px;
              margin-bottom: 30px;
              border-bottom: 2px solid $color_ccc;
            }
            .content{
              font-size: 14px;
              padding-bottom: 30px;
              margin-bottom: 30px;
              border-bottom: 2px solid $color_ccc;
            }
            .tago{
              display: flex;
              flex-direction: column;
              align-items: center;
              p{
                @include font(16px);
                text-align: start;
                color: $front_color_main;
                width: 100%;
                border-bottom: 1px solid $front_color_main;
                box-sizing: border-box;
                margin-top: 20px;
                order: 3;
              }
              a{
                @include font(16px);
                transition: 0.3s;
                background-color: $front_color_main;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #fff;
                text-decoration: none;
                width: 100%;
                padding: 15px;
                box-sizing: border-box;
                border-radius: 10px;
                height: fit-content;
                margin: 0px 20px;
                &:hover{
                  background-color: #fff;
                  color: $front_color_main;
                  outline: solid 1px $front_color_main;
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
          li:nth-child(2n) .tra_card .tra_img .boxb{
            background-color: #f8f8f8;
            left: -10px;
            border-radius: 0px 10px 0px 0px;
          }
          .tra_card{
            display: flex;
            .tra_img{
              padding: 0;
              width: 55%;
              overflow: hidden;
              transition: 1s;
              .aaa{
                position: relative;
                .boxb{
                  @include font(20px);
                  width: 150px;
                  height: 70px;
                  right: -10px;
                  bottom: -10px;
                }
              }
              img{
                transition: 1s;
              }
              img:hover{
                transition: 1s;
                transform: scale(1.05);
              }
            }
            .tra_intro{
              padding: 20px;
              justify-content: center;
              display: flex;
              flex-direction: column;
              width: 45%;
              h3{
                @include font(36px);
              }
              h4{
                @include font(20px);
              }
              .content{
                font-size: initial;
              }
              .tago{
                flex-direction: row;
                p{
                  text-align: center;
                  white-space: nowrap;
                  width: fit-content;
                  margin-bottom: 0px;
                  order: 0;
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
<template>
  <Header/>
  <breadcrumb/>
  <div class="about">
    <div class="container_tra">
      <div class="content_tra">
        <ul class="tra_group">
          <li>
            <div class="tra_card">
              <div class="tra_img">
                <a href=""><img src="https://picsum.photos/300/200/?random=10" alt=""></a>
              </div>
              <div class="tra_intro">
                <h3>山口賀新年，福兔湯泉戀</h3>
                <h4>雙世界遺產，超值一日遊</h4>
                <p class="font-16-15em">雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，雙世界遺產，超值一日遊，</p>
                <div class="tago">
                  <p>#產品推薦、活動、餐點</p>
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
            
          }
        }
    }
</script>
<style lang="scss" scoped>
@import "../assets/scss/base/font.scss";
  .container_tra{
    width: 100%;
    background-color: #ccc;
    .content_tra{
      width: 100%;
      .tra_group{
        list-style: none;
        .tra_card{
          width: 100%;
          .tra_img{
            width: 100%;
            a img{
              width: 100%;
            }
          }
          .tra_intro{
            width: 100%;
            h3{
              @include font(36px);
            }
            h4{
              @include font(20px);
            }
          }
        }
      }
    }
  }
</style>
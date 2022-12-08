<template>
    <breadcrumb :fonts="fonts"/>
    <div class="signup" style="max-width: 1200px; margin: auto;">
        <div class="container">
            <div class="main">
                <form action="">
                    <h2>註冊會員</h2>
                    <hr>
                    <p>*為必填欄位</p>
                    <div class="inputfield">
                        <h3 class="title">姓名<span>*</span></h3>
                        <input class="input-gold" type="text" placeholder="請輸入姓名">
                    </div>  
                    <div class="inputfield">
                        <h3 class="title">密碼<span>*</span></h3>
                        <input class="input-gold" type="password" placeholder="請輸入密碼">
                    </div>
                    <div class="inputfield">
                        <h3 class="title">電子信箱<span>*</span></h3>
                        <input class="input-gold" type="email" placeholder="請輸入Email">
                    </div> 
                    <div class="inputfield">
                        <h3 class="title">電話號碼<span>*</span></h3>
                        <input class="input-gold" type="tel" placeholder="請輸入手機號碼">
                    </div> 
                    <div class="box">
                      <input type="checkbox" id="agreebox" name="agreebox" value="ok"/>
                      <label for="agreebox">同意我們的<a href="">使用條款</a>和<a href="">隱私政策</a></label>
                    </div>
                    <div class="signup-article-btn">
                        <router-link to="/Membership" class="btn-gold">註冊為會員</router-link>
                        <router-link to="/login" class="back">回上一頁</router-link>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </template>
  
  <script>
    import breadcrumb from "@/components/breadcrumb.vue"
    import Input from "@/components/Input.vue"
  
    export default {
        name: 'SignupView',
        components: {
            breadcrumb,
            Input
        },
        data() {
            return {
                email: "",
                password: "",
                fonts:[
                    { name: '首頁', source: '/' },
                    { name: '註冊會員', source: 'Signup' }
                ],
            };
        },
    };
  </script>
  <style scoped lang="scss">
  @import "../assets/scss/base/font.scss";
  @import "../assets/scss/base/color.scss";
  @import "../assets/scss/components/btn.scss";
  
  .signup{
      .main{
          @include minW(1200px){
                  width: calc(60% - 100px);
          }
          height: 900px;
          margin: 10%;
          margin: auto;
          // border-radius: 10px;
          // border: 1px solid $front_color_main;
          // box-shadow: 0 8px 10px -5px rgb(198, 198, 198);
  
          form{
              width: 320px;
              margin: auto;
              margin-top: 50px;
              text-align: right;
  
              h2{
                  @include font(32px);
                  color: $color_444;
                  padding: 5px 0;
              }
  
              hr{
                  width: 100%;
                  height: 0.5px;
                  margin-bottom: 50px;
                  background: #BC955C;
                  border: none;
              }
  
              h3{
                  @include font(18px);
                  color: $color_444;
                  font-weight: 300;
                  padding: 15px 0;
              }
  
              p{
                @include font(15px);
                color: #941111;
                text-align: right;
              }
  
              span{
                color: #941111;
              }
  
              input{
                box-sizing: border-box;
                width: 320px;
                padding: 10px 10px;
                border-radius: 10px;
                font-size: 24px;
                margin-bottom: 20px;
                font-size: 16px;
                text-align: left;
                outline:none;
              }
  
              .box{
                  display: flex
              }
  
              #agreebox{
                  width: 20px !important;
              }
  
              label{
                  @include font(15px);
                  color: $color_444;
                  padding: 0 5px;
                  a{
                    color: $front_color_main;
                    &:hover{
                      color: $front_color_active;
                    }
                  }
              }
              
              .signup-article-btn{
                width: 310px;
                margin-top: 60px;
                text-align: left;
              }
              .btn-gold{
                padding: 10px 50px
              }

              .back{
                @include font(15px);
                  font-weight: 300;
                  color:$color_444;
                  text-decoration:none;
                  margin-left: 50px;
            
                  &:hover {
                  text-decoration:none;
                  color:$front_color_main;
                  }
              }
          }   
      }
  }
  </style>
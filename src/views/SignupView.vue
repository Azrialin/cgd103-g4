<template>
    <breadcrumb :fonts="fonts"/>
    <div class="signup" style="max-width: 1200px; margin: auto;">
        <div class="container">
            <div class="main">
                <form action="">
                    <h2>註冊會員</h2>
                    <hr>
                    <p>*為必填欄位</p>
                    <h3>姓名<span>*</span></h3>
                    <Input/>
                    <h3>密碼<span>*</span></h3>
                    <Input/>
                    <h3>電子信箱<span>*</span></h3>
                    <Input/>
                    <h3>電話號碼<span>*</span></h3>
                    <Input/>
                    <div class="box">
                      <input type="checkbox" id="agreebox" name="agreebox" value="ok"/>
                      <label for="agreebox">同意我們的<a href="">使用條款</a>和<a href="">隱私政策</a></label>
                    </div>
                    <button class="btn-gold">註冊為會員</button>
                    <a class="back" href="">回上一頁</a>
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
            };
        },
    };
  </script>
  <style lang="scss">
  @import "../assets/scss/base/font.scss";
  @import "../assets/scss/base/color.scss";
  @import "../assets/scss/components/btn.scss";
  
  .signup{
      .main{
          @include minW(1200px){
                  width: calc(60% - 100px);
          }
          height: 1000px;
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
                  padding: 20px 0;
              }
  
              p{
                @include font(15px);
                color: #941111;
                text-align: right;
              }
  
              span{
                color: #941111;
              }
  
              Input{
                  width: 300px !important;
                  margin-bottom: 20px;
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
  
              button{
                width: 170px !important;
                padding: 10px 10px !important;
                margin-bottom: 100px;
                margin-top: 80px;
                margin-right: 80px;
              }
              .back{
                @include font(15px);
                  font-weight: 300;
                  color:$color_444;
                  text-decoration:none;
            
                  &:hover {
                  text-decoration:none;
                  color:$front_color_main;
                  }
              }
          }   
      }
  }
  </style>
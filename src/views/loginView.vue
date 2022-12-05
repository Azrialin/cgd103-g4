<template>
    <breadcrumb :fonts="fonts"/>
    <div class="login" style="max-width: 1200px; margin: auto;">
        <div class="container">
            <div class="main">
                <form action="">
                    <h2>登入</h2>
                    <hr>
                    <div class="inputfield">
                        <h3 class="title">電子信箱</h3>
                        <input type="email" placeholder="請輸入Email">
                    </div>  
                    <div class="inputfield">
                        <h3 class="title">密碼</h3>
                        <input type="password" placeholder="請輸入密碼">
                    </div>   
                    <router-link to="/Forgotpassword" class="forgotpassword">忘記密碼了嗎?</router-link>
                </form>
                <div class="login-article-btn">
                    <router-link to="/Membership" class="btn-gold_2nd">登入</router-link>
                </div>
                <div class="login-article-signup">
                    <router-link to="/Signup" class="btn-gold">註冊</router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import breadcrumb from "@/components/breadcrumb.vue"
    import Input from "@/components/Input.vue"

    export default {
        name: 'loginView',
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
                    { name: '會員登入', source: 'login' }
                ],
            };
        },
    };
</script>
<style scoped lang="scss" >
@import "../assets/scss/base/font.scss";
@import "../assets/scss/base/color.scss";
@import "../assets/scss/components/btn.scss";

.login{
    .main{
        @include minW(1200px){
                width: calc(60% - 100px);
        }
        height: 580px;
        margin: 10%;
        margin: auto;
        margin-bottom: 150px;
        border-radius: 10px;
        border: 1px solid $front_color_main;
        box-shadow: 0 8px 10px -5px rgb(198, 198, 198);

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

            Input{
                box-sizing: border-box;
                width: 320px;
                padding: 10px 10px;
                border: solid 1px $front_color_main;
                border-radius: 10px;
                font-size: 24px;
                margin-bottom: 20px;
                font-size: 16px;
                text-align: left;
                outline:none;
            }
            .forgotpassword{
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
    .login-article-btn{
        margin-top: 80px;
    }
    .login-article-signup{
        margin-top: 150px;
    }
}

</style>
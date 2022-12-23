<template>
    <breadcrumb :fonts="fonts"/>
    <div class="login" style="max-width: 1200px; margin: auto;">
        <div class="wrap">
            <div class="signup-card">
                <!-- 歡迎回來 -->
                <div class="panel overlay-left">
                    <div class="overlay-card-left">
                        <h3>歡迎回來</h3>
                        <p>快速登入，開始預訂你的新旅程！</p>
                        <img src="../assets/img/Login/signin.svg" class="image" alt="signup">
                        <button class="btn-blue_2nd" @click="isLogin =! isLogin">登入</button>
                    </div>
                </div>
            </div>
            <div class="signin-card" :class="{'isMove' : isLogin == false}">
                <!------------------ 登入頁 ---------------->
                <div class="main form-sign_in">
                    <!-- 註冊 -->
                    <form class="signupform" autocomplete="off" v-show="isLogin == false">
                        <h2 class="title">註冊</h2>
                        <div class="inputfield-right">
                            <div class="signup-name">
                                <label class="title-text">姓名</label>
                                <input class="input-gold" type="text" placeholder="請輸入姓名">
                            </div> 
                            <div class="signup-email">
                                <label class="title-text">電子信箱</label>
                                <input class="input-gold" type="email" placeholder="請輸入Email">
                            </div>  
                            <div class="signup-password">
                                <label class="title-text">密碼</label>
                                <input class="input-gold" type="password" placeholder="半形英數共10碼">
                            </div>   
                            <div class="signup-tel">
                                <label class="title-text">聯絡電話</label>
                                <input class="input-gold" type="tel" placeholder="請輸入手機號碼">
                            </div> 
                        </div>
                        <button type="button" class="btn-blue" @click="signups">註冊為會員</button>
                    </form>
                    <!-- 登入 -->
                    <form class="signinform" autocomplete="off" v-show="isLogin" method="post">
                        <!-- @submit.prevent="login" -->
                        <h2 class="title">登入</h2>
                        <div class="inputfield-left">
                            <div class="signin-email">
                                <label class="title-text">電子信箱</label>
                                <input class="input-gold" name="mem_email" v-model="mem_email" type="email" placeholder="請輸入Email">
                            </div>  
                            <div class="signin-password">
                                <label class="title-text">密碼</label>
                                <input class="input-gold" name="mem_psw" v-model="mem_psw" type="password" placeholder="半形英數共10碼">
                            </div>   
                            <router-link to="/Forgotpassword" class="forgot_password">忘記密碼了嗎?</router-link>
                        </div>
                        <button type="button" class="btn-gold" @click="members">登入</button>
                    </form>
                </div>
                <!---------------- 還不是會員 -------------->
                <div class="panel overlay-right">
                    <div class="overlay-card-right">
                        <h3>還不是會員？</h3>
                        <p>加入JET SPEED，開始預訂你的新旅程！</p>
                        <img src="../assets/img/Login/signup.svg" class="image" alt="signup">
                        <button class="btn-gold_2nd" @click="isLogin =! isLogin">註冊</button>
                    </div>
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
                mem_email: "",
                mem_psw: "",
                errorFlag: false,
                errorMsg: "",
                fonts:[
                    { name: '首頁', source: '/' },
                    { name: '會員登入', source: 'login' }
                ],
                isLogin: true,
            };
        },
        methods: {
            members() {
                let thisvue = this;
                if (thisvue.mem_email == "" || thisvue.mem_psw == ""){
                    // thisvue.errorMsg = "請輸入帳號和密碼";
                    // thisvue.errorFlag = true;
                }else {
                    fetch("http://localhost/cgd103-g4/public/phpfiles/login.php",
                        {
                            method: "post",
                            credentials: "include",
                            body: new URLSearchParams({
                                mem_email: this.mem_email,
                                mem_psw: this.mem_psw,
                            }),
                        }
                    )
                    .then((res) => res.json())
                    .then((json) => {
                        if (json.code == 1) {
                            thisvue.$router.push("/Signin_suc");
                            // sessionStorage.setItem("mem_no", json.mem_no);
                            this.$store.dispatch("setMember", json.mem_no);
                            // this.$store.state.mem_no
                        }
                        else if (json.code == 0) {
                            alert("登入失敗");
                        }

                    });
                }

            },
            signups(){
                this.$router.push("/Signup_suc");
            },
        },
    };
</script>
<style scoped lang="scss" >
@import "../assets/scss/base/font.scss";
@import "../assets/scss/base/color.scss";
@import "../assets/scss/components/btn.scss";

.login{
    display: flex;
    position: relative;
    flex-wrap: wrap;
    justify-content: center;

    .wrap{
        width: 800px;
        height: 700px;
        position: relative;
        overflow: hidden;
    }
   .panel,
   .main{
        width: 400px;
        height: 550px;
        margin-top: 1px;
        margin-bottom: 100px;
   }
   .image{
        width: 60%;
        margin: auto;
        display: block;
   }
   //--------- 登入頁面卡片 ----------
    .signin-card{
        display: flex;
        position: relative;
        transition: .2s;
        // opacity: 0;
        left: 0;
        z-index: 3;
        top: -652px;

        &.isMove{
            transition: .2s;
            opacity: 1;
            left: 400px;
            .main{
                border: 1px solid $back_color_active;
                border-radius: 0 10px 10px 0;
            }
        }

        .main{
            display: flex;
            flex-direction: column;
            justify-content: center;
            border-radius: 10px 0 0 10px;
            background-color: #fff;
            border: 1px solid $front_color_main;
        }
        // ---------- 註冊 ------------
        .signupform{ 
                .title{
                    @include font(32px);
                    color: $color_444;
                    text-align: center;
                    margin: 15px;
                }
                .inputfield-right{
                    width: 260px;
                    margin: auto;
                }
                .title-text{
                    @include font(16px);
                    color: $color_444;
                    font-weight: 300;
                    display: flex;
                    text-align: left;
                    line-height: 2.2;
                    margin-top: 10px;
                }
                .input-gold{
                    display: flex;
                    text-align: left;
                    width: 220px;
                    border: 1px solid $back_color_hover;
                    &:focus{
                        border: 1px solid $back_color_main;
                    }
                }
                .btn-blue{
                    margin: 30px;
                }
        }
        // ---------- 登入 ------------
        .signinform{ 
                .title{
                    @include font(32px);
                    color: $color_444;
                    text-align: center;
                    margin-bottom: 50px;
                }
                .inputfield-left{
                    width: 260px;
                    margin: auto;
                }
                .title-text{
                    @include font(16px);
                    color: $color_444;
                    font-weight: 300;
                    display: flex;
                    text-align: left;
                    line-height: 2.2;
                    margin-top: 10px;
                }
                .input-gold{
                    display: flex;
                    text-align: left;
                    width: 220px;
                }
                .forgot_password{
                    @include font(16px);
                    color: $front_color_main;
                    font-weight: 300;
                    display: flex;
                    justify-content: end;
                    line-height: 2.2;
                    &:hover{
                        color: $front_color_active;
                    }
                }
                .btn-gold{
                    margin-top: 40px;
                }
        }
   }
   .signup-card{
        width: 800px;
        display: flex;
        flex-direction: row-reverse;
        flex-wrap: nowrap;
        justify-content: center;
   }
   // ---------- 歡迎回來 ------------
   .overlay-left{
        position: relative;
        right: 200px;
        border-radius: 10px 0 0 10px;
        background-color: $back_color_active;
        display: flex;
        
        .overlay-card-left{
            margin: auto;
            text-align: center;
            h3{
                @include font(28px);
                color: #fff;
                text-align: center;
                line-height: 2.2;
                margin-bottom: 20px;
            }
            p{
                @include font(16px);
                color: #fff;
                font-weight: 300;
                text-align: center;
                line-height: 2.2;
                margin-bottom: 70px;
            }
            .btn-blue_2nd{
                margin-top: 90px;
            }
        }
   }
   // ---------- 還不是會員 ------------
   .overlay-right{  
        opacity: 1;
        background-color: $front_color_active;
        border: 1px solid $front_color_active;
        border-radius: 0 10px 10px 0;
        display: flex;
        .overlay-card-right{
            margin: auto;
            text-align: center;
            h3{
                @include font(28px);
                color: #fff;
                text-align: center;
                line-height: 2.2;
            }
            p{
                @include font(16px);
                color: #fff;
                font-weight: 300;
                text-align: center;
                line-height: 2.2;
                margin: 10px;
            }
            .btn-gold_2nd{
                margin-top: 40px;
            }
        }
        
   }
}

</style>
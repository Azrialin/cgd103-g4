<template>
    <breadcrumb :fonts="fonts"/>
    <div class="login" style="max-width: 1200px; margin: auto;">
        <div class="wrap">
            <div class="signup-card">
                <!-- 歡迎回來 -->
                <div class="panel overlay-left">
                    <div>
                        <h3>歡迎回來</h3>
                        <p>快速登入，開始預訂你的新旅程！</p>
                        <img src="../assets/img/Login/signin.svg" class="image" alt="signup">
                        <button class="btn-blue_2nd" @click="isLogin =! isLogin">登入</button>
                    </div>
                </div>
                <!-- 還不是會員 -->
                <div class="panel overlay-right">
                    <div>
                        <h3>還不是會員？</h3>
                        <p>加入JET SPEED，開始預訂你的新旅程！</p>
                        <img src="../assets/img/Login/signup.svg" class="image" alt="signup">
                        <button class="btn-gold_2nd" @click="isLogin =! isLogin">註冊</button>
                    </div>
                </div>
            </div>
            <!------------------ 登入頁 ---------------->
            <div class="signin-card" :class="{'isMove' : isLogin == false}">
                <!-- 註冊 -->
                <form class="signupform" autocomplete="off" v-show="isLogin == false">
                    <div>
                        <h2 class="title">註冊</h2>
                    <div class="inputfield-right">
                        <div class="signup-name">
                            <label class="title-text">姓名</label>
                            <input class="input-gold" type="text" v-model="signupName" placeholder="請輸入姓名(最多五個字)">
                        </div> 
                        <div class="signup-email">
                            <label class="title-text">電子信箱</label>
                            <input class="input-gold" type="email" v-model="signupEmail" placeholder="請輸入Email">
                        </div>  
                        <div class="signup-password">
                            <label class="title-text">密碼</label>
                            <input class="input-gold" type="password" v-model="signupPsw" placeholder="半形英數最多10碼" maxlength="10">
                        </div>   
                        <div class="signup-tel">
                            <label class="title-text">聯絡電話</label>
                            <input class="input-gold" type="tel" v-model="signupTel" placeholder="請輸入手機號碼(最多10碼)">
                        </div> 
                        <p>註冊即表示您已同意<span>服務條款</span>及<span>隱私權政策</span></p>
                    </div>
                    <div class="signup_btn">
                        <button type="button" class="btn-blue" @click="signups">註冊為會員</button>
                        <button type="button" class="btn-blue_2nd" @click="isLogin =! isLogin">返回登入頁</button>
                    </div> 
                    <!-- <button type="button" class="btn-blue" @click="signups">註冊為會員</button> -->
                    </div>
                </form>
                    <!-- 登入 -->
                <form class="signinform" autocomplete="off" v-show="isLogin" method="post">
                    <div>
                        <!-- @submit.prevent="login" -->
                        <h2 class="title">登入</h2>
                        <div class="inputfield-left">
                            <div class="signin-email">
                                <label class="title-text">電子信箱</label>
                                <input class="input-gold" name="mem_email" v-model="mem_email" type="email" placeholder="請輸入Email">
                            </div>  
                            <div class="signin-password">
                                <label class="title-text">密碼</label>
                                <input class="input-gold" name="mem_psw" v-model="mem_psw" type="password" placeholder="請輸入密碼" maxlength="16">
                            </div>   
                            <router-link to="/Forgotpassword" class="forgot_password">忘記密碼了嗎?</router-link>
                        </div>
                        <div class="signin_btn">
                            <button type="button" class="btn-gold" @click="members">登入</button>
                            <button type="button" class="btn-gold_2nd" @click="isLogin =! isLogin">註冊</button>
                        </div>  
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import {BASE_URL} from '@/assets/js/common.js'
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
                signupName:"",
                signupEmail:"",
                signupPsw:"",
                signupTel:"",
                // mem_no: this.$store.state.mem_no,
            };
        },
        methods: {
            members() {
                let thisvue = this;
                if (thisvue.mem_email == "" || thisvue.mem_psw == ""){
                    // thisvue.errorMsg = "請輸入帳號和密碼";
                    // thisvue.errorFlag = true;
                }else {
                    // fetch("http://localhost/CGD103_G4_front/public/phpfiles/login.php",
                    fetch(`${BASE_URL}/login.php`,
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
                        // if (json.code == 2) {
                        //     alert("歡迎回來，請重新設定您的登入密碼。");
                        //     thisvue.$router.push("/Resetpsw");
                        // }
                        if (json.code == 1) {
                            thisvue.$router.push("/Signin_suc");
                            // sessionStorage.setItem("mem_no", json.mem_no);
                            this.$store.dispatch("setMember", json.mem_no);
                            // this.$store.state.mem_no
                        }
                        else if(json.code == 0) {
                            alert("登入失敗");
                        }
                    });
                }

            },
            signups(){
                // const signupInfo = {//抓四筆資料
                //     signupName:this.signupName.length > 5,
                //     signupEmail:this.signupEmail,
                //     signupPsw:this.signupPsw,
                //     signupTel:this.signupTel,
                // };
                if( this.signupName ==="" || this.signupEmail ==="" || this.signupPsw ==="" || this.signupTel ===""){//沒有全填
                    alert("註冊資料有少唷~");
                // }else{
                }else if(this.signupName.length >5 || this.signupPsw.length>11 || this.signupTel.length>11){  //全填後，判斷每一格都有符合格式
                    alert("資料格式有誤");
                }else{//符合格式// fetch()送四筆資料
                    fetch(`${BASE_URL}/signUp.php`,
                        {
                            method: "post",
                            credentials: "include",
                            body: new URLSearchParams({
                                signupName: this.signupName,
                                signupEmail: this.signupEmail,
                                signupPsw: this.signupPsw,
                                signupTel: this.signupTel,
                            }),
                        }
                    )
                        .then(res=> {return res.json()
                        })
                        .then(res=>{
                            if(res.code == 0){
                                alert("有人註冊囉~")
                            }else{
                                alert("成功加入會員~")
                                this.$store.dispatch("setMember", res.mem_no);
                                this.$router.push("/Signup_suc");
                            }
                        })
                    // this.$store.dispatch("setMember", json.mem_no);
                }
            }
        },
    };
</script>
<style scoped lang="scss" >
@import "../assets/scss/base/font.scss";
@import "../assets/scss/base/color.scss";
@import "../assets/scss/components/btn.scss";

.login{
    width: fit-content;
    overflow: hidden;
    padding: 0 40px;
    @include maxW(1200px){
        padding: 0;
    }
    .wrap{
        position: relative;
        margin: auto;
        margin-bottom: 80px;
        @include minW(1200px){
            width: 800px;
        }
        .panel, .signupform, .signinform{
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 550px;
        }
        .signup-card{
            display: flex;
            @include maxW(1200px){
                position: relative;
            }
            @include minW(1200px){
                width: 800px;
            }
            // ---------- 歡迎回來 ------------
            .overlay-left{
                border-radius: 10px 0 0 10px;
                border: 1px solid $back_color_active;
                background-color: $back_color_active;
                text-align: center;
                @include maxW(1200px){
                    display: none;
                }
                @include minW(1200px){
                    width: 400px;
                }
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
                    margin-top: 110px;
                }
            }
            // ---------- 還不是會員 ------------
            .overlay-right{  
                opacity: 1;
                border-radius: 0 10px 10px 0;
                border: 1px solid $front_color_active;
                background-color: $front_color_active;
                margin: auto;
                text-align: center;
                @include maxW(1200px){
                    position: relative;
                    display: none;
                }
                @include minW(1200px){
                    width: 400px;
                }
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
                    margin-top: 50px;
                }
            }
        }
           //--------- 登入頁面卡片 ----------
        .signin-card{
            transition: .2s;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 3;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background-color: #fff;
            @include minW(1200px){
                width: 400px;
            }
            @include maxW(1200px){
                position: relative;
                &.isMove{
                    left: 0;
                }
            }
            &.isMove{
                border-radius: 0 10px 10px 0;
                border: 1px solid $back_color_main;
                transition: .2s;
                opacity: 1;
                left: 398px;
                @include maxW(1200px){
                    left: 0;
                    border: none;
                }
                @include minW(1200px){
                    width: 400px;
                }
            }
            // ---------- 註冊 ------------
            .signupform{
                border-radius: 0 10px 10px 0;
                @include maxW(1200px){
                    position: relative;
                    width: 100%;
                    padding: 0;
                }
                .title{
                    @include font(32px);
                    color: $color_444;
                    text-align: center;
                    margin: 15px;
                }
                .inputfield-right{
                    padding: 0 30px;
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
                    width: 100%;
                    max-width: calc(100% - 40px);
                    border: 1px solid $back_color_hover;
                    &:focus{
                        border: 1px solid $back_color_main;
                    }
                }
                p{
                    @include font(15px);
                    color: $color_888;
                    text-align: center;
                    margin-top: 15px;
                    font-weight: 300;
                }
                span{
                    @include font(15px);
                    color: $back_color_active;
                    text-align: center;
                    // margin: 15px;
                    &:hover{
                        color: $back_color_hover;
                        cursor: pointer;
                    }
                }
                .signup_btn{
                    display: flex;
                    flex-wrap: nowrap;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                }
                .btn-blue{
                    margin-top: 20px;
                    @include maxW(1200px){
                        width: 100%;
                        max-width: calc(100% - 60px);
                    }
                    @include minW(1200px){
                        margin-bottom: 30px;
                        margin-top: 20px;
                    }
                }
                .btn-blue_2nd{
                    @include maxW(1200px){
                        margin-top: 20px;
                        width: 100%;
                        max-width: calc(100% - 60px);
                    }
                    @include minW(1200px){
                        display: none;
                    }
                }
            }
            // ---------- 登入 ------------
            .signinform{
                border: 1px solid $front_color_main;
                border-radius: 10px 0 0 10px;
                @include maxW(1200px){
                    position: relative;
                    border-radius: 10px;
                }
                .title{
                    @include font(32px);
                    color: $color_444;
                    text-align: center;
                    margin-bottom: 50px;
                }
                .inputfield-left{
                    margin: auto;
                }
                .signin-email, .signin-password{
                    padding: 0 30px;
                    text-align: left;
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
                    width: 100%;
                    max-width: calc(100% - 40px);
                }
                .forgot_password{
                    @include font(16px);
                    color: $front_color_main;
                    font-weight: 300;
                    display: flex;
                    justify-content: end;
                    line-height: 2.2;
                    padding: 5px 30px;
                    &:hover{
                        color: $front_color_active;
                    }
                }
                .signin_btn{
                    @include maxW(1200px){
                        display: flex;
                        flex-wrap: nowrap;
                        flex-direction: column;
                        justify-content: center;
                        align-items: center;
                    }
                }
                .btn-gold{
                    margin-top: 40px;
                    @include maxW(1200px){
                        width: 100%;
                        max-width: calc(100% - 60px);
                    }
                }
                .btn-gold_2nd{
                    @include maxW(1200px){
                        width: 100%;
                        max-width: calc(100% - 60px);
                        margin-top: 15px;
                    }
                    @include minW(1200px){
                        display: none;
                    }
                }
            }
        }
    }
   .image{
        width: 60%;
        margin: auto;
        display: block;
    }
}

</style>
<template>
    <breadcrumb :fonts="fonts"/>
    <div class="forgotpassword" style="max-width: 1200px; margin: auto;">
        <div class="container">
            <div class="main">
                <form action="">
                    <h2>重設密碼</h2>
                    <hr>
                    <div class="inputfield">
                        <h3 class="title">設定新密碼</h3>
                        <input class="input-gold" v-model="password_1" type="password" placeholder="半形英數最多10碼" maxlength="10">
                    </div> 
                    <div class="inputfield">
                        <h3 class="title">確認密碼</h3>
                        <input class="input-gold" v-model="password_2" type="password" placeholder="再次輸入您的密碼" maxlength="10">
                    </div> 
                    <!-- <button class="btn-gold_2nd" @click="logins">取消</button> -->
                    <button class="btn-gold" type="button" @click="members">確認變更</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import breadcrumb from "@/components/breadcrumb.vue"
    import Input from "@/components/Input.vue"

    export default {
        name: 'forgotpassword',
        components: {
            breadcrumb,
            Input
        },
        data() {
            return {
                password_1: "",
                password_2: "",
                fonts:[
                    { name: '首頁', source: '/' },
                    { name: '會員登入', source: 'login' },
                    { name: '重設密碼', source: 'resetpsw' }
                ],
            };
        },
        methods: {
            members() {
                if(this.password_1 === this.password_2 && this.password_1 != ''){
                // fetch("http://localhost/CGD103_G4_front/public/phpfiles/resetPsw.php",{
                fetch(`${BASE_URL}/resetPsw.php`,{
                    method:'POST', body:new URLSearchParams({
                    mem_no:this.mem_no,
                    mem_psw:this.mem_psw,
                })})
                // fetch("http://localhost/CGD103_G4_front/public/phpfiles/forgotPsw.php?mem_email="+this.mem_email)
                .then((res) => res.json())
                .then((result)=> {
                    alert(result.msg);
                    setTimeout(() => {
                        this.$router.push("/Signin_suc");
                    }, 600);
                })
                }else{
                    alert("兩次輸入的密碼不一致，請確定後重新輸入。");
                }
            },
            logins(){
                this.$router.push("/login");
            },
        },
    };
</script>
<style scoped lang="scss">
@import "../assets/scss/base/font.scss";
@import "../assets/scss/base/color.scss";
@import "../assets/scss/components/btn.scss";

.forgotpassword{
    .main{
        @include minW(1200px){
                width: calc(50% - 100px);
        }
        height: 500px;
        margin: 10%;
        margin: auto;
        margin-top: 80px;
        margin-bottom: 100px;
        border-radius: 10px;
        border: 1px solid $front_color_main;
        box-shadow: 0 8px 10px -5px rgb(223, 221, 221);

        form{
            width: 70%;
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
                margin-bottom: 30px;
                background: #BC955C;
                border: none;
            }

            h3{
                @include font(18px);
                color: $color_444;
                font-weight: 300;
                padding: 15px 0;

                span{
                @include font(18px);
                color: #941111;
                }
            }

            input{
                box-sizing: border-box;
                width: 100%;
                padding: 10px 10px;
                border-radius: 10px;
                font-size: 24px;
                margin-bottom: 20px;
                font-size: 16px;
                text-align: left;
                outline:none;
            }

            // .btn-gold_2nd{
            //     width: 30%;
            //     padding: 10px 15px;
            //     margin-right: 30px;
            //     margin-top: 40px;
            // }

            .btn-gold{
                // width: 100%;
                padding: 10px 15px;
                margin-top: 30px;
                text-align: center;
                @include maxW(1200px){
                        width: 100%;
                        // max-width: calc(100% - 60px);
                    }
            }
        }
    }
}

</style>
<template>
    <breadcrumb :fonts="fonts"/>
    <div class="forgotpassword" style="max-width: 1200px; margin: auto;">
        <div class="container">
            <div class="main">
                <form action="">
                    <h2>忘記密碼</h2>
                    <hr>
                    <div class="inputfield">
                        <h3 class="title">請輸入你的<span>電子信箱</span>以搜尋帳號。</h3>
                        <input class="input-gold" type="email" placeholder="請輸入Email">
                    </div> 
                    <button class="btn-gold_2nd" @click="logins">取消</button>
                    <button class="btn-gold">確認送出</button>
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
                email: "",
                password: "",
                fonts:[
                    { name: '首頁', source: '/' },
                    { name: '會員登入', source: 'login' },
                    { name: '忘記密碼', source: 'forgotpassword' }
                ],
            };
        },
        methods: {
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
        height: 450px;
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
                margin-bottom: 50px;
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

            .btn-gold_2nd{
                width: 30%;
                padding: 10px 15px;
                margin-right: 30px;
                margin-top: 40px;
            }

            .btn-gold{
                width: 50%;
                padding: 10px 15px;
                margin-top: 40px;
            }
        }
    }
}

</style>
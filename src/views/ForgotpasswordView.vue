<template>
    <breadcrumb :fonts="fonts"/>
    <div class="forgotpassword" style="max-width: 1200px; margin: auto;">
        <div class="container">
            <div class="main">
                <form action="">
                    <h2>忘記密碼</h2>
                    <hr>
                    <h3>請輸入你的<span>電子信箱</span>以搜尋帳號。</h3>
                    <Input/>
                    <button class="btn-gold_2nd">取消</button>
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
            };
        },
    };
</script>
<style lang="scss">
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
        margin-bottom: 50px;
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

                span{
                @include font(18px);
                color: #941111;
                }
            }

            Input{
                width: 300px !important;
                margin-bottom: 30px;
            }

            .btn-gold_2nd{
                width: 100px;
                padding: 10px 15px;
                margin-right: 30px;
                margin-top: 40px;
            }

            .btn-gold{
                width: 150px;
                padding: 10px 15px;
                margin-top: 40px;
            }
        }
    }
}

</style>
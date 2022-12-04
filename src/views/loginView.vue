<template>
    <breadcrumb :fonts="fonts"/>
    <div class="login" style="max-width: 1200px; margin: auto;">
        <div class="container">
            <div class="main">
                <form action="">
                    <h2>登入</h2>
                    <hr>
                    <h3>電子信箱</h3>
                    <Input/>
                    <h3>密碼</h3>
                    <Input/>
                    <a href="/">忘記密碼了嗎?</a>
                </form>
                <button class="btn-gold_2nd">登入</button>
            </div>
            <button class="btn-gold">註冊</button>
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
            };
        },
    };
</script>
<style lang="scss">
@import "../assets/scss/base/font.scss";
@import "../assets/scss/base/color.scss";
@import "../assets/scss/components/btn.scss";

.login{
    .main{
        @include minW(1200px){
                width: calc(60% - 100px);
        }
        height: 610px;
        margin: 10%;
        margin: auto;
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
                padding: 20px 0;
            }

            Input{
                width: 300px !important;
                margin-bottom: 20px;
            }
            a{
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
    button{
        margin-top: 60px;
    }
    .btn-gold{
        margin-bottom: 60px;
    }
}

</style>
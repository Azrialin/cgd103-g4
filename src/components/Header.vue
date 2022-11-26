<template>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <div class="container">
        <div class="h_logo">
            <img src="../assets/img/LOGO.svg" alt="">
        </div>
        <ul class="h_list">
            <li v-for="item in items" :key="item">
                <a href="">{{item}}</a>
            </li>
        </ul>
        <div class="h_feature">
            <a href=""><i class="fa-regular fa-user"></i></a>
            <a href=""><i class="fa-solid fa-cart-shopping"></i></a>
        </div>
    </div>
</template>
<script>

export default {
    props: {

    },
    data(){
        return{
            items:["列車介紹","行程介紹","預約報名","消息專區","消息專區","關於我們"],
        }
    }
}
</script>
<style lang="scss" scoped>
@import "../assets/scss/base/base.scss";


@import "../assets/scss/base/color.scss";

    .container{
        font-family: 'Noto Serif TC', '微軟正黑體';
        box-sizing: border-box;
        padding: 15px 30px;
        width: 100%;
        display: flex;
        justify-content: space-between;
        .h_logo{
            display: flex;
            align-items: center;
        }
        .h_list{
            padding: 0;
            width: 100%;
            list-style: none;
            display: flex;
            justify-content: space-between;
            max-width: 852px;
            a{
                text-decoration: none;
                color: #333;
                transition: 0.5s;
                &:hover{
                    color: $front_color_hover;
                }
            }
        }
        .h_feature{
            display: flex;
            align-items: center;
            justify-content: center;
            a{
                text-decoration: none;
                color: $color_444;
                i{
                    font-size: 18px;
                    padding: 10px;
                    transition: 0.5s;
                    &:hover{
                        color: $front_color_hover;
                    }
                }
            }
        }
    }
</style>
<template>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <div class="container">
        <div class="h_logo">
            <a href=""><img src="../assets/img/LOGO.svg" alt=""></a>
        </div>
        <ul class="h_list" :class="toggle?'show':''">
            <li v-for="item in items" :key="item">
                <a href="">{{item}}</a>
            </li>
        </ul>
        <div class="h_feature">
            <a href=""><i class="fa-regular fa-user"></i></a>
            <a href=""><i class="fa-solid fa-cart-shopping"></i></a>
            <div id="hambur" class="hambur" @click="toggle = !toggle">
                <div class="hambox"></div>
                <div class="hambox"></div>
            </div>
        </div>
    </div>
</template>
<script>
// let hambur = document.querySelector("#hambur");
// console.log(ham);



export default {
    props: {

    },
    data(){
        return{
            items:["列車介紹","行程介紹","預約報名","消息專區","消息專區","關於我們"],
            toggle: false,
        }
    }
}
</script>
<style lang="scss" scoped>
@import "../assets/scss/base/base.scss";
@import "../assets/scss/base/color.scss";


// *{
//     outline: solid 1px;
// }
.container {
        position: relative;
        font-family: 'Noto Serif TC', '微軟正黑體';
        box-sizing: border-box;
        padding: 15px 30px;
        width: 100%;
        display: flex;
        justify-content: space-between;
        .h_logo { 
            display: flex;
            align-items: center;
    }
    .h_list {
        display: none;
    }
    .h_list.show{
        left: 0;
        position: absolute;
        top: 100%;
        padding: 0;
        width: 100%;
        list-style: none;
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
        gap: 25px;
        a{
            text-decoration: none;
            color: $color_444;
            &:hover{
                    color: $front_color_hover;
                }
        }
    }
    .h_feature {
        width: 112px;
        display: flex;
        align-items: center;
        justify-content: center;
        .hambur {
            
            cursor: pointer;
            padding: 10px;
            width: 25px;
            height: 25px;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            .hambox {
                transition: 0.5s;
                width: 100%;
                height: 2px;
                background-color: $color_444;
            }
            &:hover .hambox{
                background-color: $front_color_hover;
            }
        }
        a {
            text-decoration: none;
            color: $color_444;
            i {
                font-size: 18px;
                padding: 10px;
                transition: 0.5s;
                &:hover {
                    color: $front_color_hover;
                }
            }
        }
    }
}
    
@media screen and (min-width: 1024px) {
    .container {
        .h_list {
            padding: 0;
            width: 100%;
            list-style: none;
            display: flex;
            justify-content: space-evenly;
            // max-width: 852px;
            a {
                text-decoration: none;
                color: #333;
                transition: 0.5s;
                &:hover{
                    color: $front_color_hover;
                }
            }
        }
        .h_feature {
            display: flex;
            align-items: center;
            justify-content: center;
            .hambur{
                display: none;
            }
        }
    }
}
</style>
<template>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <header class="container">
        <nav>
            <h1 class="h_logo">
                <a href="/">
                    <img src="../assets/img/LOGO.svg" alt="">
                </a>
            </h1>
                <ul class="h_list" :class="toggle?'show':''">
                    <li v-for="item in items" :key="item">
                        <router-link  class="go" :to ="{path:item['sourc']}">{{item['name']}}</router-link>
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
        </nav>
    </header>
</template>
<script>
// let hambur = document.querySelector("#hambur");
// console.log(ham);



export default {
    props: {

    },
    data(){
        return{
            items:[{name:'列車介紹', sourc:'train'},{name:'行程介紹',sourc:'travel'},{name:'預約報名',sourc:'sign'},{name:'消息專區',sourc:'news'},{name:'線上商城',sourc:'shop'},{name:'關於我們',sourc:'about'}],
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
    position: fixed;
    top: 0;
    z-index: 100;
    width: 100%;
    height: 70px;
    background-color: #fff;
    box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.05);
    nav {
        display: flex;
        position: relative;
        font-family: 'Noto Serif TC', '微軟正黑體';
        box-sizing: border-box;
        padding: 15px 30px;
        width: 100%;
        max-width: 1200px;
        margin: auto;
        height: 70px;
        justify-content: space-between;
        align-items: center;
        .h_logo { 
            display: flex;
            align-items: center;
        }
        .h_list {
            transition: opacity 0.3s,left 0s 0.3s;
            opacity: 0;
            left: -100%;
            position: absolute;
            top: 100%;
            padding: 0;
            width: 100%;
            list-style: none;
            flex-direction: column;
            justify-content: space-evenly;
            background-color: #fff;
            li {
                padding: 40px;
            }
            a{
                text-decoration: none;
                color: $color_444;
                &:hover{
                        color: $front_color_hover;
                    }
            }
        }
        .h_list.show{
            transition: opacity 0.3s,left 0s;
            height: 100vh;
            opacity: 1;
            left: 0px;
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
                    transition: 0.3s;
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
                    transition: 0.3s;
                    &:hover {
                        color: $front_color_hover;
                    }
                }
            }
        }
    }
}
    
@media screen and (min-width: 1024px) {
    .container {
        nav{
            .h_list {
                padding: 0;
                width: 100%;
                max-width: 852px;
                list-style: none;
                display: flex;
                height: 70px;
                justify-content: space-evenly;
                align-items: center;
                position: initial;
                opacity: 1;
                flex-direction: row;
                li {
                padding: 0px;
                }
                a {
                    text-decoration: none;
                    color: #333;
                    transition: 0.3s;
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
}
</style>
<template>
    <div class="pro-content">
        <breadcrumb :fonts="fonts"/>
        <div class="pro-main">
            <div class="pro-pic">
                <img src="../assets/img/products/pro-b.jpg" alt="">
            </div>
            <div class="pro-txt">
                <h2 class="pro-txt-title">福砂屋九州長崎蛋糕</h2>
                <div class="pro-price">販售價格:
                    <span class="pro-price-num">$460</span>
                </div>
                <div class="pro-price">購買數量:
                    <span class="pro-amount-btn">
                        <input type="button" class="btnMinus" value="-">
                        <input type="text" class="qty" size="4" value="0">
                        <input type="button" class="btnPlus" value="+">	 
                    </span>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    import Header from "@/components/Header.vue"
    import breadcrumb from "@/components/breadcrumb.vue"

    import Pagination from "@/components/pagination/Pagination.vue"

    export default {
        name: "ShopContent",
        components:{
            Header,
            breadcrumb,
            Pagination,
        },
        data(){
          return{
            fonts:[{name:'首頁',source:'/'},{name:'線上商城',source:'shop'},
            {name:'商品詳情',source:'shopcontent'}], 
          }
        }
    }
</script>

<style lang="scss" scoped>
@import "../assets/scss/base/font.scss";
@import "../assets/scss/base/color.scss";
@import "../assets/scss/layout/grid.scss";
    .pro-content{
        width: 100%;
        margin: auto;
        max-width: 1200px;
        .pro-main{
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            .pro-pic{
                width: 100%;
                img{
                    width: 100%;
                }
            }
            .pro-txt{
                width: 100%;
                .pro-txt-title{
                    @include font(32px);
                    letter-spacing: 0px;
                    margin: 15px;
                }
                .pro-price{
                    @include font(18px);
                    margin: 20px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
                .pro-price-num{
                    @include font(28px);
                    margin: auto;
                }
                .pro-amount-btn{
                    width: 60%;
                    display: flex;
                    justify-content: space-evenly;
                    align-items: center;
                    margin: auto;
                    font-size: 18px;
                    border: 1px solid $front_color_main;
                    border-radius: 10px;
                    input{
                        text-align: center;
                        border: none;
                        background-color: transparent;
                        font-size: 18px;
                        margin: 7px 5px;
                        .btnMinus & .btnPlus{
                            text-align: center;
                            font-size: 25px;
                            
                        }
                    }
                }
            }
        }
    }






@media screen and (max-width:768px){
    .pro-main{
        flex-direction: column;
    }
}


@media screen and (min-width: 769px){



}
</style>

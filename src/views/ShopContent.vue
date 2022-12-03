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
                <div class="pro-btn">
                    <button class="pro-btn-btn btn-gold_2nd $clr_gold_L1" @click="cart">
                        <i class="fa-solid fa-plus"></i>加入購物車
                    </button>
                    <button class="pro-btn-btn btn-gold" @click="buy">
                        <i class="fa-solid fa-bag-shopping"></i>立即購買
                    </button>
                </div>
            </div>
            <div class="produce-intro">
                <div class="pro-produce">
                    採用精選雞蛋、砂糖、糖漿和小麥粉的簡單材料，全程不用攪拌機，完全靠師傅手感攪拌，製作出口味道地且香甜綿潤的蛋糕點心。長崎蛋糕底砂糖結晶顆粒的粗糖，是攪拌蛋糕材料時留下來的，也是福砂屋長崎蛋糕的特徵。
                    <span class="produce-more">
                        作為長崎蛋糕的傑作，特製五三燒長崎蛋糕的風味更濃，且香氣更濃郁。它由技術熟練的糕點師傅以高超技術製成，生量數量少，是福砂屋的特製長崎蛋糕，廣受長崎 蛋糕饕客們喜愛。
                    </span>
                </div>

            </div>
            <div class="pro-pro-pic">
                <div class="pro-pic-big">
                    <img src="../assets/img/products/pro-b-1.jpg" alt="">
                </div>
                <div class="pro-pic-big">
                    <img src="../assets/img/products/pro-b-2.jpg" alt="">
                </div>
            </div>
            <div class="pro-warn">
                <h3>訂購須知</h3>
                <ul class="pro-warn-txt">
                    <li><i class="fa-solid fa-circle-dot"></i>
                        付款方式：信用卡付款
                    </li>
                    <li><i class="fa-solid fa-circle-dot"></i>
                        下訂後3~5個工作日內出貨，遇假日順延
                    </li>
                    <li><i class="fa-solid fa-circle-dot"></i>
                        商品為生鮮料理，恕不接受預購
                    </li>
                    <li><i class="fa-solid fa-circle-dot"></i>
                        在偏遠島嶼的情況下，我們可能無法送貨到商店指南中指定的地區以外的地區。
                    </li> 
                    
                </ul>
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
        },
        methods: {
            cart(){
                this.$router.push('/shopcart')
            },
            buy(){
                this.$router.push('/shoppayment')
            }
        },
    }
</script>

<style lang="scss" scoped>
@import "../assets/scss/base/font.scss";
@import "../assets/scss/base/color.scss";
@import"../assets/scss/components/btn.scss";
@import "../assets/scss/layout/grid.scss";
    .pro-content{
        width: 100%;
        margin: auto;
        max-width: 1200px;
        .pro-main{
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            // outline: 1px solid #fa0;
            .pro-pic{
                // outline: 1px solid red;
                img{
                    width: 100%;
                }
            }
            .pro-txt{
                // outline: 1px solid red;
                color: $clr_gray_L1;
                .pro-txt-title{
                    letter-spacing: 0px;
                    margin: 15px;
                    // outline: 1px solid blue;
                }
                .pro-price{
                    margin: 20px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
                .pro-price-num{
                    margin: auto;
                }
                .pro-amount-btn{
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    margin: auto;
                    border: 1px solid $front_color_main;
                    border-radius: 10px;
                    input{
                        text-align: center;
                        border: none;
                        background-color: transparent;
                        margin: 7px 5px;
                        .btnMinus & .btnPlus{
                            text-align: center;
                            
                            
                        }
                    }
                }
            }
            .pro-btn{
                display: flex;
                flex-wrap: wrap;
                width: 99%;
                margin: auto;
                justify-content: flex-start;
                // text-align: center;
                margin: 20px 0px;
                // margin: auto;
                .pro-btn-btn{
                    margin: 0px 10px; 
                    // width: 46%;
                }
            }
            .produce-intro{
                display: flex;
                justify-content: center;
                
                .pro-produce{
                    color: $clr_gray_L2;
                    margin: 20px 0px 30px 0px;
                    line-height: 1.5;
                }
            }
            .pro-pro-pic{
                width: 100%;
                display: flex;
                flex-wrap: wrap;
                .pro-pic-big{
                    margin: 20px;
                    img{
                        width: 100%;
                    }
                }
            }
            .pro-warn{
                margin: auto;
                h3{
                    width: 100%;
                    margin: 20px 0px;
                    color: $clr_gray_L2;
                    text-align: center;
                    // outline: 1px solid red;
                }
                .pro-warn-txt{
                    text-align: left;
                    color: $clr_gray_L2;
                    li{
                        margin: 10px 0px;
                    }
                    .fa-circle-dot{
                        color: $clr_gold_L2;
                    }
                }
            }

        }
    }






@media screen and (max-width:768px){
    .pro-main{
        flex-direction: column;
        .pro-pic{
            width: 100%;
        }
        .pro-txt{
            width: 100%;
            .pro-txt-title{
                @include font(32px);
            }
            .pro-price{
                @include font(18px);
            }
            .pro-price-num{
                @include font(28px);
            }
            .pro-amount-btn{
                width: 60%;
                input{
                    width: 50%;
                    @include font(18px);
                    .btnMinus & .btnPlus{
                        @include font(24px);
                    }
                }
            }
        }
        .pro-produce{
            width: 100%;
            @include font(18px);
            .produce-more{
                display: none;
            }

        }
        .pro-pic-big{
            width: 100%;
        }
        .pro-warn{
            h3{
                @include font(20px)
            }
            .pro-warn-txt{
                @include font(14px)
            }
        }
    }
}


@media screen and (min-width: 769px){
    .pro-pic{
        width: 50%;
    }
    .pro-txt{
        width: 45%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        margin-left: 50px;
        .pro-txt-title{
            @include font(38px);
        }
        .pro-price{
            @include font(24px);
        }
        .pro-price-num{
            @include font(34px);
        }
        .pro-amount-btn{
            width: 50%;
            input{
                width: 50%;
                @include font(26px);
                .btnMinus & .btnPlus{
                    @include font(30px);
                }
            }
        }
    }
    .pro-produce{
        width: 70%;
        @include font(24px);
    }
    .pro-pic-big{
        width: 45%;
    }
    .pro-warn{
        h3{
            @include font(32px)
        }
        .pro-warn-txt{
            @include font(24px)
        }
    }


}
</style>

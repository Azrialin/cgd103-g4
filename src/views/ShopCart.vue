<template>
    <div class="cart">
        <div class="process">
            <stepbar/>
        </div>
        <div class="cart-title">
            <p class="item-title">商品資訊</p>
            <p></p>
            <p class="item-price">單價</p>
            <p>數量</p>
            <p>小計</p>
            <p></p>
        </div>
        <hr>
        <div class="shopcart-item" v-for="item in list" :key="item.id" col-sm-12 >
            <cartitem :img="item.img" :title="item.title" :price="item.price" :count="item.count" :total="item.total" />
            <span class="del" @click="delitem(index)">
                <i class="fa-regular fa-trash-can"></i>
            </span>
        </div>
        <hr>
        <div class="cart-total">
            <p>總計：$1060</p>
        </div>
        <div class="cart-btn">
            <button class="pro-btn-btn btn-gold_2nd $clr_gold_L1" @click="shopping">
                繼續購物
            </button>
            <button class="pro-btn-btn btn-gold" @click="next">
                下一步
            </button>
        </div>

        

    </div>
</template>

<script>
    import cartitem from "@/components/CartItem.vue"
    import stepbar from "@/components/stepbar.vue"
    export default {
        name: "ShopCart",
        components:{
            cartitem,
            stepbar,
        },
        data(){
            return{
                
                list:[
                    {
                        id:1,
                        img: require(`@/assets/img/products/pro4.jpg`),
                        title:"長崎蛋糕",
                        price:460,
                    },
                    {
                        id:2,
                        img: require(`@/assets/img/products/pro2.jpg`),
                        title:"曲奇餅乾",
                        price:280,
                    },
                    {
                        id:3,
                        img: require(`@/assets/img/products/pro3.jpg`),
                        title:"透明醬油",
                        price:320,
                    },
                ],
            }
        },
        methods: {
            delitem: function(index){
                this.list.splice(index,1)
            },
            shopping(){
                this.$router.push('/shop')
            },
            next(){
                this.$router.push('/shoppayment')
            },
            
        },
        
    }
</script>

<style lang="scss" scoped>
@import "../assets/scss/base/font.scss";
@import "../assets/scss/base/color.scss";
@import "../assets/scss/layout/grid.scss";
@import "../assets/scss/components/btn.scss";

.cart{
    .cart-title{
        display: flex;
        justify-content:space-between;
        margin: auto;  
        // outline: 1px solid red;
    }
    hr{
        width: 80%;
        margin: auto;
        margin-top: 10px;
        color: $clr_gold_L1;
    }
    .shopcart-item{
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        
    }
    .cart-total{
        p{
            text-align: end;

        }
    }   
    .cart-btn{
        display: flex;
        flex-wrap: wrap;
        // width: 99%;
        margin: auto;
        justify-content: flex-end;
        // text-align: center;
        margin: 20px 0px;
        // margin: auto;
        .pro-btn-btn{
            // width: 90%;
            margin: 0px 10px; 
            // width: 46%;
        }
    }

}




@media screen and (max-width:768px){
    .cart{
        .cart-title{
            width: 90%;
            p{
                @include font(16px);
                
            }
            
            .item-price{
                display: none;
            }
        }
        hr{
            width: 97%;
        }
        .shopcart-item{
            .del{
                margin: 0px 5px;
            }
        }
        .cart-total{
            width: 85%;
            @include font(16px);
            margin: 20px 0px;
        }
        .cart-btn{
            width: 100%;
            .pro-btn-btn{
                @include font(12px);
                text-align: center;
            }
        }
    }
}


@media screen and (min-width: 769px){
    .cart{
        .cart-title{
            // padding-right: 40px;
            width: 70%;
            justify-content: space-between;
            p{
                @include font(24px);
                
            }
            .item-title{
                margin-right: 50px;
            }
        }
        .shopcart-item{
            .del{
                margin: 0px 10px;
            }
        }
        .cart-total{
            width: 77%;
            @include font(24px);
            margin: 20px 0px;
        } 
        .cart-btn{
            width: 90%;
            margin: 40px 0px;
            .pro-btn-btn{
                // @include font(12px);
                text-align: center;
            }
        }
    }
    
}
</style>
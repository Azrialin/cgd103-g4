<template>
    <div class="cart">
        <div class="process">

        </div>

        <div class="cart-title">
            <p class="item-title">商品資訊</p>
            <p></p>
            <p class="item-price">單價</p>
            <p>數量</p>
            <p>總計</p>
            <p></p>
        </div>
        <hr>
        <div class="shopcart-item" v-for="item in list" :key="item.id" col-sm-12 >
            <cartitem :img="item.img" :title="item.title" :price="item.price" :count="item.count" :total="item.total" />
            <span class="del" @click="delitem(index)">
                <i class="fa-regular fa-trash-can"></i>
            </span>
        </div>

    </div>
</template>

<script>
    import cartitem from "@/components/CartItem.vue"
    export default {
        name: "ShopCart",
        components:{
            cartitem
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
        }
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
    }
    
}
</style>
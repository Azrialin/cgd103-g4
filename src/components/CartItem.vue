<template>
    <div class="cart-item">
        <div class="cart-pic">
            <img :src="img">
        </div>
        <div class="cart-title">
            <p>{{title}}</p>
        </div>
        <div class="cart-price">
            <p>${{price}}</p>
        </div>
        <div class="cart-amount">
            <button @click="reduceCount" class="minus">-</button>
            <input type="text" v-model.number="count" class="input" size="2">
            <button @click="addCount" class="minus">+</button>
        </div>
        <div class="cart-sum">
            <p>${{total}}</p>
        </div>
        
    </div>
</template>


<script>
export default {
    props:{
        img:String,
        title:String,
        price:Number,
        total:Number,
        
    },
    data(){
        return{

        }
    },
    methods: {
        addCount(){
            this.count+=1
            this.sumTotal()
        },
        reduceCount(){
            if(this.count<=0) return
            this.count -=1
            this.sumTotal()
        },
        sumTotal(){
            this.total=this.count*this.price
        }
    },

}
</script>


<style lang="scss" scoped>
@import "../assets/scss/base/font.scss";
@import "../assets/scss/base/base.scss";
@import "../assets/scss/base/color.scss";
@import "../assets/scss/components/btn.scss";
.cart-item{
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    @include font(20px);
    color:$clr_gray_L1;
    .cart-pic{
        img{
            width: 30%;
        }
    }
    .cart-amount{
        border: 1px solid $clr_gold_L1;
        border-radius: 10px;
        button{
            border: none;
            background-color: transparent;
        }
        input{
            border: none;
            background-color: transparent;
        }
    }
    

}





</style>

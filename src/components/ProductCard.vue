<template>
<div class="card">
    <div class="card-pic">
        <router-link to="#">
            <img :src="img">
        </router-link>
    </div>
    <div class="card-txt">
        <router-link to="#">
            <h4 class="card-title">{{title}}</h4>
            <p class="card-price">${{price}}</p>
        </router-link>
    </div>
</div>
</template>

<style lang="scss" scoped>
@import "../assets/scss/base/font.scss";
@import "../assets/scss/base/base.scss";
@import "../assets/scss/base/color.scss";

.card{
    width: 90%;
    margin: 10px;
    a{
        text-decoration: none;
    }
    border: 1px solid $front_color_main;
    border-radius: 5px;
    .card-pic{
        overflow: hidden;
        padding: 15px;
        margin: auto;
        border-radius: 5px;
        img{
            border-radius: 5px;
            width: 100%;
            height: 100%;
            
        }
    }
    .card-txt{
        padding: 0px 15px;
        text-align: left;
        .card-title{
            @include font(16px);
            letter-spacing: 0px;
        }
        .card-price{
            @include font(16px);
            margin: 7px 0px;
        }
    }
}

</style>

<script>
export default {
    props:{
        img:String,
        title:String,
        price:Number,
        
    }
}
</script>
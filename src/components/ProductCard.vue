<template>
<div class="card">
    <div class="card-pic">
        <router-link to="#">
            <img src="../assets/img/products/pro.jpg" alt="">
        </router-link>
    </div>
    <div class="card-txt">
        <router-link to="#">
            <h4 class="card-title">九州干貝醬</h4>
            <p class="card-price">$999</p>
        </router-link>
    </div>
</div>
</template>

<style lang="scss" scoped>
@import "../assets/scss/base/font.scss";
@import "../assets/scss/base/base.scss";
@import "../assets/scss/base/color.scss";

.card{
    width: 100%;
    margin: 10px;
    a{
        text-decoration: none;
    }
    // height: 257px;
    // display: flex;
    border: 1px solid #BC955C;
    border-radius: 5px;
    .card-pic{
        // width: 100%;
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
        // width: 100%;
        padding: 0px 15px;
        text-align: left;
        .card-title{
            @include font(20px);
            // margin: 7px;
        }
        .card-price{
            @include font(20px);
            margin: 7px 0px;
        }
    }
}

</style>

<script>
export default {
    
}
</script>
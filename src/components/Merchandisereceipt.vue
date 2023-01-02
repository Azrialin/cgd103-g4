<template>
    <div>
        <div>
            
            <h3 class="top">訂單詳情</h3>
            <hr class="underline">
            <div class="receipt-wrapper">
                

               <div class="receipt-details-xl">
                  <h3 class="invisibleBlock">商品圖片</h3>
                  <h3>商品類別</h3>
                  <h3>商品名稱</h3>
                  <h3>數量</h3>
                  <h3>售價</h3>
                  <h3>商品狀態</h3>
                  <h3>出貨狀態</h3>
               </div>

              <div class="receipt-frame" v-for="result in result2" :key="result.product_orders_id">
                <div class="productImg">

                  <img :src="`./img/products/${result.prod_pic_intro_0}`" alt="">
                  <!-- <img :src="`front/img/${result.prod_pic_main}`" alt=""> -->
                </div>

                <div class="product-des">
                    <h3>{{result.prod_type_id}}</h3>
                    <h3>{{result.prod_name}}</h3>
                    <h3 class="prodStatusWithNum">{{result.prod_status}}X{{result.order_item_qty}}</h3>
                    <h3>{{result.order_item_qty}}</h3>
                    <h3>{{result.per_prod_price}}</h3>
                    <h3 class="prodStatus">{{result.prod_status}}</h3>
                    <h3 class="orderSta">{{result.product_orders_status}}</h3>
                    <!-- <h3 class="shippingSta">{{result2?.shippingStatus}}</h3> -->
                    
                </div>
                  
                  <div class="paid">
                      <div>
                          <p>已出貨</p>
                      </div>
                  </div>

              </div>

              <!-- <div class="total-section" v-for="product in result" :key="product.orderNo">
                <h3>{{product.productPrice}}+{{product.productPrice}}</h3>
              </div> -->
              <div class="button-section">
                  <button class="btn-gold">聯絡客服</button>
              </div>
            </div>

            <!-- <button class="btn-gold_2nd" @click="showdetail">返回</button> -->

        </div>
    </div>
</template>

<script>

export default {
    props:{
      result2:Array
    },
    components: {

    },
    data(){
        return{
            // result:[],
            // hide:false,
        }
    },

    methods:{
        // getData(){
        //     this.result = result;
        // },
        // showdetail(){
        //   this.show = true;
        //   this.hide = true;
        // }
    }
}
</script>

<style scoped lang="scss">
  @import "../assets/scss/base/color.scss";
  @import "../assets/scss/layout/grid.scss";
  @import "../assets/scss/base/font.scss";
  @import "../assets/scss/components/btn.scss";


</style>

<style scoped lang="scss">
  .receipt-wrapper{
    padding: 10%;
    padding-top: 20px;
    // display: flex;
    // flex-wrap: wrap;
  }
  .paid{
    display: flex;
    justify-content: flex-end;
    position: relative;
    // width: 100%;
    
  }
  .paid div{
    width: 60px;
    background: #BC955C;
    box-sizing: border-box;
    position: relative;
    top:-10px;
    right:5%;
    color: white;
    height: 40px;
    clip-path: polygon(0 0, 100% 0, 100% 100%, 50% 80%, 0 100%);
  }
  .paid  p{
    width: 60px;
    position: absolute;
    color: white;
    left: 0;
    top:10px;
    bottom: 0;
    right: 0;
    z-index: 5;
  }
  .top{
    padding-bottom: 10px;
    margin-left: 10%;
    display: flex;
    flex-direction: flex-start;
    width: 100px;
    border-bottom: 2px solid #D7BF9D;
  }
  .underline{
    width: 100%;
    margin-top: 0;
    height: 0.5px;
    background: #BC955C;
    border: none;
  }
  .receipt-frame{
    border:1px solid #BC955C;
    // padding: 50px;
    display: flex;
    border-radius: 10px;
    // flex-wrap: wrap;
  }
  .receipt-frame img{
    // text-align: start;
    width: 30%;
  }
  .productImg{
    display: flex;
    // justify-content: flex-start;
    padding: 20px;
    width: 30%;
  }
  .productImg img{
    width: 100%;
  }
  .product-des{
    padding: 10px;
    width: 100%;
    text-align: start;
    // position: relative;
  }
  .product-des h3{
    margin: 10px;
  }

  .button-section{
    margin-top: 5%;
    margin-bottom: -7%;
    display:flex;
    justify-content: end;

  }
  .btn-gold_2nd{
    display:flex;
    justify-content: flex-start;
    margin: 0 5%;
  }
  .receipt-details-xl{
    border-radius: 10px 10px 0 0;
    background: #BC955C;
    color: white;
    padding: 20px;
    display: none;
  }
  .prodStatus,.shippingSta,.orderSta{
    display: none;
  }
  .invisibleBlock{
    width: 10%;
    visibility: hidden;
  }


@media (min-width:1200px) {
  
  .receipt-frame{
    display: flex;
    // flex-wrap: wrap;
    border-radius: 0;

  }
  .button-section{
    order: 2;
    width: 100%;
    margin-top: 100px;
  }
  .paid{
    display: none;
  }
  .receipt-details-xl{
    display: flex;
    justify-content: space-between;
  }
  .productImg{
    width: 10%;
  }
  .product-des{
    display: flex;
    justify-content: space-between;
    align-items: center;
    text-align: end;
    padding: 0 10px;
  }
  .product-des img{
    width: 10%;
  }
  .prodStatusWithNum{
    display: none;
  }
  .prodStatus,.shippingSta,.orderSta{
    display: flex;
  }
}

@media (max-width:500px) {

  .product-des h3{
    margin: 10px;
    font-size: 14px;
  }
}

</style>
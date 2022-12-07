<template>
    <div>
        <div>
            
            <h3 class="top">訂單詳情</h3>
            <hr class="underline">
            <div class="receipt-wrapper">
                
              <div class="receipt-frame" v-for="product in result" :key="product.orderNo">

                <div class="productImg">
                  <img src="../assets/img/products/pro-b.jpg" alt="">
                </div>

                <div class="product-des">
                    <h3>{{product.productType}}</h3>
                    <h3>{{product.productName}}</h3>
                    <h3>{{product.productStatus}}X{{product.noOfProduct}}</h3>
                    <h3>{{product.productPrice}}</h3>
                    
                </div>
                  
                  <div class="paid">
                      <div>
                          <p>已出貨</p>
                      </div>
                  </div>

              </div>
              <div class="button-section">
                  <button class="btn-gold">聯絡客服</button>
              </div>
            </div>

            <!-- <button class="btn-gold_2nd" @click="showdetail">返回</button> -->

        </div>
    </div>
</template>

<script>

const result = [{
    orderNo:"T12345",
    memId:123,
    productType:"當地特產",
    productName:"和菓子禮盒",
    noOfProduct: 1,
    productPrice: "＄1999",
    productStatus: "現貨",
    orderStatus : "已付款",
    shippingStatus: "已出貨",
    totalPrice:"$5997",
},
{
    orderNo:"T12345",
    memId:123,
    productType:"當地特產",
    productName:"和菓子禮盒",
    noOfProduct: 1,
    productPrice: "＄1999",
    productStatus: "現貨",
    orderStatus : "已付款",
    shippingStatus: "已出貨",
    totalPrice:"$5997",
},{
    orderNo:"T12345",
    memId:123,
    productType:"當地特產",
    productName:"和菓子禮盒",
    noOfProduct: 1,
    productPrice: "＄1999",
    productStatus: "現貨",
    orderStatus : "已付款",
    shippingStatus: "已出貨",
    totalPrice:"$5997",
}
]

export default {
    components: {

    },
    data(){
        return{
            result:[],
            // hide:false,
        }
    },
    created(){
        this.getData();
    },
    methods:{
        getData(){
            this.result = result;
        },
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


@media (min-width:1200px) {
  
  .receipt-frame{
    display: flex;
    flex-wrap: wrap;
  }
  .button-section{
    order: 2;
    width: 100%;
    margin-top: -50px;
  }
}

@media (max-width:500px) {

  .product-des h3{
    margin: 10px;
    font-size: 14px;
  }
}

</style>
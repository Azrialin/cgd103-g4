<template>
    <div>
        <div>
            
            <h3 class="top">訂單詳情</h3>
            <hr class="underline">
            <div class="receipt-wrapper">
                
              <div class="receipt-frame">
                <!-- <div class="paid">
                    <div>
                        <p>已付款</p>
                    </div>
                </div> -->

                <div class="productImg">
                  <img src="../assets/img/products/pro-b.jpg" alt="">
                </div>
                <!-- <div class="img-des col-xl-7">
                  <h3>九州線｜豪華觀光列車單日遊</h3>
                  <h4>訂單編號: {{result.orderNo}}</h4>
                  <h4>行程日期: {{result.departureDate}}</h4>
                  <h4>報名人數: {{result.noOfTraveler}}</h4>
                  <h2>TWD{{result.total}}</h2>
                </div> -->

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

const result = {
    productType:"當地特產",
    productName:"和菓子禮盒",
    noOfProduct: 1,
    productPrice: "＄1999",
    productStatus: "現貨",
    orderStatus : "已付款",
    shippingStatus: "已出貨",
    totalPrice:"$5997",
}

export default {
    components: {

    },
    data(){
        return{
            result:{},
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
    
  }
  .paid div{
    width: 100px;
    // height: 30px;
    background: #BC955C;
    box-sizing: border-box;
    // margin-right: 3%;
    position: relative;
    // padding: 1px;
    top:-30px;
    right:5%;
    color: white;

    border-top: 20px solid;
    border-bottom: 20px solid;

    border-left: 50px solid;
    border-right: 50px solid;
    // border: 50px solid;
    border-color: #BC955C #BC955C white #BC955C ;
  }
  .paid  p{
    width: 100px;
    position: absolute;
    color: white;
    left: -50px;
    top:-15px
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
    // flex-wrap: wrap;
  }
  .receipt-frame img{
    text-align: start;
    width: 30%;
    border-radius: 10px;
  }
  .img-des{
    margin-top: 50px;
    text-align: left;
    line-height: 2;
    color: #444444;

  }
  .img-des h2{
    text-align: right;
  }
  
  .unchangeable{
     border: 1px solid #CCC ;
     background: #e6e6e6;
     color: #888;
  }
  .button-section{
    margin-top: 5%;
    display:flex;
    justify-content: end;

  }
  .btn-gold_2nd{
    display:flex;
    justify-content: flex-start;
    margin: 0 5%;
    // order: 1;
  }
  // .btn-gold{
  //   // order: 2;
  // }
  .precautions{
    margin-top: 50px;
    display: flex;
    
  }
  .des-header{
    color: #BC955C;
    // text-decoration: underline;
    position: relative;
    // border: #444444 1px solid;
    .des-title{
      width: fit-content;
      position: relative;
      // border: 1px sienna solid;
      &::after{
        content: "";
        background-color:#BC955C;
        width: 100%;
        position: absolute;
        display: block;
        bottom: 0px;
        height: 1.5px;
        left: 0;
        
      }
    }
  }
  .trip-des,.notification{
    text-align: left;
    line-height: 1.5;
    margin: 10px;
  }

@media (min-width:1200px) {
  
  .try{
    display: inline-block;
    justify-content: start;
    // box-sizing: border-box;
  }
  .receipt-frame{
    display: flex;
    flex-wrap: wrap;
  }
  .img-des{
    margin-top: 0;
    margin-left: 50px;

  }
  .precautions{
    order: 1;
  }
  .button-section{
    order: 2;
    width: 100%;
    margin-top: -50px;
  }
  .button-section{

  }
}

@media (max-width:500px) {
  
//   .paid div{
//     right:0px;
//   }
}

</style>
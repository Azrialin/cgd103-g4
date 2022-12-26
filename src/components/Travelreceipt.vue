<template>
    <div>
        <div>
            <div class="paid">
              <div>
                <p>已付款</p>
              </div>

            </div>
            <h3 class="top">訂單詳情</h3>
            <hr class="underline">
            <div class="receipt-wrapper">
              <div class="receipt-frame">
                <div class="col-xl-4">
                  <img :src="`./img/Scape/${result2?.package_pic}`" alt="">
                </div>
                <div class="img-des col-xl-7">
                  <h3>九州線｜豪華觀光列車單日遊</h3> 
                  <h4>訂單編號: {{result2?.package_order_no}}</h4><!-- 問學長為什麼套了問號就ok瞭了 -->
                  <h4>行程日期: {{result2?.departure_date}}</h4><!-- 問學長為什麼套了問號就ok瞭了 -->
                  <h4>報名人數: {{result2?.package_ticket_amount}}</h4><!-- 問學長為什麼套了問號就ok瞭了 -->
                  <h2>TWD{{result2?.package_total}}</h2><!-- 問學長為什麼套了問號就ok瞭了 -->
                </div>

                <div class="button-section">
                  <button class="btn-gold">聯絡客服</button>
                </div>

                <div class="precautions col-xl-6">
                  <div class="trip-des">
                    <div class="des-header"><p class="des-title">行程說明</p></div>
                    <h5>
                      Lorem ipsum dolor sit 
                        consectetur adipiscing  
                        Nunc vulputate libero et 
                        ac aliquet odio mattis. 
                        taciti sociosqu ad
                    </h5>
                  </div>
                  <div class="notification">
                    <div class="des-header"><p class="des-title">注意事項</p></div>
                    <h5>
                      Lorem ipsum dolor sit 
                        consectetur adipiscing  
                        Nunc vulputate libero et 
                        ac aliquet odio mattis. 
                        taciti sociosqu ad
                    </h5>
                  </div>
                </div>
              </div>
            </div>
            <!-- <button class="btn-gold_2nd" @click="showdetail">返回</button> -->

        </div>
    </div>
</template>

<script>

// const result2 = {
//     // orderNo:"T12345",
//     // package:"方案A",
//     // departureDate:"2023/01/01",
//     // noOfTraveler: "2人",
//     // total: "＄70,000",
//     // paymentStatus: "已付款",
// }

export default {
    props:{
      result2:Array
    },
    components: {

    },
    data(){
        return{
            // result1:{},
            // hide:false,
        }
    },
    // created(){
    //     this.getData();
    // },
    methods:{
        // getData(){
        //     this.result1 = this.result;
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
    height: 60px;
    // border-top: 20px solid;
    // border-bottom: 20px solid;

    // border-left: 50px solid;
    // border-right: 50px solid;
    // border: 50px solid;
    // border-color: #BC955C #BC955C white #BC955C ;
    clip-path: polygon(0 0, 100% 0, 100% 100%, 50% 80%, 0 100%);
  }
  .paid  p{
    width: 100px;
    position: absolute;
    color: white;
    left: 0;
    top:20px;
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
    padding: 50px;
    // display: flex;
    // flex-wrap: wrap;
  }
  .receipt-frame img{
    width: 100%;
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
  
  .paid div{
    right:0px;
  }
}

</style>
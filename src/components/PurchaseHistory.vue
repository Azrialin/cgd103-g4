<template>
    <div>
        <div>
            <h3 class="top" v-show="!hide">交易紀錄列表</h3>
            <hr class="underline" v-show="!hide">

            <!-- rwd -->
            <div class="merchandise-wrapper" v-show="!hide" v-for="merchandise in result" :key="merchandise.orderNo">
              <div class="merchandise-detail">
                    <div class="merchandise-info">
                        <h3>訂單編號 </h3>
                        <span>{{merchandise.orderNo}}</span>
                    </div>
                 <hr>
                    <div class="merchandise-info">
                        <h3>會員編號 </h3>
                        <span>{{merchandise.memId}}</span>
                    </div>
                 <hr>
                    <div class="merchandise-info">
                        <h3>訂購日期 </h3>
                        <span>{{merchandise.purchaseDate}}</span>
                    </div>
                 <hr>
                    <div class="merchandise-info">
                        <h3>訂單金額 </h3>
                        <span>{{merchandise.orderTotal}}</span>
                    </div>
                 <hr>
                    <div class="merchandise-info">
                        <h3>訂單狀態 </h3>
                        <span>{{merchandise.orderStatus}}</span>
                    </div>
                 <hr>
                    <div class="merchandise-info">
                        <h3>出貨狀態 </h3>
                        <span>{{merchandise.shippingStatus}}</span>
                    </div>
              </div>
              <a @click="showdetail" class="bottom">查看詳情</a>
            </div>

            <!-- rwd -->

            <!-- pc version -->
            <div class="merchandise-wrapper-xl" v-show="!hide" >
              <!-- <div class="merchandise-detail"> -->
                <div class="merchandise-info-xl">
                    <h3>訂單編號</h3>
                    <h3>會員編號</h3>
                    <h3>訂購日期</h3>
                    <h3>訂單金額</h3>
                    <h3>訂單狀態</h3>
                    <h3>出貨狀態</h3>
                    <h3>訂單詳情</h3>
                </div>
                <div class="merchandise-info-status" v-for="merchandise in result" :key="merchandise.orderNo">
                    <h3>{{merchandise.orderNo}}</h3>
                    <h3>{{merchandise.memId}}</h3>
                    <h3>{{merchandise.purchaseDate}}</h3>
                    <h3>{{merchandise.orderTotal}}</h3>
                    <h3>{{merchandise.orderStatus}}</h3>
                    <h3>{{merchandise.shippingStatus}}</h3>
                    <a @click="showdetail">查看詳情</a>
                </div>

            </div>

            <!-- <div v-show="show"> -->
              <Merchandisereceipt v-show="show"/>
            <!-- </div> -->
            

            <!-- 返回button -->
            <button class="btn-gold_2nd" v-show="!hide">返回</button>
            <button class="btn-gold_2nd" v-show="hide" @click="reverse">返回</button>

            


        </div>
    </div>
</template>

<script>
import Merchandisereceipt from '@/components/Merchandisereceipt.vue'
const result = [{
    orderNo:"T12345",
    memId:123,
    purchaseDate:"2023/01/01",
    orderTotal: "＄70,000",
    orderStatus : "已付款",
    shippingStatus: "已出貨",
},{
    orderNo:"T12346",
    memId:124,
    purchaseDate:"2023/01/01",
    orderTotal: "＄70,000",
    orderStatus : "已付款",
    shippingStatus: "已出貨",
},{
    orderNo:"T12347",
    memId:125,
    purchaseDate:"2023/01/01",
    orderTotal: "＄70,000",
    orderStatus : "已付款",
    shippingStatus: "已出貨",
}]

export default {
    components: {
      Merchandisereceipt,
    },
    data(){
        return{
          result:[],
          show:false,
          hide:false,
          itineryOrder:[],
        }
    },
    created(){
        this.getData();
    },
    methods:{
        getData(){
            this.result = result;
        },
        showdetail(){
          this.show = true;
          this.hide = true;
        },
        reverse(){
          this.show = false;
          this.hide = false;
        }
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
  .merchandise-wrapper{
    padding: 10%;
    padding-top: 20px;
  }
  .merchandise-detail{
    border: 1px solid #BC955C;
    border-radius: 10px 10px 0 0;
  }
  .merchandise-info{
    display: flex;
    justify-content: flex-start;
  }
  .merchandise-info h3,.merchandise-info span{
    display: inline-block;
    margin: 20px;
  }
  .merchandise-detail hr{
    height: 1px;
    background: #BC955C;
    border: none;
  }

  .bottom{
    margin: 20px 0 0;
    display: flex;
    justify-content: flex-end;
    color: #BC955C;
    text-decoration-line: underline;
    // border-bottom:1px solid #BC955C;
  }
  .btn-gold_2nd{
    display:flex;
    justify-content: flex-start;
    margin: 0 10%;
  }

  .merchandise-wrapper-xl{
    padding: 10%;
    padding-top: 20px;
    display: none;
  }
  .merchandise-info-xl{
        border-radius: 10px 10px 0 0;
        background: #BC955C;
        display: flex;
        justify-content: space-evenly;
        color: white;
        padding: 20px;
  }

  .merchandise-info-status{
    display: flex;
    justify-content: space-evenly;
    border: 1px solid #BC955C;
    padding: 20px;
    text-align: center; //沒辦法對齊
  }
  .merchandise-info-status a{
    color: #BC955C;
    text-decoration-line: underline;
    cursor: pointer;
  }


@media (min-width:1200px) {
  
  .merchandise-wrapper{
    display: none;
  }
  .merchandise-wrapper-xl{
    display: block;
  }
  .btn-gold_2nd{
    margin-top: -50px;
  }
}

</style>
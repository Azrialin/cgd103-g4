<template>
    <div>
        <div>
            <h3 class="top">行程訂單列表</h3>
            <hr class="underline">
            <div class="travel-wrapper">
              <div class="travel-detail">
                    <div class="travel-info">
                        <h3>訂單編號 </h3>
                        <span>{{result.orderNo}}</span>
                    </div>
                 <hr>
                    <div class="travel-info">
                        <h3>行程方案 </h3>
                        <span>{{result.package}}</span>
                    </div>
                 <hr>
                    <div class="travel-info">
                        <h3>行程日期 </h3>
                        <span>{{result.departureDate}}</span>
                    </div>
                 <hr>
                    <div class="travel-info">
                        <h3>報名人數 </h3>
                        <span>{{result.noOfTraveler}}</span>
                    </div>
                 <hr>
                    <div class="travel-info">
                        <h3>總計金額 </h3>
                        <span>{{result.total}}</span>
                    </div>
                 <hr>
                    <div class="travel-info">
                        <h3>訂單狀態 </h3>
                        <span>{{result.paymentStatus}}</span>
                    </div>
              </div>
              <a href="" class="bottom">查看詳情</a>
              <button class="btn-gold_2nd">返回</button>
            </div>


        </div>
    </div>
</template>

<script>

const result = {
    orderNo:"T12345",
    package:"方案A",
    departureDate:"2023/01/01",
    noOfTraveler: "2人",
    total: "＄70,000",
    paymentStatus: "已付款",
}

export default {
    components: {

    },
    data(){
        return{
            result:{}
        }
    },
    created(){
        this.getData();
    },
    methods:{
        getData(){
            this.result = result;
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
  .travel-wrapper{
    padding: 10%;
    padding-top: 20px;
  }
  .travel-detail{
    border: 1px solid #BC955C;
    border-radius: 10px 10px 0 0;
  }
  .travel-info{
      display: flex;
      justify-content: flex-start;
  }
  .travel-info h3,.travel-info span{
    display: inline-block;
    margin: 20px;
  }
  .travel-detail hr{
    height: 1px;
    background: #BC955C;
    border: none;
  }
  .bottom{
    margin: 20px 0;
    display: flex;
    justify-content: flex-end;
    color: #BC955C;
    text-decoration-line: underline;
    // border-bottom:1px solid #BC955C;
  }
//   .must{
//     color: #941111;
//     display: flex;
//     justify-content: flex-end;
//     // margin-right: 20px;
//   }
//   .info{
//     // margin-left: 10%;
//     display: flex;
//     flex-wrap: wrap;
//     justify-content: flex-start;
//   }
  
//   input,select,option{
//     width: 100%;//input 右邊沒有吃到form class 的10% padding要再問學長
//     margin: 20px 0;
//     margin-right: 10%;
//     padding: 10px;
//     border-radius: 10px;
//     border: 1px solid #BC955C ;
//     outline:none;
//     text-align: left;
//     box-sizing: border-box;
//     // display: flex;
//     // flex-wrap: wrap;
//   }
//   select{
//     width: 100%;
//     appearance: none;
//     background: url("../assets/img/🦆 icon _chevron-down_.svg")90% 50% no-repeat scroll transparent;
//   }
//   .unchangeable{
//      border: 1px solid #CCC ;
//      background: #e6e6e6;
//      color: #888;
//   }
//   span{
//     // color: #941111;
//   }
//   .button-section{
//     margin-top: 5%;
//     display:flex;
//     flex-direction: row-reverse;
//   }
//   .button-section .btn-gold_2nd{
//     margin-left: 20px;
//   }

@media (min-width:1200px) {
  
  .try{
    display: inline-block;
    justify-content: start;
    // box-sizing: border-box;
  }
}

</style>
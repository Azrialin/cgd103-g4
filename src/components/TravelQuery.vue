<template>
    <div>
        <div>
            <h3 class="top" v-show="!hide">行程訂單列表</h3>
            <hr class="underline" v-show="!hide">

            <!-- rwd -->
            <div class="travel-wrapper" v-show="!hide" v-for="(purchase,index) in result" :key="purchase.package_order_no">
              <div class="travel-detail">
                    <div class="travel-info">
                        <h3>訂單編號 </h3>
                        <span>{{purchase.package_order_no}}</span>
                    </div>
                 <hr>
                    <div class="travel-info">
                        <h3>行程方案 </h3>
                        <span>{{purchase.package_no}}</span>
                    </div>
                 <hr>
                    <div class="travel-info">
                        <h3>行程日期 </h3>
                        <span>{{purchase.package_order_date}}</span>
                    </div>
                 <hr>
                    <div class="travel-info">
                        <h3>報名人數 </h3>
                        <span>{{purchase.package_ticket_amount}}</span>
                    </div>
                 <hr>
                    <div class="travel-info">
                        <h3>總計金額 </h3>
                        <span>{{purchase.package_total}}</span>
                    </div>
                 <hr>
                    <div class="travel-info">
                        <h3>訂單狀態 </h3>
                        <span>{{purchase.package_pay_status}}</span>
                    </div>
              </div>
              <a @click="showdetail(index)" class="bottom">查看詳情</a>
            </div>

            <!-- rwd -->

            <!-- pc version -->
            <div class="travel-wrapper-xl" v-show="!hide" >
              <!-- <div class="travel-detail"> -->
                <div class="travel-info-xl">
                    <h3>訂單編號</h3>
                    <h3>行程方案</h3>
                    <h3>行程日期</h3>
                    <h3>報名人數</h3>
                    <h3>總計金額</h3>
                    <h3>訂單狀態</h3>
                    <h3>訂單詳情</h3>
                </div>
                <div class="travel-info-status" v-for="(purchase,index) in result" :key="purchase.orderNo">
                    <h3>{{purchase.package_order_no}}</h3>
                    <h3>{{purchase.package_no}}</h3>
                    <h3>{{purchase.package_order_date}}</h3>
                    <h3>{{purchase.package_ticket_amount}}</h3>
                    <h3>{{purchase.package_total}}</h3>
                    <h3>{{purchase.package_pay_status}}</h3>
                    <a @click="showdetail(index)">查看詳情</a>
                </div>
            </div>
            <!-- <div v-show="show"> -->
              <Travelreceipt v-show="show" :result2="result[showdetailIndex]"/>
            <!-- </div> -->

            <!-- 返回button -->
            <button class="btn-gold_2nd" v-show="!hide">返回</button>
            <button class="btn-gold_2nd" v-show="hide" @click="reverse">返回</button>

            


        </div>
    </div>
</template>

<script>
import {BASE_URL} from '@/assets/js/common.js'
import Travelreceipt from '@/components/Travelreceipt.vue'
const result = [

]

export default {
    components: {
      Travelreceipt,
    },
    data(){
        return{
          result:[],
          show:false,
          hide:false,
          itineryOrder:[],
          showdetailIndex:0,
          // mem_no: this.$store.state.mem_no,
        }
    },
    created(){
        this.getData();
    },
    computed: {
      mem_no() {
        return  this.$store.state.mem_no
      }
    },
    methods:{

        getData(){
            /* this.result = result; */
            // fetch(`http://localhost/cgd103-g4/public/phpfiles/getTravelQuery.php?memId=${this.mem_no}`)
            fetch(`${BASE_URL}/getTravelQuery.php?memId=${this.mem_no}`)
              .then((res)=>res.json())
              .then((json)=> {
                this.result = json;
              })
        },
        showdetail(index){
          this.showdetailIndex=index
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

  .travel-wrapper-xl{
    padding: 10%;
    padding-top: 20px;
    display: none;
  }
  .travel-info-xl{
        border-radius: 10px 10px 0 0;
        background: #BC955C;
        display: flex;
        justify-content: space-evenly;
        color: white;
        padding: 20px;
  }

  .travel-info-status{
    display: flex;
    justify-content: space-evenly;
    border: 1px solid #BC955C;
    padding: 20px;
    text-align: center; //沒辦法對齊
  }
  .travel-info-status a{
    color: #BC955C;
    text-decoration-line: underline;
    cursor: pointer;
  }


@media (min-width:1200px) {
  
  .travel-wrapper{
    display: none;
  }
  .travel-wrapper-xl{
    display: block;
  }
  .btn-gold_2nd{
    margin-top: -50px;
  }
}

</style>
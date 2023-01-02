<template>
  <div>
    <div>
      <h3 class="top" v-show="!hide">交易紀錄列表</h3>
      <hr class="underline" v-show="!hide" />

      <!-- rwd -->
      <div
        class="merchandise-wrapper"
        v-show="!hide"
        v-for="(merchandise, index) in result"
        :key="merchandise.product_orders_id"
      >
        <div class="merchandise-detail">
          <div class="merchandise-info">
            <h3>訂單編號</h3>
            <span>{{ merchandise[0].product_orders_id }}</span>
          </div>
          <hr />
          <div class="merchandise-info">
            <h3>會員編號</h3>
            <span>{{ merchandise[0].mem_num }}</span>
          </div>
          <hr />
          <div class="merchandise-info">
            <h3>訂購日期</h3>
            <span>{{ merchandise[0].product_orders_date }}</span>
          </div>
          <hr />
          <div class="merchandise-info">
            <h3>訂單金額</h3>
            <span>{{ merchandise[0].product_orders_total }}</span>
          </div>
          <hr />
          <!-- <div class="merchandise-info">
                        <h3>訂單狀態 </h3>
                        <span>{{merchandise.product_orders_status}}</span>
                    </div>
                 <hr> -->
          <div class="merchandise-info">
            <h3>出貨狀態</h3>
            <span>{{ merchandise[0].product_orders_status }}</span>
          </div>
        </div>
        <a @click="showdetail(index)" class="bottom">查看詳情</a>
      </div>

      <!-- rwd -->

      <!-- pc version -->
      <div class="merchandise-wrapper-xl" v-show="!hide">
        <!-- <div class="merchandise-detail"> -->
        <div class="merchandise-info-xl">
          <h3>訂單編號</h3>
          <h3>會員編號</h3>
          <h3>訂購日期</h3>
          <h3>訂單金額</h3>
          <!-- <h3>訂單狀態</h3> -->
          <h3>出貨狀態</h3>
          <h3>訂單詳情</h3>
        </div>
        <div
          class="merchandise-info-status"
          v-for="(merchandise, index) in result"
          :key="merchandise.product_orders_id"
        >
          <h3>{{ merchandise[0].product_orders_id }}</h3>
          <h3>{{ merchandise[0].mem_num }}</h3>
          <h3>{{ merchandise[0].product_orders_date }}</h3>
          <h3>{{ merchandise[0].product_orders_total }}</h3>
          <h3>{{ merchandise[0].product_orders_status }}</h3>
          <!-- <h3>{{merchandise.shippingStatus}}</h3> -->
          <a @click="showdetail(index)">查看詳情</a>
        </div>
      </div>

      <Merchandisereceipt v-show="show" :result2="getResult2" />

      <!-- 返回button -->
      <button class="btn-gold_2nd" v-show="!hide">返回</button>
      <button class="btn-gold_2nd" v-show="hide" @click="reverse">返回</button>
    </div>
  </div>
</template>

<script>
import {BASE_URL} from '@/assets/js/common.js'
import Merchandisereceipt from "@/components/Merchandisereceipt.vue";
const result = [
  //   {
  //     orderNo:"T12345",
  //     memId:123,
  //     purchaseDate:"2023/01/01",
  //     orderTotal: "＄70,000",
  //     orderStatus : "已付款",
  //     shippingStatus: "已出貨",
  // },{
  //     orderNo:"T12346",
  //     memId:124,
  //     purchaseDate:"2023/01/01",
  //     orderTotal: "＄70,000",
  //     orderStatus : "已付款",
  //     shippingStatus: "已出貨",
  // },{
  //     orderNo:"T12347",
  //     memId:125,
  //     purchaseDate:"2023/01/01",
  //     orderTotal: "＄70,000",
  //     orderStatus : "已付款",
  //     shippingStatus: "已出貨",
  // }
];

export default {
  components: {
    Merchandisereceipt,
  },
  data() {
    return {
      temp: [],
      result: [],
      show: false,
      hide: false,
      itineryOrder: [],
      showdetailIndex: 0,
      // mem_no: this.$store.state.mem_no,
    };
  },
  created() {
    this.getData();
  },
  methods: {
    getData() {
      // this.result = result;
      // fetch(`http://localhost/cgd103-g4/public/phpfiles/getPurchaseHistory.php?memId=${this.mem_no}`)
      fetch(`${BASE_URL}/getPurchaseHistory.php?memId=${this.mem_no}`)
        .then((res) => res.json())
        .then((json) => {
          this.temp = json;
          let data = {};
          this.result = json.reduce(function (results, org) {
            (results[org.product_orders_id] =
              results[org.product_orders_id] || []).push(org);
            return results;
          }, {});
        });
    },
    showdetail(index) {
      this.showdetailIndex = index;
      this.show = true;
      this.hide = true;
    },
    reverse() {
      this.show = false;
      this.hide = false;
    },
  },
  computed: {
    getResult2() {
      return this.result[this.showdetailIndex];
    },
     mem_no() {
        return  this.$store.state.mem_no
      },
  },
};
</script>

<style scoped lang="scss">
@import "../assets/scss/base/color.scss";
@import "../assets/scss/layout/grid.scss";
@import "../assets/scss/base/font.scss";
@import "../assets/scss/components/btn.scss";
</style>

<style scoped lang="scss">
.top {
  padding-bottom: 10px;
  margin-left: 10%;
  display: flex;
  flex-direction: flex-start;
  width: 100px;
  border-bottom: 2px solid #d7bf9d;
}
.underline {
  width: 100%;
  margin-top: 0;
  height: 0.5px;
  background: #bc955c;
  border: none;
}
.merchandise-wrapper {
  padding: 10%;
  padding-top: 20px;
}
.merchandise-detail {
  border: 1px solid #bc955c;
  border-radius: 10px 10px 0 0;
}
.merchandise-info {
  display: flex;
  justify-content: flex-start;
}
.merchandise-info h3,
.merchandise-info span {
  display: inline-block;
  margin: 20px;
}
.merchandise-detail hr {
  height: 1px;
  background: #bc955c;
  border: none;
}

.bottom {
  margin: 20px 0 0;
  display: flex;
  justify-content: flex-end;
  color: #bc955c;
  text-decoration-line: underline;
  // border-bottom:1px solid #BC955C;
}
.btn-gold_2nd {
  display: flex;
  justify-content: flex-start;
  margin: 0 10%;
}

.merchandise-wrapper-xl {
  padding: 10%;
  padding-top: 20px;
  display: none;
}
.merchandise-info-xl {
  border-radius: 10px 10px 0 0;
  background: #bc955c;
  display: flex;
  justify-content: space-evenly;
  color: white;
  padding: 20px;
}

.merchandise-info-status {
  display: flex;
  justify-content: space-evenly;
  border: 1px solid #bc955c;
  padding: 20px;
  text-align: center; //沒辦法對齊
}
.merchandise-info-status a {
  color: #bc955c;
  text-decoration-line: underline;
  cursor: pointer;
}

@media (min-width: 1200px) {
  .merchandise-wrapper {
    display: none;
  }
  .merchandise-wrapper-xl {
    display: block;
  }
  .btn-gold_2nd {
    margin-top: -50px;
  }
}
</style>

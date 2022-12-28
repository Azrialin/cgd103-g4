<template>
  <div class="cart">
    <div class="process">
      <stepbar :step="step" />
    </div>
    <div v-show="step === 0">
      <div class="cart-title">
        <p class="item-title">商品資訊</p>
        <p></p>
        <p class="item-price">單價</p>
        <p>數量</p>
        <p>小計</p>
        <p></p>
      </div>
      <hr />
      <div
        class="shopcart-item"
        v-for="item in combineList"
        :key="item.id"
        col-sm-12
      >
        <cartitem
          :id="item.prod_id"
          :img="`./img/products/${item.prod_pic_intro_0}`"
          :title="item.prod_name"
          :price="item.prod_price"
          :amount="item.amount"
        />
        <span class="del" @click="delitem(index)">
          <i class="fa-regular fa-trash-can"></i>
        </span>
      </div>
      <hr />
      <div class="cart-total">
        <p>總計：${{ total }}</p>
      </div>
      <div class="cart-btn">
        <button class="pro-btn-btn btn-gold_2nd $clr_gold_L1" @click="shopping">
          繼續購物
        </button>
        <button class="pro-btn-btn btn-gold" @click="add">下一步</button>
      </div>
    </div>

    <div v-show="step === 1">
      <div>
        <div class="pay">
          <div class="pay-method">
            <div class="pay-title">
              <h3>配送方式</h3>
            </div>
            <div class="pay-txt">
              <p>郵寄到府</p>
            </div>
          </div>
          <div class="pay-people">
            <div class="pay-title">
              <h3>收件人資料</h3>
            </div>
            <div class="pay-txt">
              <p>姓名</p>
              <div><Input /></div>
            </div>
            <div class="pay-txt">
              <p>電話</p>
              <div><Input /></div>
            </div>
            <div class="pay-txt">
              <p>信箱</p>
              <div><Input /></div>
            </div>
            <div class="pay-txt">
              <p>地址</p>
              <div><Input /></div>
            </div>
          </div>
          <div class="pay-card">
            <div class="pay-title">
              <h3>信用卡資料</h3>
            </div>
            <div class="pay-txt">
              <p class="card-txt">信用卡卡號</p>
              <div class="card">
                <input type="text" maxlength="4" class="pay-input" />
                <input type="text" maxlength="4" class="pay-input" />
                <input type="text" maxlength="4" class="pay-input" />
                <input type="text" maxlength="4" class="pay-input" />
              </div>
            </div>
            <div class="pay-txt">
              <p class="card-txt">有效年月</p>
              <div class="card">
                <input
                  type="text"
                  name="month"
                  placeholder="MM"
                  maxlength="2"
                  class="pay-input"
                />
                <span class="slash">/</span>
                <input
                  type="text"
                  name="year"
                  placeholder="YY"
                  maxlength="2"
                  class="pay-input"
                />
              </div>
            </div>
            <div class="pay-txt">
              <p class="card-txt-time">卡片背面末三碼</p>
              <div>
                <div class="card">
                  <input
                    type="text"
                    name="code"
                    placeholder="XXX"
                    maxlength="3"
                    class="pay-input"
                  />
                </div>
              </div>
            </div>
          </div>
          <div class="pay-check">
            <input type="checkbox" class="agree-txt" id="agree" />
            <label for="agree">
              點選結帳即為同意此 <span class="buylaw">購買條款</span>
            </label>
          </div>
          <div class="pay-btn">
            <button
              class="pro-btn-btn btn-gold_2nd $clr_gold_L1"
              @click="reduce"
            >
              回上一步
            </button>
            <button class="pro-btn-btn btn-gold" @click="add">確定結帳</button>
          </div>
        </div>
      </div>
    </div>
    <div v-show="step === 2">
      <div class="pay-success">
        <div class="pay-icon">
          <i class="fa-regular fa-circle-check"></i>
        </div>
        <div class="pay-success-txt">
          <p>感謝購買！我們已經收到您的訂單</p>
          <p>訂單編號:A000001</p>
        </div>
        <div class="pay-success-btn">
          <button class="pro-btn-btn btn-gold_2nd $clr_gold_L1" @click="member">
            前往會員專區
          </button>
          <button class="pro-btn-btn btn-gold_2nd" @click="shopping">
            繼續選購
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import cartitem from "@/components/CartItem.vue";
import stepbar from "@/components/stepbar.vue";
import Input from "@/components/Input.vue";
import { BASE_URL } from "@/assets/js/common.js";
export default {
  name: "ShopCart",
  components: {
    cartitem,
    stepbar,
    Input,
  },
  data() {
    return {
      step: 0,
      //amount:1,
      productList: [],
      combineList: [],
    };
  },
  computed: {
    list() {
      return this.$store.getters.cartList;
    },
    total() {
      return this.list.reduce((acc, cur) => {
        return (acc += cur.prod_price * cur.amount);
      }, 0);
    },
  },
  watch: {
     productList: {
      deep: true,
      handler() {
        this.combineList = this.list.map((v) => {
          let sameData = this.productList.find((u) => v.prod_id == u.prod_id);
          return { ...v, ...sameData };
        });
      },
    },
    list: {
      deep: true,
      handler() {
        this.combineList = this.list.map((v) => {
          let sameData = this.productList.find((u) => v.prod_id == u.prod_id);
          return { ...v, ...sameData };
        });
      },
    },
  },
  methods: {
    delitem(index) {
      this.list.splice(index, 1);
    },
    shopping() {
      this.$router.push("/shop");
    },
    next() {
      this.$router.push("/shoppayment");
    },
    add() {
      this.step++;
    },
    reduce() {
      this.step--;
    },
    member() {
      this.$router.push("/membership");
    },
    getData() {
      // this.result = result;
      fetch(`${BASE_URL}/getProducts.php`)
        .then((res) => res.json())
        .then((vv) => {
          this.productList = vv;
          console.log(this.productList);
          // this.$store.dispatch("setCart",vv);
        });
    },
    // getCart() {
    //   // fetch(`${BASE_URL}/getCarts.php`)
    //   //   .then((res) => res.json())
    //   //   .then((vv) => {
    //   //     console.log(vv);
    //   //     this.$store.dispatch("setCart",vv);
    //   //   });
    //   const vv = [
    //     { prod_id: 1, aaa: 111 },
    //     { prod_id: 7, aaa: 111 },
    //   ];
    //   this.$store.dispatch("setCart", vv);
    // },
    saveData() {
      console.log(this.list);
    },
  },
  mounted() {
    this.getData();
    // this.getCart();
    // this.$store.dispatch("addCart",product);
    // this.$store.dispatch("setCart",list);

    // {
    //   id:product.prod_id,
    //   amount:product.amount,
    // }

    // this.$store.dispatch("addCart", {
    //   id: 10,
    //   img: require(`@/assets/img/products/pro4.jpg`),
    //   title: "長崎蛋糕",
    //   price: 460,
    //   amount:1,
    // });
  },
};
</script>

<style lang="scss" scoped>
@import "../assets/scss/base/font.scss";
@import "../assets/scss/base/color.scss";
@import "../assets/scss/layout/grid.scss";
@import "../assets/scss/components/btn.scss";

// ===========step0
.cart {
  .cart-title {
    display: flex;
    justify-content: space-between;
    margin: auto;
    // outline: 1px solid red;
  }
  hr {
    width: 80%;
    margin: auto;
    margin-top: 10px;
    color: $clr_gold_L1;
  }
  .shopcart-item {
    display: flex;
    align-items: center;
    justify-content: space-around;
    width: 100%;
  }
  .cart-total {
    p {
      text-align: end;
    }
  }
  .cart-btn {
    display: flex;
    flex-wrap: wrap;
    // width: 99%;
    margin: auto;
    justify-content: flex-end;
    // text-align: center;
    margin: 20px 0px;
    // margin: auto;
    .pro-btn-btn {
      // width: 90%;
      margin: 0px 10px;
      // width: 46%;
    }
  }
}

// ======================step1
.pay {
  width: 100%;
  margin: auto;
  max-width: 1200px;
  .pay-method {
    margin-top: 20px;
    p {
      width: 20%;
      margin-right: 20px;
      margin-left: 10px;
      letter-spacing: 0;
    }
  }
  .pay-people {
    margin-top: 20px;
    p {
      width: 20%;
      margin-right: 20px;
      margin-left: 10px;
    }
  }
  .pay-title {
    @include font(20px);
    // margin: 5px;
  }
  .pay-txt {
    width: 100%;
    @include font(14px);
    margin: 10px 0px;
    display: flex;
    justify-content: flex-start;
    align-items: center;
    :deep(Input) {
      width: 90%;
    }
  }

  .pay-card {
    width: 100%;
    margin-top: 20px;
    // .pay-txt{
    //     width: 100%;
    // }
  }
  .card-txt {
    width: 42%;
    letter-spacing: 0;
    text-align: start;
    margin-left: 10px;
  }
  .card-txt-time {
    width: 34.5%;
    letter-spacing: 0;
    margin-left: 8px;
  }
  .card {
    width: 80%;
    display: flex;
    justify-content: flex-start;
    align-items: center;
    .slash {
      @include font(18px);
    }
    .pay-input {
      text-align: center;
      width: 20%;
      margin: 5px;
      padding: 5px;
      border-radius: 10px;
      border: 1px solid $clr_gold_L1;
    }
  }
  .pay-check {
    width: 100%;
    @include font(14px);
    margin: 10px;
    .buylaw {
      color: $clr_gold_L1;
    }
  }
  .pay-btn {
    width: 100%;
    display: flex;
    justify-content: flex-end;
    .pro-btn-btn {
      margin: 10px;
      @include font(12px);
    }
  }
}

// ======================step2
.pay-success {
  width: 100%;
  margin: auto;
  max-width: 1200px;
  .pay-icon {
    width: 100%;
    i {
      font-size: 500%;
      color: $clr_gold_L1;
    }
  }
  .pay-success-txt {
    width: 100%;
    p {
      @include font(14px);
      text-align: center;
      margin: 10px;
    }
  }
  .pay-success-btn {
    width: 100%;
    .pro-btn-btn {
      @include font(12px);
      margin: 10px;
    }
  }
}

@media screen and (max-width: 768px) {
  // ===========step0
  .cart {
    .cart-title {
      width: 90%;
      p {
        @include font(16px);
      }

      .item-price {
        display: none;
      }
    }
    hr {
      width: 97%;
    }
    .shopcart-item {
      .del {
        margin: 0px 2px;
      }
    }
    .cart-total {
      width: 85%;
      @include font(16px);
      margin: 20px 0px;
    }
    .cart-btn {
      width: 100%;
      .pro-btn-btn {
        @include font(12px);
        text-align: center;
      }
    }
  }
}

@media screen and (min-width: 769px) {
  // ===========step0
  .cart {
    .cart-title {
      // padding-right: 40px;
      width: 70%;
      justify-content: space-between;
      p {
        @include font(24px);
      }
      .item-title {
        margin-right: 50px;
      }
    }
    .shopcart-item {
      justify-content: center;
      .del {
        margin: 0px 10px;
      }
    }
    .cart-total {
      width: 77%;
      @include font(24px);
      margin: 20px 0px;
    }
    .cart-btn {
      width: 90%;
      margin: 40px 0px;
      .pro-btn-btn {
        // @include font(12px);
        text-align: center;
      }
    }
  }

  // ===============step1
  .pay {
    margin: auto;
    width: 50%;
    .pay-title {
      @include font(28px);
      // margin: 5px;
    }
    .pay-txt {
      // width: 20%;
      @include font(20px);
      margin: 20px 0px;
      :deep(Input) {
        width: 150%;
      }
    }
    .card-txt {
      width: 30%;
    }
    .card-txt-time {
      width: 27%;
    }
    .pay-check {
      @include font(18px);
    }
    .pay-btn {
      width: 100%;
      .pro-btn-btn {
        margin: 40px 10px;
        @include font(16px);
      }
    }
  }

  // ======================step2
  .pay-success {
    .pay-icon {
      i {
        font-size: 800%;
      }
    }
    .pay-success-txt {
      p {
        @include font(20px);
        margin: 20px;
        text-align: center;
      }
    }
    .pay-success-btn {
      .pro-btn-btn {
        @include font(16px);
      }
    }
  }
}
</style>
<template>
  <div class="step">
    <stepbar />
  </div>
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
      <button class="pro-btn-btn btn-gold_2nd $clr_gold_L1" @click="cart">
        回上一步
      </button>
      <button class="pro-btn-btn btn-gold" @click="buy">確定結帳</button>
    </div>
  </div>
</template>

<script>
import Input from "@/components/Input.vue";
import stepbar from "@/components/stepbar.vue";

export default {
  name: "ShopPayment",
  components: {
    Input,
    stepbar,
  },
  methods: {
    cart() {
      this.$router.push("/shopcart");
    },
    buy() {
      this.$router.push("/shoppaysuccess");
    },
  },
};
</script>



<style lang="scss" scoped>
@import "../assets/scss/base/font.scss";
@import "../assets/scss/base/base.scss";
@import "../assets/scss/base/color.scss";
@import "../assets/scss/components/btn.scss";

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
      @include font(12px)
    }
  }
}

@media screen and (max-width: 768px) {
}

@media screen and (min-width: 769px) {
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
        @include font(16px)
      }
    }
  }
}
</style>
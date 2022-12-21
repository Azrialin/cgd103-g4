<template>
  <div class="bodyy">
    <ol class="listt">
      <li :class="{ step: step == 0 }" class="step1">
        <i class="fa-solid fa-cart-shopping"></i>購物車
      </li>
      <li :class="{ step: step == 1 }">
        <i class="fa-regular fa-credit-card"></i>付款頁面
      </li>
      <li :class="{ step: step == 2 }">
        <i class="fa-solid fa-check"></i>付款成功
      </li>
    </ol>
  </div>
</template>
<script>
export default {
  props: {
    step: Number,
  },
};
</script>
<style lang="scss" scoped>
@import "../assets/scss/base/font.scss";
@import "../assets/scss/base/base.scss";
@import "../assets/scss/base/color.scss";
@import "../assets/scss/components/btn.scss";

.bodyy {
  display: flex;
  align-items: center;
  margin: 20px 0px 30px 0px;
  .listt {
    width: 100%;
    display: flex;
    justify-content: center;

    li {
      display: flex;
      flex-direction: column;
      width: 80px;
      height: 80px;
      @include font(12px);
      color: $color_444;
      text-align: center;
      background-color: $clr_gold_L2;
      border-radius: 50%;
      justify-content: center;
      position: relative;
    }
    .step1 {
      background-color: $clr_gold_L1;
    }
    i {
      font-size: 20px;
      margin-bottom: 5px;
    }
    li + li {
      margin-left: 30px;
    }
    li + li::before {
      content: "";
      position: absolute;
      width: 30px;
      height: 4px;
      background-color: $clr_gold_L2;
      top: 0;
      bottom: 0;
      margin: auto;
      left: -30px;
    }
  }
}

@media screen and (min-width: 769px) {
  .bodyy {
    .listt {
      li {
        width: 120px;
        height: 120px;
        @include font(18px);
        text-align: center;
      }
      i {
        font-size: 24px;
        margin-bottom: 10px;
      }
      li + li {
        margin-left: 150px;
      }
      li + li::before {
        width: 150px;
        left: -150px;
      }
    }
  }
}
</style>
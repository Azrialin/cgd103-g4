<template>
  <div class="cart-item">
    <div class="cart-pic">
      <img :src="img" />
    </div>
    <div class="cart-title">
      <p>{{ title }}</p>
    </div>
    <div class="cart-price">
      <p>${{ price }}</p>
    </div>
    <div class="cart-amount">
      <button @click="handleAmount(amount-1)" class="minus">-</button>
      <input
        type="text"
        :value="amount"
        class="input"
        @change="handleAmount($event.target.value)"
      />
      <button @click="handleAmount(amount+1)" class="minus">+</button>
    </div>
    <div class="cart-sum">
      <p>${{ total }}</p>
    </div>
  </div>
</template>


<script>
import Input from './Input.vue';
export default {
  components: { Input },
  props: {
    id: Number,
    img: String,
    title: String,
    price: Number,
    amount: Number, 
  },
  computed: {
    total() {
      return this.amount * this.price;
    },
  },
  methods: {
    handleAmount(amount) {
      console.log(amount)
      if(amount<0) return 
      this.$store.dispatch("updateItem", {
        id: this.id,
        amount: this.amount,
      });
      //console.log(this.amount);
    },
    
    
  },
};
</script>


<style lang="scss" scoped>
@import "../assets/scss/base/font.scss";
@import "../assets/scss/base/base.scss";
@import "../assets/scss/base/color.scss";
@import "../assets/scss/components/btn.scss";
.cart-item {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  color: $clr_gray_L1;

  .cart-amount {
    border: 1px solid $clr_gold_L1;
    border-radius: 10px;
    text-align: center;
    display: flex;
    justify-content: space-between;

    button {
      border: none;
      background-color: transparent;
    }
    input {
      border: none;
      background-color: transparent;
      text-align: center;
    }
  }
}

@media screen and (max-width: 768px) {
  .cart-item {
    @include font(12px);
    width: 100%;
    justify-content: space-between;
    margin: 20px 0px;
    .cart-price {
      display: none;
    }
    .cart-pic {
      width: 20%;
      margin: 5px;
      img {
        width: 100%;
      }
    }
    .cart-amount {
      margin: 5px;
      width: 20%;

      button {
        @include font(14px);
      }
      input {
        width: 13%;
        @include font(14px);
        text-align: center;
      }
    }
    .cart-sum {
      width: 15%;
      margin: 5px;
    }
  }
}

@media screen and (min-width: 769px) {
  .cart-item {
    @include font(20px);
    width: 70%;
    justify-content: space-between;
    margin: 30px 0px;
  }
  .cart-pic {
    width: 20%;
    img {
      width: 100%;
    }
  }
  .cart-amount {
    width: 15%;
    button {
      @include font(26px);
    }
    input {
      width: 20%;
      @include font(20px);
    }
  }
  .cart-sum {
    width: 15%;
    margin: 10px;
  }
}
</style>

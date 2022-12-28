<template>
  <div class="card">
   
      <div class="card-pic">
        <img :src="img" />
      </div>
      <div class="card-txt">
        <h4 class="card-title">{{ title }}</h4>
        <p class="card-price">${{ price }}</p>
      </div>
    
  </div>
</template>

<style lang="scss" scoped>
@import "../assets/scss/base/font.scss";
@import "../assets/scss/base/base.scss";
@import "../assets/scss/base/color.scss";
@import "../assets/scss/components/btn.scss";

.card {
  width: 90%;
  height: 200px;
  margin: 10px;
  &:hover {
    box-shadow: 4px 4px 4px 0px #dadada;
  }
  &:hover img {
    transform: scale(1.05);
    transition: 0.8s;
  }
  a {
    text-decoration: none;
    color: $clr_gray_L1;
  }
  border: 1px solid $front_color_main;
  border-radius: 5px;

  .card-pic {
    overflow: hidden;
    padding: 10px;
    margin: auto;
    border-radius: 5px;
    img {
      border-radius: 5px;
      width: 100%;
      height: 100%;
    }
  }
  .card-txt {
    padding: 0px 15px;
    text-align: left;
    .card-title {
      @include font(16px);
      letter-spacing: 0px;
    }
    .card-price {
      @include font(16px);
      margin: 7px 0px;
    }
  }
}

@media screen and (min-width: 769px) {
  .card {
    height: 225px;
  }
}
</style>

<script>
export default {
  props: {
    img: String,
    title: String,
    price: Number,
  },
//   created() {
//     this.getData();
//   },
//   methods: {
//     getData() {
//       // this.result = result;
//       fetch("http://localhost/g4/public/phpfiles/getProducts.php")
//         .then((res) => res.json())
//         .then((json) => {
//           this.result = json;
//           console.log(this.result);
//         });
//     },
//     saveData() {
//       console.log(this.result);
//     },
//   },
};
</script>
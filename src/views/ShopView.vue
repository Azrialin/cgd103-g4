<template>
<<<<<<< HEAD
  <breadcrumb/>
  <bar/>
  <div class="about">
    <h1>This is an shop page</h1>
=======
<div class="shop-container">
  <div class="shop-content">
    <breadcrumb/>
    <div class="bar">
    <bar/>
    </div>
    <div class="card-container .row-cols-2 > *">
      <div class="card-content">
          <productcard/>
          <productcard/>
          <productcard/>
          <productcard/>
        <!-- <li v-for="list in lists" :key="list">
        </li> -->
      </div>

    </div>
    


>>>>>>> vivi
  </div>
</div>

</template>
<script>
    import Header from "@/components/Header.vue"
    import breadcrumb from "@/components/breadcrumb.vue"
    import bar from "@/components/bar.vue"
    import productcard from "@/components/ProductCard.vue"
    export default {
        name: "HeaderView",
        components:{
            Header,
            breadcrumb,
            bar,
            productcard
        },
        
    }
    
</script>

<style lang="scss" scoped>
@import "../assets/scss/layout/grid.scss";
  .shop-container{
    width: 100%;
    margin: auto;
    padding: 0px;
    margin: 0;
    outline: 1px solid red;
    .shop-content{
      // margin: auto;
      width: 100%;
      padding: 0px;
      outline: 1px solid blue;
      .bar{
        display: none;
      }
      .card-content{
        padding: 15px;
        display: flex;
      }
    }
  }

  @media screen and (min-width: 1024px){
    .shop-content{
      max-width: 1200px;
    }
  }




</style>
<template>
<div class="shop-container">
  <breadcrumb/>
  <div class="select">
    <Select/>
  </div>
  <div class="shop-content">
    <div class="side">
      <side/>
    </div>
    <div class="row">
      <div class="card-container ">
        <div v-for="item in list" :key="item.id" class="card-box col-sm-6 col-lg-3">
            <productcard :title="item.title" :price="item.price" :img="item.img"/>
        </div>
      </div>
    </div>
    


  </div>
</div>

</template>
<script>
    import Header from "@/components/Header.vue"
    import breadcrumb from "@/components/breadcrumb.vue"
    import side from "@/components/side.vue"
    import productcard from "@/components/ProductCard.vue"
    import Select from "@/components/Select.vue"
    export default {
        name: "HeaderView",
        components:{
            Header,
            breadcrumb,
            side,
            productcard,
            Select,
        },
        data(){
          return{
            list:[
              {
                id:1,
                img:require(`@/assets/img/products/pro.jpg`),
                title:"九州干貝醬",
                price:300,
              },
              {
                id:2,
                img: require(`@/assets/img/products/Rectangle 467.png`),
                title:"長崎蛋糕",
                price:460,
              },
              {
                id:3,
                img: require(`@/assets/img/products/pro.jpg`),
                title:"長崎蛋糕",
                price:460,
              },
              {
                id:4,
                img: require(`@/assets/img/products/pro.jpg`),
                title:"長崎蛋糕",
                price:460,
              },
              {
                id:5,
                img: require(`@/assets/img/products/pro.jpg`),
                title:"長崎蛋糕",
                price:460,
              },
              {
                id:6,
                img: require(`@/assets/img/products/pro.jpg`),
                title:"長崎蛋糕",
                price:460,
              },
              {
                id:7,
                img: require(`@/assets/img/products/pro.jpg`),
                title:"長崎蛋糕",
                price:460,
              },
              {
                id:8,
                img: require(`@/assets/img/products/pro.jpg`),
                title:"長崎蛋糕",
                price:460,
              },
            ]
          }
        }
    }
    
</script>

<style lang="scss" scoped>
@import "../assets/scss/layout/grid.scss";
  .shop-container{
    width: 100%;
    margin: auto;
    outline: 1px solid red;
    // .select{
    //   display: block;
    // }
    .shop-content{
      display: flex;
      flex-wrap: wrap;
      padding: 0px;
      
    }
    .card-container{
      width: 90%;
      margin: auto;
      display: flex;
      flex-wrap: wrap;
      .card-box{
        // width: 48%;
        margin: auto;
      }
      
    }
    
  }

  @media screen and (max-width:768px){
    .side{
      display: none;
    }
    .card-box{
      width: 48%;
    }
  }
  @media screen and (min-width: 769px){
    .shop-container{
      max-width: 1200px;
      margin: auto;
      .shop-content{
        display: flex;
        flex-wrap: wrap;
      }
      .row{
        width: 80%;
        margin: auto;
        justify-content: center;
      }
      .select{
        display: none;
      }
      .bar{
        display: block;
      }
      // .card-container{
      //   width: 100%;
      // }
      .card-box{
        width: 23%;
      }
    }
  }




</style>
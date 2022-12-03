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
  <div class="pagination">
    <Pagination @change="page=$event" :defaultCurrentPage="page" :defaultPageSize="9" :total="30"/>
  </div>
</div>

</template>
<script>
    import Header from "@/components/Header.vue"
    import breadcrumb from "@/components/breadcrumb.vue"
    import side from "@/components/side.vue"
    import productcard from "@/components/ProductCard.vue"
    import Select from "@/components/Select.vue"
    import Pagination from "@/components/pagination/Pagination.vue"
    export default {
        name: "ShopView",
        components:{
            Header,
            breadcrumb,
            side,
            productcard,
            Select,
            Pagination,
        },
        data(){
          return{
            list:[
              {
                id:1,
                img:require(`@/assets/img/products/pro1.jpg`),
                title:"JS怪奇薯條",
                price:180,
              },
              {
                id:2,
                img: require(`@/assets/img/products/pro2.jpg`),
                title:"曲奇餅乾",
                price:280,
              },
              {
                id:3,
                img: require(`@/assets/img/products/pro3.jpg`),
                title:"透明醬油",
                price:320,
              },
              {
                id:4,
                img: require(`@/assets/img/products/pro4.jpg`),
                title:"長崎蛋糕",
                price:460,
              },
              {
                id:5,
                img: require(`@/assets/img/products/pro5.jpg`),
                title:"明太子醬",
                price:480,
              },
              {
                id:6,
                img: require(`@/assets/img/products/pro6.jpg`),
                title:"九州昆布湯包",
                price:320,
              },
              {
                id:7,
                img: require(`@/assets/img/products/pro7.jpg`),
                title:"旺旺仙貝",
                price:150,
              },
              {
                id:8,
                img: require(`@/assets/img/products/pro8.jpg`),
                title:"七彩洋芋片",
                price:280,
              },
              {
                id:9,
                img: require(`@/assets/img/products/pro9.jpg`),
                title:"九州黑醋",
                price:220,
              },
              {
                id:10,
                img: require(`@/assets/img/products/pro10.jpg`),
                title:"JS可樂餅",
                price:350,
              },
              {
                id:11,
                img: require(`@/assets/img/products/pro11.jpg`),
                title:"柚子胡椒",
                price:180,
              },
              {
                id:12,
                img: require(`@/assets/img/products/pro12.jpg`),
                title:"鬼頭刀罐頭",
                price:480,
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
  .pagination{
    width: 100%;
    margin: 20px 0px;
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
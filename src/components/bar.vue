<template>
  <ul class="wrapper font-18">
  <h2>商品</h2>
  <hr>
    <li v-for="(item,index) in list" :key="'item'+index">
      <i class="fa-solid fa-angle-down"
        :class="{'open':item.open}"></i>
      <div class="title" @click="item.open=!item.open">
        {{item.title}}
      </div>
      <baritem :list="item"/>
      <hr class="hr-bar">
    </li>
  </ul>
  
</template>

<style lang="scss" scoped>
@import "../assets/scss/base/font.scss";
@import "../assets/scss/base/base.scss";
@import "../assets/scss/base/color.scss";
  .wrapper{
    list-style: none;
    width: 150px;
    position: sticky;
    z-index: 20;
    li{
      position: relative;
      cursor: pointer;
      color: $color_444;
      
      i{
        position: absolute;
        right: 2px;
        transition: transform .3s ease-in-out;
        &.open{
          transform: rotate(180deg);
        }
      }

      .hr-bar{
        color:$front_color_main;
      }
    }
  }
</style>


<script>
import baritem from '@/components/baritem.vue'   
export default {
  data:()=>{
    return {
      list:[
        {
          title:"所有商品",
          open:false,
          sublist:[
            "子系列","子系列"
          ]
        },
        {
          title:"紀念品系列",
          open:false,
          sublist:[
            "子系列","子系列"
          ]
        },
        {
          title:"特產系列",
          open:false,
          sublist:[
            "子系列","子系列"
          ]
        }
      ]
    }
  },
  components:{
    baritem
  }
};

</script>


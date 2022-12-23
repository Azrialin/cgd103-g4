<template>

<ul class="wrapper font-18">
<h3>商品</h3>
<hr class="hr-bar">
  <li>所有商品</li>
  <hr class="hr-bar">
  <li v-for="(item,index) in list" :key="'item'+index">
    <i class="fa-solid fa-angle-down"
      :class="{'open':item.open}"></i>
    <div class="title" @click="item.open=!item.open">
      {{item.title}}
    </div>
    <sideitem :list="item"/>
    <hr class="hr-bar">
  </li>
</ul>

</template>




<script>
import sideitem from '@/components/sideitem.vue'   
export default {
  components:{
    sideitem
  },
  data(){
    return {
      list:[
        // {
        //   title:"所有商品",
        //   open:false,
        //   sublist:[
        //     "","",
        //   ]
        // },
        {
          title:"紀念品系列",
          open:false,
          sublist:[
            "水壺","便當盒",
          ]
        },
        {
          title:"特產系列",
          open:false,
          sublist:[
            "零食","調味料",
          ]
        }
      ]
    }
  },
  
};

</script>


<style lang="scss" scoped>
@import "../assets/scss/base/font.scss";
@import "../assets/scss/base/base.scss";
@import "../assets/scss/base/color.scss";

.wrapper{
  position: sticky;
  z-index: 20;
  list-style: none;
  width: 170px;
  padding: 10px;
  h3{
    @include font(30px);
  }
  li{
    @include font(20px);
    position: relative;
    cursor: pointer;
    color: $color_444;
    margin: 20px 0px;
    
    i{
      position: absolute;
      right: 2px;
      transition: transform .3s ease-in-out;
      &.open{
        transform: rotate(180deg);
      }
    }

  }
  .hr-bar{
    color:$front_color_main;
  }
}

</style>


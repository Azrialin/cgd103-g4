<template>
    <select id="Select_DropDown">
        <option disabled selected value="0">{{DefaultText}}</option>
        <option class="options" v-for="item in option" :key="item.value" :label="item.label" :value="item.value"></option>
    </select>
</template>

<script>
export default {
  data(){
      return{
      }
  },
  props:{
    option:Array,
    DefaultText:String,
  }
}
</script>

<style lang="scss" scope>
@import "../assets/scss/base/font.scss";
@import "../assets/scss/base/color.scss";
  #Select_DropDown{
      @include font(14px);
      text-align: left;
      border: 1px solid $front_color_main;
      border-radius: 10px;
      padding: 10px;
      font-weight:normal;
      /*移除箭頭樣式*/
      appearance:none;
      -moz-appearance:none;
      -webkit-appearance:none;
      /*改變右邊箭頭樣式*/
      background: url("../assets/img/🦆 icon _chevron-down_.svg")90% 50% no-repeat scroll #fff;
      outline: none;
  }
</style>
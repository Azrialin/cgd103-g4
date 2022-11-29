<template>
    <select id="Select_DropDown" class="font-20" v-model="selected" :option="options" label="請選擇">
        <option value="0" selected disabled>
          -請選擇-
        </option>
        <option class="options" v-for="item in options" :key="item.value" :label="item.label" :value="item.value"></option>
    </select>
</template>

<script>
export default {
  data(){
      return{
          selected:'0',
          options: [{
            value: '1',
            label: '-請選擇-'
          }, {
            value: '2',
            label: '-請選擇-'
          }, {
            value: '3',
            label: '-請選擇-'
          }, {
            value: '4',
            label: '-請選擇-'
          }, {
            value: '5',
            label: '-請選擇-'
          }]
      }
  }
}
</script>

<style lang="scss" scope>
@import "../assets/scss/base/font.scss";
@import "../assets/scss/base/color.scss";
  #Select_DropDown{
      width: 150px;
      height: 50px;
      border: 1px solid $front_color_main;
      border-radius: 10px;
      padding: 0 19px;
      font-weight:normal;
      /*移除箭頭樣式*/
      appearance:none;
      -moz-appearance:none;
      -webkit-appearance:none;
      /*改變右邊箭頭樣式*/
      background: url("../assets/img/🦆 icon _chevron-down_.svg")90% 50% no-repeat scroll transparent;
      outline: none;
  }
</style>
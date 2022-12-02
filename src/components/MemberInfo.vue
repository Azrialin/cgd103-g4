<template>
    <div>
        <form>
            <h3 class="top">基本資料設定</h3>
            <hr class="underline">
            <input  v-model="result.id"/>
        </form>
    </div>
</template>

<script>
const result = {
    id:123,

}

import Input from '@/components/Input.vue'
export default {
    components: {
      Input,
    },
    data(){
        return{
            result:{}
        }
    },
    created(){
        this.getData();
    },
    methods:{
        getData(){
            this.result = result;
        }
    }
}
</script>

<style scoped lang="scss">
  @import "../assets/scss/base/color.scss";
  @import "../assets/scss/layout/grid.scss";
  @import "../assets/scss/base/font.scss";


</style>

<style lang="scss">
    .Input{
    width: 80% !important;
    height: 10px!important;
    padding: 10px!important;
  }
  .top{
    padding-bottom: 10px;
    margin-left: 1%;
    display: flex;
    flex-direction: flex-start;
    width: 100px;
    border-bottom: 2px solid #D7BF9D;
  }
  .underline{
    margin-top: 0;
    height: 1px;
    background: #BC955C;
    border: none;
  }
</style>
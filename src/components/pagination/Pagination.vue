<template>
    <div id="pagination">
        <!--上一頁按鈕-->
        <input class="btn-prev" type="button" value="< 上一頁" @click="setPage(current-1)">
        <!--分頁器-->
        <pager :total-page="totalPage" :default-current-page="current" @change="pageChange"></pager>
        <!--下一頁按鈕-->
        <input class="btn-next" type="button" value="下一頁 >" @click="setPage(current+1)">
    </div>
</template>

<script>
    import Pager from "./Pager.vue";
  export default {
    name: "Pagination",
    components:{
      Pager
    },
    props:{
      // 預設當前頁碼
      defaultCurrentPage:{
        type:Number,
        default(){
          return 1;
        }
      },
      // 預設每頁資料的條數
      defaultPageSize:{
        type:Number,
        default(){
          return 10;
        }
      },
      // 資料的總條數
      total:{
        type:Number,
        default(){
          return 100;
        }
      },
    },
    data(){
      return{
        current:this.defaultCurrentPage,
        hover: false,
      }
    },
    computed:{
      // 計算資料總頁數
      totalPage(){
        return Math.ceil(this.total/this.defaultPageSize);
      }
    },
    methods:{
      setPage(page){
        // 左邊邊界
        if(page<1)this.current=1;
        // 右邊邊界
        else if(page>this.totalPage){
          this.current=this.totalPage;
        }
        else{
          this.current=page;
        }
        this.$emit('change',this.current);
      },
      pageChange(page){
        this.$emit('change',page);
      },
    }
  }
</script>

<style scoped lang="scss">
@import "../../assets/scss/base/color.scss";
@import "../../assets/scss/base/font.scss";
  #pagination{
        display: flex;
        justify-content: center;
  }
  .btn-prev, .btn-next{
    cursor: pointer;
    width:60px;
    height:30px;
    line-height: 30px;
    padding:0;
    text-align: center;
    border:none;
    color: $color_444;
    background: #ffff;

  }
  input:hover{
    color: $front_color_main ;
    border-bottom: 2px solid $front_color_main;
  }
</style>
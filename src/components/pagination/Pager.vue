<template>
    <ul class="pager">
        <!--首頁-->
        <li class="number"
            :class="{active: this.current===1}"
            @click="setPage(1)">1</li>

        <!--左邊更多-->
        <li class="more left"
            v-if="totalPage>centerSize+2 && current-centerSize/2-1>1"
            @click="setPage(current-jumpSize)">...</li>

        <!--中間頁碼-->
        <li class="number"
            v-for="(page,index) in centerPages"
            :class="{active: current===page}"
            :key="index"
            @click="setPage(page)">{{ page }}</li>

        <!--右邊更多-->
        <li class="more right"
            v-if="totalPage>centerSize+2 && current+centerSize/2+1<totalPage"
            @click="setPage(current+jumpSize)">...</li>

        <!--最後一頁-->
        <li class="number"
            v-if="totalPage!==1"
            :class="{active: this.current=== totalPage}"
            @click="setPage(totalPage)">{{ totalPage }}</li>
    </ul>
</template>

<script>
  export default {
    name: "Pager",
    props:{
      totalPage:Number,//資料總頁數
      defaultCurrentPage:Number,//預設當前頁碼
      centerSize:{
        type:Number,
        default(){
          return 3;
        }
      },
      jumpSize:{
        type:Number,
        default(){
          return 3;
        }
      }
    },
    computed:{
      centerPages(){
        let centerPage=this.current;
        if(this.current>this.totalPage-3){
          centerPage=this.totalPage-3;
        }
        if(this.current<4){
          centerPage=4;
        }

        if(this.totalPage<=this.centerSize+2){
          const centerArr=[];
          for(let i=2;i<this.totalPage;i++){
            centerArr.push(i);
          }
          return centerArr;
        }
        else{
          const centerArr=[];
          for(let i=centerPage-2;i<=centerPage+2;i++){
            centerArr.push(i);
          }
          return centerArr;
        }
      }
    },

    data(){
      return{
        current:this.defaultCurrentPage,
      }
    },

    watch:{
      defaultCurrentPage:function(newValue,oldValue){
        this.current=newValue;
      }
    },

    methods:{
      setPage(page){
        // 左邊邊界
        if(page<1) this.current=1;
        // 右邊邊界
        else if(page>this.totalPage){
          this.current=this.totalPage;
        }
        else{
          this.current=page;
        }
        this.$emit('change',this.current);
      },
    }
  }
</script>

<style scoped lang="scss">
@import "../../assets/scss/base/color.scss";
@import "../../assets/scss/base/font.scss";
    ul{
        list-style: none;
        height: 27px;
        width: 304px;
        margin-right: auto;
        margin-left: auto;
    }
    ul li{
        float: left;
        width:10px;
        height:30px;
        line-height: 30px;
        margin:0 8px 0 0;
        padding:0 6px;
        text-align: center;
        border:none;
        color: $color_444;
    }
    .active{
        border-bottom:2px solid $front_color_main;
    }
</style>
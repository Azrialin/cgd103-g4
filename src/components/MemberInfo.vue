<template>
    <div>
        <form>
            <h3 class="top">基本資料設定</h3>
            <hr class="underline">
            <p class="must">*為必填欄位</p>
            <h3 class="info">姓名<span>*</span></h3>
            <input  v-model="result.id"/>
            <h3 class="info">英文名</h3>
            <input  v-model="result.englishName"/>
            <h3 class="info">密碼<span>*</span></h3>
            <input class="unchangeable"  v-model="result.psw" disabled/>
            <h3 class="info">電子信箱<span>*</span></h3>
            <input class="unchangeable"  v-model="result.email" disabled/>
            <h3 class="info">地址</h3>
            <input  v-model="result.address"/>
            <h3 class="info">電話號碼<span>*</span></h3>
            <input  v-model="result.phone"/>
            <h3 class="info">國籍</h3>
            <select name="" id="">
                <option value="1">Taiwan</option>
                <option value="2">Japan</option>
            </select>
            
            <!-- <input  v-model="result.nationality"/> -->

        </form>
    </div>
</template>

<script>
const result = {
    id:123,
    englishName:"Eric",
    psw:"########",
    email: "Y123@gmail.com",
    address: "桃園市中壢區復興路46號",
    phone: "0912345678",
    nationality: "",
    gender: "-女-"
}

export default {
    components: {

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

<style scoped lang="scss">

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
    height: 0.5px;
    background: #BC955C;
    border: none;
  }
  .must{
    color: #941111;
    display: flex;
    justify-content: flex-end;
    margin: 20px;
  }
  .info{
    display: flex;
    justify-content: flex-start;
  }
  
  input,select,option{
    width: 100%;
    margin: 20px 0;
    padding: 10px;
    border-radius: 10px;
    border: 1px solid #BC955C ;
    outline:none;
    text-align: left;
  }
  select{
    appearance: none;
    background: url("../assets/img/🦆 icon _chevron-down_.svg")90% 50% no-repeat scroll transparent;
  }
  .unchangeable{
     border: 1px solid #CCC ;
     background: #e6e6e6;
     color: #888;
  }
</style>
<template>
    <div>
        <form>
            <h3 class="top">基本資料設定</h3>
            <hr class="underline">
            <div class="form-wrapper">
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
              <h3 class="info">性別</h3>
              <select name="" id="">
                  <option value="1">-女-</option>
                  <option value="2">-男-</option>
              </select>

              <h3 class="info">護照號碼</h3>
              <input  v-model="result.passport"/>

              <div class="button-section">
                <button class="btn-gold_2nd">取消修改</button>

                <button class="btn-gold">儲存修改</button>
              </div>
              <!-- <input  v-model="result.nationality"/> -->
            </div>


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
    gender: "-女-",
    passport: ""
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
  @import "../assets/scss/components/btn.scss";


</style>

<style scoped lang="scss">
  .form-wrapper{
    padding: 10%;
    padding-top: 20px;
  }
  .top{
    padding-bottom: 10px;
    margin-left: 10%;
    display: flex;
    flex-direction: flex-start;
    width: 100px;
    border-bottom: 2px solid #D7BF9D;
  }
  .underline{
    width: 100%;
    margin-top: 0;
    height: 0.5px;
    background: #BC955C;
    border: none;
  }
  .must{
    color: #941111;
    display: flex;
    justify-content: flex-end;
    // margin-right: 20px;
  }
  .info{
    // margin-left: 10%;
    display: flex;
    justify-content: flex-start;
  }
  
  input,select,option{
    width: 100%;//input 右邊沒有吃到form class 的10% padding要再問學長
    margin: 20px 0;
    margin-right: 10%;
    padding: 10px;
    border-radius: 10px;
    border: 1px solid #BC955C ;
    outline:none;
    text-align: left;
  }
  select{
    width: 100%;
    appearance: none;
    background: url("../assets/img/🦆 icon _chevron-down_.svg")90% 50% no-repeat scroll transparent;
  }
  .unchangeable{
     border: 1px solid #CCC ;
     background: #e6e6e6;
     color: #888;
  }
  span{
    color: #941111;
  }
  .button-section{
    margin-top: 5%;
    display:flex;
    flex-direction: row-reverse;
  }
  .button-section .btn-gold_2nd{
    margin-right: 10px;
  }

</style>
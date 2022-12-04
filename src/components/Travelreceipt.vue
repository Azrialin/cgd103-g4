<template>
    <div>
        <div>
            <div class="paid"><p>已付款</p></div>
            <h3 class="top">基本資料設定</h3>
            <hr class="underline">
            <div class="receipt-wrapper">
              <div class="receipt-frame">

              </div>
            </div>


        </div>
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
  .receipt-wrapper{
    padding: 10%;
    padding-top: 20px;
  }
  .paid{
    display: flex;
    justify-content: flex-end;
    position: relative;
  }
  .paid p{
    background: #BC955C;
    box-sizing: border-box;
    margin-right: 5%;
    position: relative;
    padding: 10px;
    top:-30px;
    color: white;
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
    flex-wrap: wrap;
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
    box-sizing: border-box;
    // display: flex;
    // flex-wrap: wrap;
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
    margin-left: 20px;
  }

@media (min-width:1200px) {
  
  .try{
    display: inline-block;
    justify-content: start;
    // box-sizing: border-box;
  }
}

</style>
<template>
    <div>
        <form method="post" enctype="multipart/form-data">
            <h3 class="top">基本資料設定</h3>
            <hr class="underline">
            <div class="form-wrapper">
              <p class="must">*為必填欄位</p>
              <div class="try col-xl-6">
                <h3 class="info">姓名<span>*</span></h3>
                <input name="mem_name" v-model="result.mem_name"/>
              </div>
              <div class="try col-xl-6">
                <h3 class="info">英文名</h3>
                <input name="mem_e_name" v-model="result.mem_e_name"/>
              </div>

              <h3 class="info">密碼<span>*</span></h3>
              <input name="mem_psw" v-model="result.mem_psw" />
              <h3 class="info">電子信箱<span>*</span></h3>
              <input name="mem_email" v-model="result.mem_email" />
              <h3 class="info">地址</h3>
              <input name="mem_address" v-model="result.mem_address"/>

              <div class="try col-xl-12">
                <h3 class="info ">電話號碼<span>*</span></h3>
                <input name="mem_phone" v-model="result.mem_phone"/>
                <h3 class="info ">國籍</h3>
                <select  name="mem_nation" id="" v-model="result.mem_nation">
                    <option  value="TAIWAN">Taiwan</option>
                    <option value="JAPAN">Japan</option>
                </select>
              </div>

              <div class="try col-xl-12">

                <h3 class="info ">護照號碼</h3>
                <input name="mem_passport_no" v-model="result.mem_passport_no"/>
              </div>

              <div class="button-section">
                <button class="btn-gold_2nd" type="button">取消修改</button>

                <button class="btn-gold" @click="saveData" type="button">儲存修改</button>
              </div>
              <!-- <input  v-model="result.nationality"/> -->
            </div>


        </form>
    </div>
</template>

<script>

const result = {
    // name:"123",
    // englishName:"Eric",
    // psw:"########",
    // email: "Y123@gmail.com",
    // address: "桃園市中壢區復興路46號",
    // phone: "0912345678",
    // nationality: "",
    // gender: "-女-",
    // passport: ""
}
import {BASE_URL} from '@/assets/js/common.js'

export default {
    components: {

    },
    data(){
        return{
            result:[],
            mem_e_name:"",
            mem_address:"",
            mem_nation:"",
            mem_passport_no:"",
            mem_nation:"",
            // mem_name:result.mem_name,
            // mem_psw:result.mem_psw,
            // mem_email:result.mem_email,
            // mem_phone:result.mem_phone,
            // mem_no: this.$store.state.mem_no,
        }
    },
    created(){
        this.getData();
    },
    computed: {
      mem_no() {
        return  this.$store.state.mem_no
      }
    },
    methods:{
        getData(){
          if(!this.mem_no){
            return 
          }
            this.result = result;
            // fetch(`http://localhost/cgd103-g4/public/phpfiles/getMemberInfo.php?memId=${this.mem_no}`)
              fetch(`${BASE_URL}/getMemberInfo.php?memId=${this.mem_no}`)
  
                    .then((res) => res.json())
                    .then((json) =>{
                      this.result = json[0];
                    })
        },
        saveData(){
          // fetch(`{BASE_URL}/prod_update.php`)
          if(this.result.mem_name ==="" || this.result.mem_psw ==="" || this.result.mem_email ==="" || this.result.mem_phone ===""){
            alert("必填資料有缺少~");
          }else{

            fetch(`${BASE_URL}/memberUpdate.php`, {
              method:'POST',body: new URLSearchParams(JSON.parse(JSON.stringify(this.result)))
            })
            .then((res)=>res.json())
            .then((result)=>{
              console.log(result);
            })
             alert("更改成功");
          }
        }
    },
    watch: {

    },
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
<template>
  <Banner :src="require(`@/assets/img/Banner/banner_travel.jpg`)"/>
  <breadcrumb :fonts="fonts"/>
  <div class="container_form">
    <h2>行程預約</h2>
    <form method="post" enctype="multipart/form-data">
    <div class="content_form">
      <div class="title_name">
      <!-- <div class="title_name" v-for="result in results" :key="result"> -->
        <!-- <h4>{{title['date']}}</h4> -->
        <h4>{{title['date']}}</h4>
        <h3>{{title['name']}}</h3>
        <h4>行程代號:{{title['code']}}</h4>
        <h4>費用:{{title['price']}}/人</h4>
      </div>
      <div class="main_chu">
        <div class="main_human">
          <h3>主要聯絡人</h3>
          <div class="person">
            <p>聯絡人*</p>
            <input class="inputcompo" name="mem_name" v-model="results['mem_name']" disabled/>
          </div>
          <div class="phone">
            <p>聯絡電話*</p>
            <input class="inputcompo" name="mem_phone" v-model="results['mem_phone']" disabled/>
          </div>
          <div class="email">
            <p>E-Mail</p>
            <input class="inputcompo" name="mem_email" v-model="results['mem_email']" disabled/>
          </div>
          <div class="say">
            <p>備註</p>
            <textarea name="package_said" v-model="packagesaid" class="inputcompo tetxcompo"></textarea>
          </div>
        </div>
        <div class="main_come">
          <h3>旅客資料</h3>
          <div class="country">
            <p>旅客國籍*</p>
            <input class="inputcompo" name="mem_nation" v-model="results['mem_nation']" disabled/>
          </div>
          <div class="many">
            <p>旅行人數*</p>
            <div class="count">
              <input class="inputcompo inmany" name="package_ticket_amount" v-model.number="number" />
              <div class="minus" @click="minus">-</div>
              <div class="plus" @click="add">+</div>
            </div>
          </div>
          <div class="card">
            <p>信用卡號碼*</p>
            <input class="inputcompo" name="credit_card" v-model="results['credit_card']"/>
            <input class="inputcompo" name="group_id" v-model="dt" style="display:none"/>
            <input class="inputcompo" name="package_total" v-model="toltol" style="display:none"/>
            <input class="inputcompo" name="package_no_fk" v-model="pcn" style="display:none"/>
            <input class="inputcompo" name="mem_no" v-model="mem_no" style="display:none"/>
            <input class="inputcompo" name="package_pay_status" v-model="package_pay_status" style="display:none"/>
          </div>
        </div>
      </div>
      <div class="main_online">
        <h3>線上預約須知</h3>
        <div class="okay">
          <input type="checkbox" v-model="yoma">同意我們的<a href="">使用條款</a>和<a href="">隱私政策</a>
        </div>
        <div class="checksub">
          <div  @click="setData()">確認送出</div>
        </div>
      </div>
    </div>
    </form>
  </div>
</template>
<script>
    import {BASE_URL} from '@/assets/js/common.js'
    import Header from "@/components/Header.vue"
    import Banner from "@/components/Banner.vue"
    import breadcrumb from "@/components/breadcrumb.vue"
    import input from "@/components/Input.vue"
    export default {
      name: "HeaderView",
      components:{
        input,
        Header,
        Banner,
        breadcrumb,
      },
      data(){
        return{
          yoma:false,
          results:[],
          fonts:[{name:'首頁',source:'/'},{name:'行程方案',source:'travel'},{name:'預約行程',source:'travelcheck'}],
          title:{
            date:`${this.$route.query.date.toString().split(",")[0]}`,
            name:JSON.parse(localStorage.getItem('Title')).theTitle,
            code:"JTR05221122A",
            price:JSON.parse(localStorage.getItem('Title')).thePrice
          },
          number:1,
          packagesaid:"",
          dt:"",
          toltol:"",
          package_pay_status:"未付款",
          pcn:parseInt(JSON.parse(localStorage.getItem('Title')).theNo),
        }
      },
      created() {
        this.getData();
      },
      methods:{
        setData(){
          if(this.yoma == false){
            alert("請勾選同意喔")
            return
          }
          else if(!this.mem_no){
            this.$router.push("/login");
            return 
          }
          // const seturl = new URL('http://localhost/cgd103-g4/public/phpfiles/setTravelcheck.php');
          const abc = {
            package_pay_status: this.package_pay_status,
            package_ticket_amount: this.number,
            package_said: this.packagesaid,
            package_no_fk: this.pcn,
            group_id: this.dt,
            package_total: this.toltol,
            mem_no: this.mem_no,
          }
          // fetch(seturl,{
          fetch(`${BASE_URL}/setTravelcheck.php`,{
            method:'POST',
            // credentials: "include",
            body: new URLSearchParams(abc)
            })
            
            .then((res)=>res.json())
            .then((kuku)=>{
              console.log(kuku);
              this.$router.push("/Travelcheck_suc");
          })
        },
        getData(){

          // const myurl = new URL(`http://localhost/cgd103-g4/public/phpfiles/getTravelcheckmember.php?memId=${this.mem_no}`);
          // fetch(myurl)
          fetch(`${BASE_URL}/getTravelcheckmember.php?memId=${this.mem_no}`)
          .then((rs)=>rs.json())
          .then((json)=>{
            this.results=json[0];
            console.log(this.results);
          })
        },
        add(){
          this.number++;
          this.toltol = this.title.price * this.number
        },
        minus(){
          if(this.number>1)
            this.number--;
            this.toltol = this.title.price * this.number
          }
      },
      mounted(){
        // console.log(this.$route.query.date)
        this.dt = parseInt(this.$route.query.date.toString().split(",").pop())
        return this.$route.query.date
        
        // if (!this.mem_no){
        //   this.$router.push("/login");
        //   return 
        // }
      },
      computed:{
        toltol(){
           return this.toltol = this.title.price * this.number
        },
        mem_no() {
          return parseInt(this.$store.state.mem_no)
        }
      },
    }
</script>
<style lang="scss" scoped>
@import "../assets/scss/base/font.scss";
@import "../assets/scss/base/color.scss";
@import "../assets/scss/components/btn.scss";
// *{
//   outline: solid 1px;
// }

.container_form{
  // background-color: #f0a;
  box-sizing: border-box;
  padding: 0px 0px 100px 0px ;
  width: 100%;
  h2{
    @include font(26px);
    text-align: center;
    padding: 40px;
  }
  .content_form{
    box-sizing: border-box;
    width: 100%;
    background-color: #f8f8f8;
    padding: 20px 20px;
    border-radius: 10px;
    border: 1px solid $clr_gold_L2;
    .title_name{
      border-bottom: solid 1px $front_color_main;
      padding: 0px 20px 20px 20px;
      h3{
        @include font(24px);
        text-align: center;
        padding: 10px;
      }
      h4{
        @include font(12px);
        text-align: center;
        padding: 10px;
      }
    }
    .main_chu{
      .main_human{
        padding: 0px 0px 50px 0px;
        .inputcompo{  
          box-sizing: border-box;
          width: 100%;
          padding: 20px 10px;
          border: solid 1px $front_color_main;
          border-radius: 10px;
          font-size: 24px;
        }
        .inputcompo.tetxcompo{
          resize: none;
          height: 300px;
        }
        p{
          @include font(14px);
          padding: 20px 0px;
        }
        h3{
          @include font(20px);
          padding: 20px 0px;
        }
        
        
      }
      .main_come{
        padding: 0px 0px 50px 0px;
        .count{
          position: relative;
          .minus,.plus{
            position: absolute;
            top: 0;
            @include font(26px);
            cursor: pointer;
            height: 100%;
            display: flex;
            align-items: center;
            padding: 10px;
            box-sizing: border-box;
            color: $front_color_main;
            user-select: none;
          }
          .plus{
            right: 0;
          }
        }
        .inputcompo.inmany{
          text-align: center;
          color: $front_color_main;
        }
        .inputcompo{  
          box-sizing: border-box;
          width: 100%;
          padding: 20px 10px;
          border: solid 1px $front_color_main;
          border-radius: 10px;
          font-size: 24px;
        }
        p{
          @include font(16px);
          padding: 20px 0px;
        }
        h3{
          @include font(20px);
          padding: 20px 0px;
        }
        
        
      }
    }
    .main_online{
      border-top: 1px solid $front_color_main;
      // margin-top: 30px;
      .inputcompo{  
        box-sizing: border-box;
        width: 100%;
        padding: 20px 10px;
        border: solid 1px $front_color_main;
        border-radius: 10px;
        font-size: 24px;
      }
      h3{
        @include font(20px);
        padding-top: 40px;
      }
      .okay{
        @include font(14px);
        padding: 40px;
        text-align: center;
        a{
          text-decoration: none;
          color: $front_color_main
        }
      }
      .checksub{
        @include font(16px);
        display: flex;
        justify-content: center;
        div{
          cursor: pointer;
          background-color: $front_color_main;
          padding: 15px;
          border-radius: 10px;
          border: solid 1px $front_color_main;
          color: #fff;
          transition: 0.3s;
          &:hover{
            background-color: #f8f8f8;
            color: $front_color_main;
          }
        }
        // div.nono{
        //   background-color: $front_color_main;
        // }
      }
    }
  }
}
@media screen and (min-width: 1024px){
  .container_form{
    h2{
      @include font(32px);
      text-align: center;
    }
    .content_form{
      .title_name{
        h3{
          @include font(32px);
          text-align: center;
        }
        h4{
          @include font(16px);
          text-align: center;
        }
      }
      .main_chu{
        display: flex;
        .main_human{
          padding: 20px 20px 50px 20px;
          width: 50%;
          .inputcompo{  
            box-sizing: border-box;
            width: 100%;
            padding: 20px 10px;
            border: solid 1px $front_color_main;
            border-radius: 10px;
            font-size: 24px;
          }
          .inputcompo.tetxcompo{
            resize: none;
            height: 300px;
          }
          p{
            @include font(16px);
            padding: 20px 0px;
          }
          h3{
            @include font(24px);
            padding: 20px 0px;
          }
        }
        .main_come{
          border-left: 1px solid $front_color_main;
          padding: 20px 20px 50px 20px;
          width: 50%;
          .count{
            position: relative;
            .minus,.plus{
              position: absolute;
              top: 0;
              @include font(36px);
            }
          }
          h3{
            @include font(24px);
          }
        }
      }
      .main_online{
        padding: 0px 20px;
        border-top: 1px solid $front_color_main;
        h3{
          @include font(24px);
        }
        .okay{
          @include font(16px);
          text-align: center;
        }
      }
    }
  }
}
</style>
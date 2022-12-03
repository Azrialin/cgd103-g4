<template>
  <div class="Home">
    <div>
      <div class="title">
        <h1>Topic 最新消息</h1>
        <hr>
      </div>
      <ul>
        <li v-for="list in lists" :key="list">
          <div class="HomeNew">
            <div class="TopicsCard">
              <div class="CardWrapper">
                <img class="col-5" :src="list.imageurl">
                <div class="HomeNew-Text">
                  <p class="HomeNew-Title">{{list.HomeNew_Title}}</p>
                  <p class="HomeNew-Subtitle">{{list.HomeNew_Subtitle}}</p>
                </div>
              </div>
            </div>
          </div>
        </li>
        <div class="OtherNews">
          <div class="Covid-19">
            <div class="CovidText">
              <p>【JET SPEED】為了安全騎行</p>
              <button>關於新型冠狀病毒傳染病對策</button>
            </div>
          </div>
          <div class="Js-Official">
            <div class="Js-SocialMedia">
              <p>「JET SPEED」公式instergram</p>
            </div>
          </div>
        </div>
      </ul>
    </div>
  </div>
  <router-view></router-view>
</template>

<script>
export default{
  data(){
    return{
      lists:[
        {
          imageurl:require('@/assets/img/News/1.jpg'),
          HomeNew_Title:'2022/11/06',
          HomeNew_Subtitle:'｢TRAIN SUITE 四季島｣2晚3天課程/冬季額外招聘已經開始。',
        },
        {
          imageurl:require('@/assets/img/News/1.jpg'),
          HomeNew_Title:'2022/11/06',
          HomeNew_Subtitle:'｢TRAIN SUITE 四季島｣2晚3天課程/冬季額外招聘已經開始。',
        },
        {
          imageurl:require('@/assets/img/News/1.jpg'),
          HomeNew_Title:'2022/11/06',
          HomeNew_Subtitle:'｢TRAIN SUITE 四季島｣2晚3天課程/冬季額外招聘已經開始。',
        },
        {
          imageurl:require('@/assets/img/News/1.jpg'),
          HomeNew_Title:'2022/11/06',
          HomeNew_Subtitle:'｢TRAIN SUITE 四季島｣2晚3天課程/冬季額外招聘已經開始。',
        }
      ],
    }
  },methods:{
  getdata(){
    fetch(process.env.VUE_APP_WEATHERAPI)
    .then(function(response){
      return response.json();
    })
    .then(function(myJson){
    console.log(myJson);
    });
  }
  },mounted(){
    this.getdata();
  }
}
</script>

<style scoped lang="scss">
@import "../assets/scss/layout/grid.scss";
@import "../assets/scss/base/font.scss";
  *{
    font-style: font-style;
  }
  .title{
    margin: 20px auto;
  }
  .CardWrapper{
    display: flex;
    gap: 10px;
    .HomeNew-Text{
      text-align: start;
    }
  }
  li{
    margin-bottom: 30px;
  }
  .OtherNews{
    margin: 50px auto;
    .Covid-19{
      //font-size: nth($font-size,7)+px;
      border: 1px solid black;
      text-align: start;
      .CovidText{
        margin: 10px 20px;
        button{
          width: 100%;
          margin: 10px;
        }
      }
    }
    .Js-Official{
      .Js-SocialMedia{}
    }
  }
</style>


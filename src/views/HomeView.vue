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
                <img src="https://picsum.photos/300/200/?random=10">
                <div class="HomeNew-Text">
                  <p class="HomeNew-Title">2022/12/01</p>
                  <p class="HomeNew-Subtitle">｢TRAIN SUITE 四季島｣2晚3天課程/冬季額外招聘已經開始。</p>
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
            <div class="CovidText">
              <p>【「JET SPEED」公式instergram</p>
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
            lists:[{},{},{},{}],
          }
        }
}
</script>

<style scoped>
@import "../assets/scss/layout/grid.scss";
  .title{
    margin: 20px;
  }
  .TopicsCard{

  }
  .CardWrapper{
    display: flex;
  }
  .OtherNews{
    margin: 50px auto;
  }
</style>


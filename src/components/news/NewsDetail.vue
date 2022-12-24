<template>
    <div class="container">
        <figure class="news-article-img">
          <img :src="img" alt="">
          <figcaption class="font-14">{{img_des}}</figcaption>
        </figure>
        <div class="news-article-txt">
          <h2 class="news-article-title font-24">{{title}}</h2>
          <div class="news-article-des">
            <p class="font-16-24em">{{text_start}}</p>
            <br>
            <p class="font-16-24em">{{text_middle}}</p>
            <br>
            <p class="font-16-24em">{{text_trans}}</p>
            <br>
            <p class="font-16-24em">{{text_end}}</p>
          </div>
          <div class="news-article-btn">
            <router-link to="/News" class="news-btn-more font-20">返回</router-link>
          </div>
        </div>
      </div>
</template>

<script>
export default {
    name: 'NewsDetail',
    props: {
        img: String,
        img_des: String,
        title: String,
        text_start: String,
        text_middle:String,
        text_trans:String,
        text_end:String
    }
}
</script>


<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
.container{
    max-width: 1200px;
    margin: auto;
    margin-top: 20px;
}

/* 圖片 */
.news-article-img{
    width: 90%;
    max-width: 900px;
    margin: auto;
  }
  .news-article-img img{
    width: 100%;
  }
  /* 圖片敘述 */
  .news-article-img figcaption{
    text-align: center;
    color: #888;
  }
  /* 標題 */
  .news-article-title{
    color: #444;
    margin: 50px 0;
    padding-left: 1%;
  }
  .news-article-title::before{
    content: '0';
    width: 10px;
    color: #BC955C;
    background-color: #BC955C;
    margin-right: 20px;
  }
  
  /* 內文 */
  .news-article-des{
    margin-bottom: 150px;
  }
  /* 返回按鈕 */
  .news-article-btn a{
    display: inline-block;
    background-color: #BC955C;
    color: #fff;
    padding: 5px 30px;
    border-radius: 5px;
    margin-bottom: 100px;
  }
  
  .news-article-btn a:hover{
    background-color: #8c6832;
  }


</style>
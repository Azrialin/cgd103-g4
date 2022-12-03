<template>
    <div class="news-card">
        <div class="news-card-img">
            <img :src="link" alt="">
        </div>
        <div class="news-card-txt">
            <p class="news-date font-16">
                <span class="type">
                    {{type}}
                </span>
                {{date}}
            </p>
            <h3 class="news-title font-20">{{title}}</h3>
            <p class="news-des font-16-24em">{{des}}</p>
            <div class="news-btn">
                <a href="#" class="news-btn-more font-18">more</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: '[NewsCard]',
    props: {
        type: String,
        date: String,
        title: String,
        des: String,
        link:String
    }
}
</script>


<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
/* 容器本身 */
.news-card{
    border-bottom: #BC955C 1px solid;
    margin-bottom: 50px;
    object-position: center bottom;
}

/* 圖片 */
.news-card-img{
    width: 60%;
    aspect-ratio: 16/9;
    margin: auto;
}
.news-card-img img{
    width: 100%;
    max-height: 220px;
}
/* 日期 */
.news-date{
    font-size: 14px;
    margin: 30px 0;
}
/* 類型 */
.type{
    background-color: #BC955C;
    color: #fff;
    padding: 2px 5px;
    margin-right: 10px;
}
/* 主標題 */
.news-title{
    margin-bottom: 10px;
}
/* 敘述 */
.news-des{
    font-size: 16px;
    color: #888888;
    margin-bottom: 50px;
}
  /* 按鈕 */

.news-btn-more{
    color: #888888;
    display: inline-block;
    padding-bottom: 5px;
    position: relative;
    border-bottom: 1px solid #BC955C;
    margin-bottom: 40px;


}
  /* 按鈕hover */
.news-btn-more:hover{
    content: '';
    color: #0C3B59;
}

@media screen and (max-width:767px){
    .news-btn{
        margin: auto;
    }
}
@media screen and (min-width: 768px){
    .news-btn{
        padding-right: 60px;
        text-align: end;
    }
}

@media screen and (min-width: 1024px){
    .news-card{
        display: flex;
        justify-content: center;
    }
    .news-card-img{
        width: 30%;
    }
    .news-card-txt{
        width: 65%;
    }
}
</style>
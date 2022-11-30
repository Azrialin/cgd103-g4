<template>
    <div class="top-banner">
        <!-- <img :src="src" alt="banner"> -->
        <img src="../assets/img/News/banner.jpg" alt="banner">
    </div>
    <pre>
        for首頁
        高600px
        for各分頁
        高300px
        
        還沒寫好
        -圖片設定變數
    </pre>
    

    </template>
    
    <script>
    // export default {
    //     name: 'Banner',
    //     props: {
    //     src: String
    // }
    </script>
    
    
    <!-- Add "scoped" attribute to limit CSS to this component only -->
    <style scoped lang="scss">
    .top-banner img{
        width: 100%;
        height: 100%;
    
    }
    
    @media screen and (max-width:767px){
        .top-banner{
        height: 150px;
        }
    }
    @media screen and (min-width: 768px){
        .top-banner{
        height: 220px;
        }
    }
    @media screen and (min-width: 1024px){
        .top-banner{
        height: 300px;
        }
    }
    </style>
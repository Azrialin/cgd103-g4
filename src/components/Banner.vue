<template>
    <!-- 還未完成 -->
    <div class="top-banner">
        <!-- <img :src="src" alt="banner"> -->
        <img src="../assets/img/News/banner.jpg" alt="banner">
    </div>
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
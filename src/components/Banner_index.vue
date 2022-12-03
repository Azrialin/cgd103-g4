<template>
    <div class="top-banner">
        <img :src="src" alt="banner">
    </div>
</template>
    
<script>
export default {
    name: 'Banner',
    props: {
        src:String
    }
}
</script>
    
    
    <!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
    .top-banner img{
        width: 100%;
        background-position: center bottom;
        background-size: cover;
        background-repeat: no-repeat;
    
    }
    
    @media screen and (max-width:767px){
        .top-banner{
        height: 300px;
        }
    }
    @media screen and (min-width: 768px){
        .top-banner{
        height: 400px;
        }
    }
    @media screen and (min-width: 1024px){
        .top-banner{
        height: 600px;
        }
    }
</style>
<template>
    <div class="paradise font-20">
        <p id="heaven" @click="seeGOD">PAGE TOP</p>
    </div>
</template>

<script>
export default {
    name: 'paradise',
    methods: {
        seeGOD:function(){
            window.scrollTo({top:0, behavior: 'smooth'});
        }
    }
}
</script>


<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
    .paradise p{
        text-align: center;
        cursor: pointer;
        margin-bottom: 40px;
    }

    .paradise p:hover{
        color: #941111;
    }

</style>
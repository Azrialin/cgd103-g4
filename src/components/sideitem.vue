<template>
    <ul v-show="list.open" class="list-item">
        <li class="sub-items" 
        v-for="(item, index) in list.sublist" :key="index" @click="handleRoute(item)">
        {{item}}
            
        </li>
    </ul> 
</template>

<script>
    export default {
        props:[
            'list'
        ],
        methods:{
            handleRoute(item){
                this.$router.push({
                    query:{
                        filter:item
                    }
                })
            }
        }
    };
</script>

<style lang="scss" scoped>
@import "../assets/scss/base/font.scss";
@import "../assets/scss/base/base.scss";
@import "../assets/scss/base/color.scss";

    .list-item{
        list-style: none;

        .sub-items{
            color: $color_888;
            &:hover{
            color: $front_color_hover;
            };
        }
    }
   
</style>
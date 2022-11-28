<template>
    <div class="container_bread">
        <div class="breadgroup">
            <ul class="bread">
                <li class="breadlist font">
                    <a href="" v-for="font in fonts" :key="font">{{font['name']}}</a>
                    <!-- <a href="">首頁</a>
                    <a href="">行程方案</a>
                    <a href="">行程內文</a> -->
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
export default {
    props:{
        word:String,
    },
    data(){
        return{
            fonts:[{name:'首頁'},{name:'行程方案'},{name:'行程內文'}],
        }
    }
}
</script>
<style lang="scss" scoped>
@import "@/assets/scss/base/color.scss";
@import "@/assets/scss/base/base.scss";

    .container_bread{
        .breadgroup{
            .bread{
                list-style: none;
                a{
                    text-decoration: none;
                    color: $color_444;
                    transition: 0.3s;
                }
                a~a::before{
                    content: " / ";
                }
                a:last-child{
                    color: $front_color_main;
                }
            }
        }
    }
</style>
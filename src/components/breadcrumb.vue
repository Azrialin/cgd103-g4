<template>
    <div class="container_bread">
        <div class="breadgroup">
            <ul class="bread">
                <li class="breadlist font-16" v-for="font in fonts" :key="font">
                    <router-link class="breadin" :to="{path:font['source']}">{{font['name']}}</router-link>
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
export default {
    props:{
        word:String,
        fonts:Array,
    },
}
</script>
<style lang="scss" scoped>
@import "@/assets/scss/base/color.scss";
@import "@/assets/scss/base/base.scss";

    .container_bread{
        box-sizing: border-box;
        padding: 20px;
        width: 100%;
        .breadgroup{
            max-width: 1200px;
            margin: auto;
            .bread{
                list-style: none;
                display: flex;
                .breadlist{
                    text-decoration: none;
                    color: $color_444;
                    transition: 0.3s;
                    .breadin{
                        text-decoration: none;
                        color: $color_444  ;
                    }
                }
                .breadlist~.breadlist::before{
                    content: "／";
                }
                .breadlist:last-child .breadin{
                    color: $front_color_main;
                }
            }
        }
    }
</style>
<template >
    <div class="tab-content" v-show="title == selectedTitle">
        <slot />
    </div>
</template>

<script>
import { inject } from 'vue'
export default {
    props : ['title'],
    setup (){
        const selectedTitle = inject("selectedTitle")

        return {
            selectedTitle
        }
    }
}
</script>

<style scoped lang="scss">
@import "../assets/scss/base/color.scss";
    .tab-content{
        min-height: 400px;
        padding: 20px;
        border-radius: 5px;
        border:1px solid $front_color_main;
    }
</style>

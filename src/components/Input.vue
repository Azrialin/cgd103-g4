<template>
    <div>
        <input class="Input font-16-15em" v-model="Text" v-bind:placeholder="InputDefault"/>
    </div>
</template>

<script>
export default {
    props : ['title'],
    setup (){
        const InputDefault = '輸入框：提示字';
        return {
            InputDefault,
            Text:'',
            BorderColor:'#BC955C',
        }
    }
}
</script>

<style lang="scss" scoped>
@import "../assets/scss/base/font.scss";
@import "../assets/scss/base/color.scss";
    .Input{
        appearance: none;
        width: fit-content;
        height: 20px;
        padding: 10px;
        border-radius: 10px;
        border: 1px solid v-bind(BorderColor) !important;
        outline:none;
    }
</style>
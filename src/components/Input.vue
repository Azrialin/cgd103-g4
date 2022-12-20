<template>
        <input class="Input" 
        @focus="InputFocus" 
        :type="InputType" 
        :placeholder="InputDefault
        "/>
</template>

<script>
export default {
    props:{
        InputDefault:String,
    },
    setup (){
        return {
            Text:'',
            BorderColor:'#EBDFCE',
            BorderColorActive:'#BC955C',
        }
    },
}
</script>

<style scoped lang="scss" >
@import "../assets/scss/base/font.scss";
@import "../assets/scss/base/color.scss";
    .Input{
        @include font(14px);
        appearance: none;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid v-bind(BorderColor);
        outline:none;
    }
    .Input[type="text"]:focus{
        border: 1px solid v-bind(BorderColorActive) ;
    }
</style>
<template>
	<Header/>
		<div class="main"><router-view/></div>
  <router-view/>
	<Footer/>
</template>

<script>
    import Header from "@/components/Header.vue"
    import Footer from "@/components/Footer.vue"
    export default {
        components:{
            Header,
            Footer,
        }
    }
</script>

<style lang="scss">
@import "../src/assets/Css/Reset.css";
@import "../src/assets/scss/base/color.scss";
@import "../src/assets/scss/base/font.scss";
@import "../src/assets/scss/components/btn.scss";

#app {
	padding-top: 70px;
	font-family: Avenir, Helvetica, Arial, sans-serif;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
	text-align: center;
	color: #2c3e50;
}
// .main{
// 	max-width: 1200px;
// 	margin: auto;
// }
</style>


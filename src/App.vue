<template>
	<Header/>
		<div class="main col-10"><router-view/></div>
	<Footer/>
</template>

<script>
    import Header from "@/components/Header.vue"
    import Footer from "@/components/Footer.vue"
    export default {
        components:{
            Header,
            Footer,
        },
    }
</script>

<style lang="scss">
@import "../src/assets/Css/Reset.css";
@import "../src/assets/scss/base/color.scss";
@import "../src/assets/scss/base/font.scss";
@import "../src/assets/scss/components/btn.scss";
@import "/src/assets/scss/layout/grid.scss";

#app {
	padding-top: 70px;
	font-family: Avenir, Helvetica, Arial, sans-serif;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
	text-align: center;
	color: #2c3e50;
	&:has(.RailwayTour){
		padding-top: 0;
		.main{
			width: 100%;
			height: 100vh;
		    background: #111;
		}
		header,.footer-bg{
			display: none;
		}
	}
}
.main{
	margin: auto;
}
a{
	text-decoration: none;
}
</style>


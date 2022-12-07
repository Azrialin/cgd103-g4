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
		mounted() {
			 this.$store.dispatch("setCart", [
      {
        id: 1,
        img: require(`@/assets/img/products/pro4.jpg`),
        title: "長崎蛋糕",
        price: 460,
        amount:1
      },
      {
        id: 2,
        img: require(`@/assets/img/products/pro2.jpg`),
        title: "曲奇餅乾",
        price: 280,
        amount:1
      },
      {
        id: 3,
        img: require(`@/assets/img/products/pro3.jpg`),
        title: "透明醬油",
        price: 320,
        amount:1
      },
    ]);

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
}
.main{
	margin: auto;
}
a{
	text-decoration: none;
}
</style>


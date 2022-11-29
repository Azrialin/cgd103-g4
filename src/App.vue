<template>
  <nav>
    <router-link to="/">Home</router-link> |
    <router-link to="/news">消息專區</router-link> |
    <router-link to="/about">About</router-link>|
    <router-link to="/membership">會員專區</router-link>|
    <router-link to="/shop">商城</router-link>|
    <router-link to="/header">頭區</router-link>|
    <router-link to="/select">下拉式選單</router-link>|
    <router-link to="/Input">輸入框樣式</router-link>|
  </nav>
  <Footer></Footer>
  <router-view/>
</template>

<script>
export default {
  
}
</script>

<style lang="scss">
#app {
  padding-top: 70px;
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

nav {
  padding: 30px;

  a {
    font-weight: bold;
    color: #2c3e50;

    &.router-link-exact-active {
      color: #42b983;
    }
  }
}
</style>


<template lang="html">
  <div>
    <Tabs>
      <Tab title="會員資料"><p>YEAH</p><Input /></Tab>
      <Tab title="行程訂單查詢">what's up </Tab>
      <Tab title="商品訂單查詢">大家加油~</Tab>
    </Tabs>
  </div>
</template>
<script>
import Header from '@/components/Header.vue'
import Tabs from '@/components/Tabs.vue'
import Tab from '@/components/Tab.vue'
import Input from '@/components/Input.vue'
  export default {
    components: {
      Tabs,
      Tab,
      Header,
      Input,
    },
  }
</script>

<style scoped lang="scss">
  @import "../assets/scss/base/color.scss";
  @import "../assets/scss/layout/grid.scss";
  @import "../assets/scss/base/font.scss";


</style>

<style lang="scss">
    .Input{
    width: 80% !important;
    height: 10px!important;
    padding: 10px!important;
  }
</style>
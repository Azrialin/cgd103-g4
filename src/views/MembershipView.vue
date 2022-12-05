<template lang="html">
  <div>
    <Tabs>
      <Tab title="會員資料"><MemberInfo/></Tab>
      <Tab title="行程訂單查詢"><TravelQuery/></Tab>
      <Tab title="商品訂單查詢">大家加油~</Tab>
    </Tabs>
  </div>
</template>
<script>
import Header from '@/components/Header.vue'
import Tabs from '@/components/Tabs.vue'
import Tab from '@/components/Tab.vue'
// import Input from '@/components/Input.vue'
import MemberInfo from '@/components/MemberInfo.vue'
import TravelQuery from '@/components/TravelQuery.vue'
  export default {
    components: {
      Tabs,
      Tab,
      Header,
      // Input,
      MemberInfo,
      TravelQuery,
    },
  }
</script>

<style scoped lang="scss">
  @import "../assets/scss/base/color.scss";
  @import "../assets/scss/layout/grid.scss";
  @import "../assets/scss/base/font.scss";
  // :deep()

</style>

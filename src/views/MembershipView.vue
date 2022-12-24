<template lang="html">
  <div>
    <breadcrumb :fonts="fonts"/>
    <Tabs>
      <Tab title="會員資料"><MemberInfo/></Tab>
      <Tab title="行程訂單查詢"><TravelQuery/></Tab>
      <Tab title="商品訂單查詢"><PurchaseHistory/></Tab>
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
import breadcrumb from '@/components/breadcrumb.vue'
import PurchaseHistory from '@/components/PurchaseHistory.vue'
  export default {
    components: {
      Tabs,
      Tab,
      Header,
      // Input,
      MemberInfo,
      TravelQuery,
      breadcrumb,
      PurchaseHistory,
    },
    data(){
      return{
        fonts:[{name:'首頁',source:'/'},{name:'會員專區',source:'membership'}]
      }
    },
    computed: {
      mem_no() {
        return  this.$store.state.mem_no
      }
    },
    mounted(){
      if (!this.mem_no){
        this.$router.push("/login");
        return 
      }
    }
  }
</script>

<style scoped lang="scss">
  @import "../assets/scss/base/color.scss";
  @import "../assets/scss/layout/grid.scss";
  @import "../assets/scss/base/font.scss";
  // :deep()

</style>

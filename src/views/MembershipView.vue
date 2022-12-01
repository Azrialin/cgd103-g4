<template lang="html">
  <div>
    <Tabs>
      <Tab title="Tab 1">YEAH</Tab>
      <Tab title="Tab 2">what's up </Tab>
      <Tab title="Tab 3">大家加油~</Tab>
      <Tab title="what's up ">dsdsadsad</Tab>
    </Tabs>
  </div>
</template>
<script>
import Tabs from '@/components/Tabs.vue'
import Tab from '@/components/Tab.vue'
  export default {
    components: {
      Tabs,
      Tab,
    },
    data(){
      return{
        tabtile:  ['YA', 'what', '大家加油'],
      }
    }
  }
</script>


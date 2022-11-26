<template lang="html">
  <div>
    <tabs>
      <tab title="Tab 1">Hello From Tab 1</tab>
      <tab title="Tab 2">Hello From Tab 2</tab>
      <tab title="Tab 3">Hello From Tab 3</tab>
    </tabs>
  </div>
</template>
<script>
import Tabs from '@/components/Tabs.vue'
import Tab from '@/components/Tab.vue'
  export default {
    components: {
      Tabs,
      Tab,
    }
  }
</script>


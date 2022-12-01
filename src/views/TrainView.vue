<template>
  <breadcrumb/>
  <div class="about">
    <h1>This is an train page</h1>
  </div>
</template>
<script>
    import Header from "@/components/Header.vue"
    import breadcrumb from "@/components/breadcrumb.vue"
    export default {
        name: "HeaderView",
        components:{
            Header,
            breadcrumb
        }
    }
</script>
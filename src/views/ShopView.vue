<template>
  <Header/>
  <breadcrumb/>
  <bar/>
  <div class="about">
    <h1>This is an shop page</h1>
  </div>
</template>
<script>
    import Header from "@/components/Header.vue"
    import breadcrumb from "@/components/breadcrumb.vue"
    import bar from "@/components/bar.vue"
    export default {
        name: "HeaderView",
        components:{
            Header,
            breadcrumb,
            bar
        },
        
    }
    
</script>
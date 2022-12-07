<template>
    <div>
        
    </div>
</template>

<script>
import stepbar from "@/components/stepbar.vue";

export default {
  name: "ShopPaySuccess",
  components: {
    stepbar,
  },
  methods: {
    shopping() {
      this.$router.push("/shop");
    },
  }
}

</script>

<style lang="scss" scoped>
@import "../assets/scss/base/font.scss";
@import "../assets/scss/base/color.scss";
@import "../assets/scss/layout/grid.scss";
@import "../assets/scss/components/btn.scss";



@media screen and (max-width: 768px) {

}

@media screen and (min-width: 769px) {

}

</style>

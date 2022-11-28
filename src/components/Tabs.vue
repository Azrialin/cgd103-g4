<template >
    <div class="tabs">
        <ul class="tabs_header">
            <li v-for="title in tabTitles" :key="title" :class="{ selected: title == selectedTitle}" @click="selectedTitle = title">
                {{ title }}
            </li>
        </ul>
        <slot />
    </div>
</template>

<script>
import {ref, provide} from 'vue'
export default {
    setup(props, {slots}){
        const mySlot = ref(slots.default())
        const tabTitles = ref(slots.default().map((tab) =>tab.props.title))
        const selectedTitle = ref(tabTitles.value[0])

        provide("selectedTitle", selectedTitle)
        return{
            selectedTitle,
            tabTitles,
            mySlot,
        }
    }
}
</script>

<style scoped lang="scss">
@import "../assets/scss/base/color.scss";
.tabs{
  max-width: 400px;
  margin: 0 auto;
}

.tabs_header{
  margin: 0;
  list-style: none;
  padding: 0;
  display: flex;
  position: relative;
  z-index: 1;
}

.tabs_header li{
  width: 80px;
  text-align:center;
  padding: 10px 20px;
  /* margin-right: 10px; */
  border: 1px solid $front_color_active;
  border-bottom:none;
  border-radius: 5px 5px 0 0;
  cursor: pointer;
  transition: 0.4s all ease-out;
  background: white;
  color: $color_888;
  position: relative;
}

.tabs_header li.selected{
    border:1px solid $front_color_main;
    border-bottom: none;
    color: $color_444;
    position: relative;
    z-index: 3;
    &::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 100%;
        height: 5px;
        background: white;
        z-index: 1;
    }
}
  
</style>
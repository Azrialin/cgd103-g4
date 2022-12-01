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
        const tabTitles = ref(slots.default().map((tab) =>tab.props.title))
        const selectedTitle = ref(tabTitles.value[0])

        provide("selectedTitle", selectedTitle)
        return{
            selectedTitle,
            tabTitles,
        }
    }
}
</script>

<style scoped lang="scss">
@import "../assets/scss/base/color.scss";
@import "../assets/scss/layout/grid.scss";
@import "../assets/scss/base/font.scss";

.tabs{
  max-width: 1200px;
  margin: 5% auto;
}

.tabs_header{
  margin: 0 0 -1px;
  list-style: none;
  padding: 0;
  display: flex;
}

.tabs_header li{
  width: 100px;
  text-align:center;
  padding: 10px 20px;
  /* margin-right: 10px; */
  border: 1px solid $front_color_active;
  border-radius: 5px 5px 0 0;
  cursor: pointer;
  transition: 0.4s all ease-out;
  background: white;
  color: $color_888;
  font-family: 'Noto Serif TC', 'Noto Sans', '微軟正黑體';
}

.tabs_header li.selected{
     @include font(16px);
    letter-spacing: 0;
    border:1px solid $front_color_main;
    border-bottom: 1px solid white;
    color: $color_444;
    position: relative;
    text-align: center;
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
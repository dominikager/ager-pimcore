<template>
  <div class="nav-sub-list-outer" :class="{ open: open }">
    <ul class="nav-sub-list-container">
      <sub-menu-item v-for="item in items" :key="item.name" :item="item" />
    </ul>
  </div>
</template>

<script>
import SubMenuItem from "./SubMenuItem";
export default {
  name: "NavSubMenu",
  components: { SubMenuItem },
  props: {
    items: {
      type: Array,
      default: null
    },
    open: {
      type: Boolean,
      default: false
    }
  },
  methods: {
    closeSub() {
      this.$emit("close-sub-menu");
    }
  }
};
</script>

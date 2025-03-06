<template>
  <div class="nav-sub-outer" :class="{ open: open }">
    <ul class="nav-sub-container container">
      <mega-menu-item v-for="item in items" :key="item.name" :item="item" />
    </ul>
  </div>
</template>

<script>
import MegaMenuItem from "./MegaMenuItem";
export default {
  name: "MegaMenu",
  components: { MegaMenuItem },
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

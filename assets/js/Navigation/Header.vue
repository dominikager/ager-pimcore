<template>
  <div class="nav-header">
    <nav-brand />
    <nav-toggle @toggle-nav="navToggle" />
  </div>
</template>

<script>
import Brand from "./Brand.vue";
import Toggle from "./Toggle.vue";

export default {
  name: "NavHeader",
  components: {
    "nav-toggle": Toggle,
    "nav-brand": Brand
  },
  methods: {
    navToggle() {
      this.$emit("toggle-nav");
    }
  }
};
</script>

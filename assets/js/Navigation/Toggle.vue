<template>
  <div
    class="nav-toggle js-nav-toggle"
    :class="{ active: active }"
    @click="toggleNav"
  >
    <div class="nav-toggle-line first" />
    <div class="nav-toggle-line second" />
    <div class="nav-toggle-line third" />
  </div>
</template>

<script>
export default {
  name: "NavToggle",
  data() {
    return {
      active: false
    };
  },
  methods: {
    toggleNav() {
      this.$emit("toggle-nav");

      if (this.active === true) {
        this.active = false;
        return;
      }

      this.active = true;
    }
  }
};
</script>

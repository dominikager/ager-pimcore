<template>
  <li class="nav-sub-item">
    <a class="nav-sub-link" :href="item.url" :class="{ active: item.active }">
      <div class="icon">
        <i :class="'icon-' + item.icon" />
      </div>
      <div class="link-wrapper">
        <div class="title" v-text="item.name" />
        <div class="text" v-html="item.text" />
      </div>
    </a>
  </li>
</template>

<script>
export default {
  name: "MegaMenuItem",
  props: {
    item: {
      type: Object,
      default: null
    }
  },
  data() {
    return {
      subIsOpen: false
    };
  },
  methods: {
    toggleSubMenu() {
      this.subIsOpen = !this.subIsOpen;
    }
  }
};
</script>

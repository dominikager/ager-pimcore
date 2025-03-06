<template>
  <li class="nav-sub-list-item">
    <a
      class="nav-sub-list-link"
      :href="item.url"
      :class="{ active: item.active }"
      v-text="item.name"
    >
    </a>
  </li>
</template>

<script>
export default {
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

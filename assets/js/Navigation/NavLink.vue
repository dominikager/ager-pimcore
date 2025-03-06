<template>
  <li class="nav-item">
    <a
      v-if="item.submenu.length == 0"
      class="nav-link"
      :href="item.url"
      :class="{ active: active }"
      v-text="item.name"
    />
    <span
      v-if="item.submenu.length > 0"
      class="nav-link has-sub"
      :href="item.url"
      :class="{ active: active, open: open }"
      @click="toggleSubMenu"
      v-text="item.name"
    />
    <div v-if="subIsOpen" class="nav-sub-overlay" @click="toggleSubMenu" />
    <nav-mega-menu
      v-if="item.submenu.length > 0 && item.megaMenu"
      :items="item.submenu"
      :open="subIsOpen"
    />
    <nav-sub-menu
      v-if="item.submenu.length > 0 && !item.megaMenu"
      :items="item.submenu"
      :open="subIsOpen"
    />
  </li>
</template>

<script>
import NavMegaMenu from "./MegaMenu";
import NavSubMenu from "./SubMenu";

export default {
  name: "NavLink",
  components: {
    NavSubMenu,
    NavMegaMenu
  },
  props: {
    item: {
      type: Object,
      default: null
    }
  },
  data() {
    return {
      subIsOpen: false,
      active: false,
      open: false
    };
  },
  mounted() {
    this.active = this.item.active;

    this.$root.$on("close-nav-dropdown", url => {
      if (url != this.item.url) {
        this.subIsOpen = false;
        this.open = false;
        this.active = false;
      }
    });
  },
  methods: {
    toggleSubMenu() {
      this.open = !this.open;
      this.subIsOpen = !this.subIsOpen;
      this.$root.$emit("close-nav-dropdown", this.item.url);
    }
  }
};
</script>

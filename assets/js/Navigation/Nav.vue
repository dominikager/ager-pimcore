<template>
  <div class="nav-wrapper">
    <div class="container">
      <nav class="nav" :class="{ active: open }">
        <nav-header @toggle-nav="navToggle" />
        <div class="nav-inner">
          <ul class="nav-list" :class="{ open: open }">
            <nav-link v-for="item in items" :key="item.name" :item="item" />
          </ul>
        </div>
      </nav>
    </div>
  </div>
</template>

<script>
import Header from "./Header";
import NavLink from "./NavLink";
import PhoneCallToAction from "../CallToAction/Phone";

export default {
  name: "VueNav",
  components: {
    "nav-header": Header,
    NavLink
  },
  props: {
    items: {
      type: Array,
      default: function() {
        return [];
      }
    }
  },
  data() {
    return {
      open: false,
      isFixed: false
    };
  },
  methods: {
    navToggle() {
      if (this.open === true) {
        this.open = false;
        return;
      }

      this.open = true;
    }
  }
};
</script>

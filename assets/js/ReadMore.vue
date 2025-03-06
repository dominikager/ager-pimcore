<template>
    <div class="text-content limited position-relative mb-lg-0" data-aos="fade-up" :class="{'active aos-animate': show}">
        <slot></slot>
        <div class="text-content-read-more" @click="toggleReadMore">
            mehr lesen
        </div>
    </div>
</template>
<script>
  export default {
    name: "ReadMore",
    data() {
      return {
        show: false
      };
    },
    methods: {
      toggleReadMore() {
        this.show = !this.show;
      }
    }
  };
</script>

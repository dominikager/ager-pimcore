<template>
  <span v-html="decipheredContent" />
</template>
<script>
export default {
  name: "vue-decipher",
  props: {
    cipher: {
      type: String,
      default: ""
    }
  },
  data() {
    return {
      map: {}
    };
  },
  created() {
    let e = new Array(),
      t = "abcdefghijklmnopqrstuvwxyz";

    for (let i = 0; i < t.length; i++) {
      e[t.charAt(i)] = t.charAt((i + 13) % 26);
    }
    for (let i = 0; i < t.length; i++) {
      e[t.charAt(i).toUpperCase()] = t.charAt((i + 13) % 26).toUpperCase();
    }

    this.map = e;
  },
  computed: {
    decipheredContent() {
      return this.decipher(this.cipher);
    }
  },
  methods: {
    decipher: function(e) {
      let t = "";
      for (let i = 0; i < e.length; i++) {
        let n = e.charAt(i);
        t += (n >= "A" && n <= "Z") || (n >= "a" && n <= "z") ? this.map[n] : n;
      }

      return t;
    }
  }
};
</script>

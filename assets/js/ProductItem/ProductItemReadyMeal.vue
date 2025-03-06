<template>
  <div class="product-item-col" :class="heightClass">
    <div class="product-item gtm-product-item" :id="'scroll-article' + articleNumber" @click="toggle" :data-name="name" data-aos="fade-up">
      <img data-aos="fade-up" class="img-fluid" :src="image" />
      <h3 data-aos="fade-up" class="product-item-name" v-text="name"></h3>
      <span data-aos="fade-up" class="product-item-more">Details ansehen</span>
    </div>
    <div class="product-item-table animated fadeIn" v-show="visible">
      <div class="d-flex justify-content-between align-items-center">
        <span class="product-item-table-title h4" v-text="name"></span>
        <span class="product-item-table-close" @click="toggle">
          <i class="fal fa-times"></i>
        </span>
      </div>
      <div class="product-item-table-scroll">
        <div class="product-item-table-row">
          <div class="product-item-table-col w-15 highlighted">ART.NR.</div>
          <div class="product-item-table-col w-45 highlighted">Bezeichnung</div>
          <div class="product-item-table-col w-20 highlighted">Packung</div>
          <div class="product-item-table-col w-20 highlighted">Karton</div>
        </div>
        <div class="product-item-table-row">
          <div class="product-item-table-col w-15" v-text="articleNumber"></div>
          <div class="product-item-table-col w-45">
            <div>{{durability}}</div>
            <small class="text-muted" v-if="desc" v-html="desc"/>
          </div>
          <div class="product-item-table-col w-20" v-text="package"></div>
          <div class="product-item-table-col w-20" v-text="unit"></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ProductItem",
  props: {
    name: {
      type: String,
      default: null
    },
    image: {
      type: String,
      default: null
    },
    unit: {
      type: String,
      default: null
    },
    index: {
      type: Number,
      default: null
    },
    ingredients: {
      type: String,
      default: null
    },
    package: {
      type: String,
      default: null
    },
    desc: {
      type: String,
      default: null
    },
    articleNumber: {
      type: String,
      default: null
    },
    durability: {
      type: String,
      default: null
    }
  },
  data() {
    return {
      visible: false
    };
  },
  mounted() {
    this.$root.$on("close-product-table", articleNumber => {
      if (articleNumber != this.articleNumber) {
        this.visible = false;
      }
    });
  },
  methods: {
    toggle() {
      this.visible = !this.visible;
      this.$root.$emit("close-product-table", this.articleNumber);
      setTimeout(() => {
        this.$scrollTo('#scroll-article' + this.articleNumber);
      }, 350);
    }
  },
  computed: {
    heightClass() {
      return this.visible ? "product-item-col-height-1" : "";
    }
  }
};
</script>

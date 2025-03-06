<template>
  <div class="product-item-col" :class="heightClass">
    <div class="product-item pl-0 pr-0 gtm-product-item" :id="'scroll-article' + index" :data-name="name" @click="toggle" data-aos="fade-up">
      <div class="product-item-img-wrapper">
        <slick :options="slickOptions" :fade="true" @beforeChange="disableOpenening">
        <img class="img-fluid gtm-product-item" :data-name="name" :src="image" />
        <img class="img-fluid gtm-product-item" v-for="item in images" :src="item" :key="item" />
        </slick>
      </div>
      <div>
      <h3 data-aos="fade-line" class="product-item-name gtm-product-item" :data-name="name">
        <div class="gtm-product-item w-100 text-center" :data-name="name" v-html="name" />
        <small class="text-muted font-weight-bold product-item-name-sub" v-html="nameSmall" />
      </h3>
      <span data-aos="fade-line" class="product-item-more gtm-product-item" :data-name="name">Artikel ansehen</span>
      </div>
    </div>
    <div class="product-item-table animated fadeIn" v-if="visible">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <span class="product-item-table-title h4" :class="{'mb-0' : available}" v-text="nameTable + ' ' + nameSmall"></span>
          <span class="product-item-table-subtitle" v-text="available" />
        </div>
        <span class="product-item-table-close" @click="toggle">
          <i class="fal fa-times"></i>
        </span>
      </div>
      <div class="product-item-table-scroll">
        <div class="product-item-table-row">
          <div class="product-item-table-col w-15 highlighted">Art.-Nr.</div>
          <div class="product-item-table-col w-45 highlighted">Bezeichnung</div>
          <div v-if="articles[0].weight_package" class="product-item-table-col w-20 text-right pr-4 highlighted">Packung</div>
          <div v-if="articles[0].weight_package" class="product-item-table-col w-20 text-right pr-4 highlighted">Gebinde</div>
          <div v-if="!articles[0].weight_package" class="product-item-table-col w-40 text-right pr-4 highlighted">Gewicht</div>
        </div>
        <div v-for="article in articles" class="product-item-table-row" :key="article.number">
          <div class="product-item-table-col w-15" v-text="article.number"></div>
          <div class="product-item-table-col w-45"><div>{{article.desc}}</div><small class="text-muted" v-if="article.desc_small" v-html="article.desc_small"></small>
          </div>
          <div v-if="article.weight_package" class="product-item-table-col w-20 text-right pr-4" v-text="article.weight_package"></div>
          <div v-if="article.weight_package" class="product-item-table-col w-20 text-right pr-4" v-text="article.weight"></div>
          <div v-if="!article.weight_package" class="product-item-table-col w-40 text-right pr-4" v-text="article.weight"></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import Slick from "vue-slick";

  export default {
  name: "ProductItem",
  props: {
    index: {
      type: Number,
      default: null
    },
    name: {
      type: String,
      default: null
    },
    nameSmall: {
      type: String,
      default: null
    },    available: {
      type: String,
      default: null
    },
    image: {
      type: String,
      default: null
    },
    images: {
      type: Array,
      default: null
    },
    articles: {
      type: Array,
      default: null
    }
  },
  components: {
    Slick
  },
  data() {
    return {
      slickOptions: {
        dots: false,
        autoplay: false,
        arrows: true,
        fade: true,
      },
      visible: false,
      disable: false
    };
  },
  mounted() {
    this.$root.$on("close-product-table", index => {
      if (index != this.index) {
        this.visible = false;
      }
    });
  },
  methods: {
    disableOpenening() {
      this.disable = true;
    },
    toggle() {
      if(!this.disable) {
        this.visible = !this.visible;
        this.$root.$emit("close-product-table", this.index);
        setTimeout(() => {
          this.$scrollTo('#scroll-article' + this.index, {offset: -95});
        }, 350);
      }
      this.disable = false;
    }
  },
  computed: {
    nameTable() {
      return this.name.replace('<br/>', ' ').replace('n-v', 'nv');
    },
    heightClass() {
      return this.visible
        ? "product-item-col-height-" + this.articles.length
        : "";
    }
  }
};
</script>

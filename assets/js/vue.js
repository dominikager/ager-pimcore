import Vue from "vue";
import Slick from "vue-slick";
import VueLazyload from "vue-lazyload";
import VueScrollactive from "vue-scrollactive";
import VueScrollTo from "vue-scrollto";
import Nav from "./Navigation/Nav.vue";
import AOS from "aos";
import VueCookies from "vue-cookies";
import ProductItemReadyMeal from "./ProductItem/ProductItemReadyMeal";
import ProductItem from "./ProductItem/ProductItem";
import VueDecipher from "./VueDecipher/VueDeciper";
import Map from "./Map/map.vue";
import VueVideo from "./Video/Video.vue";
import ReadMore from "./ReadMore.vue";
import Tabs from "./Tabs.vue";
import PhoneCallToAction from "./CallToAction/Phone.vue";
import VueLazyLoadVideo from 'vue-lazyload-video'
import lightGallery from 'lightgallery';
import $ from 'jquery';
import 'bootstrap';

window.Vue = require("vue");

Vue.config.devtools = true;

Vue.use(VueCookies);
Vue.use(VueLazyLoadVideo);

VueCookies.config("1d");


export default class {
  init() {
    Vue.use(VueScrollactive);
    Vue.use(VueScrollTo, {
      offset: -160
    });
    Vue.use(VueLazyload, {
      lazyComponent: true
    });

    const app = new Vue({
      el: "#app",
      components: {
        Tabs,
        VueVideo,
        ReadMore,
        ProductItem,
        ProductItemReadyMeal,
        PhoneCallToAction,
        VueLazyload,
        VueDecipher,
        Slick,
        "vue-map": Map,
        "vue-nav": Nav
      },
      data() {
        return {
          sujetImageLoaded: false,
          slickOptions: {
            dots: false,
            autoplay: false,
            arrows: true,
            fade: true,
            pauseOnFocus: false,
            pauseOnHover: false,
            prevArrow:
              '<button class="prev"><i class="fal fa-chevron-left"></i></button>',
            nextArrow:
              '<button class="next"><i class="fal fa-chevron-right"></i></button>',
          }
        };
      },
      methods: {
        sujetLoaded() {
          this.sujetImageLoaded = true;
        }
      },
      mounted() {
        window.addEventListener('load', () => {
          this.sujetLoaded();
        });
        document.addEventListener("DOMContentLoaded", () => {
          AOS.init();
          $('.js-slick-lightgallery').lightGallery({
              selector: '.js-slick-lightgallery-item',
              download: false,
              thumbnail: true
            })
        });
      }
    });
  }
}

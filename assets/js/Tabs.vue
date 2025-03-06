<template>
    <div class="tabs-outer">
        <tabs
            :tabs="tabs"
            :currentTab="currentTab"
            :wrapper-class="'default-tabs'"
            :tab-class="'default-tabs__item'"
            :tab-active-class="'default-tabs__item_active'"
            :line-class="'default-tabs__active-line'"
            @onClick="handleClick"
        />
        <div class="pt-3">
            <div v-for="item in items">
                <div v-if="currentTab == item.id">
                    <h3 class="text-headline mb-2">{{item.headline}}</h3>
                    <div class="text-content" v-html="item.text" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  import Tabs from 'vue-tabs-with-active-line';

  export default {
    components: {
      Tabs,
    },
    props: {
      items: {
        type: Array,
        default: () => {}
      }
    },
    data() {
      return {
        currentTab: this.items[0].id,

      }
    },
    computed: {
      tabs() {
        let tabs = [];

        this.items.map((item) => {
          tabs.push({
            title: item.name,
            value: item.id,
          })
        });

        return tabs;
      }
    },
    methods: {
      handleClick(newTab) {
        this.currentTab = newTab;
      },
    },
  }
</script>

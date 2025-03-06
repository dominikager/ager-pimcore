<template>
  <l-map ref="mapRef" class="map" :zoom="zoom" :center="center">
    <l-tile-layer :url="url" />
    <l-marker :lat-lng="marker">
      <l-icon :icon-size="dynamicSize">
        <div class="leaflet-customer-marker">
          <img src="../../images/map-pin.svg" width="50" />
        </div>
      </l-icon>
    </l-marker>
  </l-map>
</template>

<script>
import { L, LMap, LTileLayer, LMarker, LIcon } from "vue2-leaflet";

export default {
  name: "VueMap",
  components: {
    LMap,
    LTileLayer,
    LMarker,
    LIcon
  },
  data() {
    return {
      zoom: 14,
      iconSize: [32, 37],
      center: L.latLng(47.487555, 12.162705),
      url:
        "https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}",
      marker: L.latLng(47.487555, 12.162705)
    };
  },
  computed: {
    dynamicSize() {
      return [this.iconSize, this.iconSize * 5];
    }
  },
  mounted() {
    this.$nextTick(() => {
      this.$refs.mapRef.mapObject.scrollWheelZoom.disable();
    });
  }
};
</script>

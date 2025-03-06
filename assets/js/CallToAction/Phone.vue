<template>
  <div class="call-to-action">
    <div v-if="open" class="call-to-action-icon" @click="toggle">
      <i class="fas fa-phone"></i>
    </div>
    <div v-if="!open" class="call-to-action-icon" @click="toggle">
      <i class="fas fa-comments"></i>
    </div>

    <div v-if="visible">
      <div class="call-to-action-popup animated fadeIn">
        <span class="call-to-action-close" @click="closeOverlay">
          <i class="fas fa-times-circle"></i>
        </span>
        <strong class="mb-1 d-block">Willkommen bei Ager 👋</strong>
        Haben Sie Fragen?<br />Wir beraten Sie gerne!<br />
        <strong class="text-warning d-block mt-1" v-if="!open"
          >• Geschlossen</strong
        >
        <strong class="text-success d-block mt-1" v-if="open"
          >• Geöffnet</strong
        >
      </div>

      <a
        v-if="open"
        href="tel:+43533273595"
        class="call-to-action-action animated fadeIn gtm-call-to-action-phone"
      >
        +43 5332 73595
      </a>
      <a
        v-if="!open"
        href="/kontakt#form"
        class="call-to-action-action animated fadeIn gtm-call-to-action-message"
      >
        Nachricht senden
      </a>
    </div>
  </div>
</template>

<script>
import moment from "moment";

export default {
  name: "PhoneCallToAction",
  data() {
    return {
      visible: false,
      open: false,
      intervalDone: false
    };
  },
  methods: {
    closeOverlay() {
      this.$cookies.set("AgerPopUp", "close");
      this.visible = false;
    },
    toggle() {
      this.visible = !this.visible;
      this.$cookies.set("AgerPopUp", "close");
    },
    checkIfOpen() {
      const open = "0800";
      const close = "1700";
      const weekday = moment().format("d");
      const time = moment().format("HHmm");

      if (time <= close && time >= open && weekday < 6 && weekday != 0) {
        this.open = true;
      }
    }
  },
  created() {
    this.checkIfOpen();

    let cookie = this.$cookies.get("AgerPopUpPageViews");

    if (cookie == null) {
      cookie = 0;
    }

    const pageViews = parseInt(cookie) + 1;

    this.$cookies.set("AgerPopUpPageViews", pageViews);

    if (cookie >= 3 && this.$cookies.get("AgerPopUp") != "close") {
      this.visible = true;
      this.intervalDone = true;
    }
  }
};
</script>

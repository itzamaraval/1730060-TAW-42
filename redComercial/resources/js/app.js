import Vue from "vue";
import App from "./App";
import * as VueGoogleMaps from "vue2-google-maps";

Vue.use(VueGoogleMaps, {
  load: {
    key: "REPLACE-THIS-WITH-YOUR-KEY-FROM-ABOVE",
    libraries: "places" // necessary for places input
  }
});

new Vue({
  el: "#app",
  components: { App },
  template: "<App/>"
});

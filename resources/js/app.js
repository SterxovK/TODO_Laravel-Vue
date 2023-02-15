require("./bootstrap");
window.Vue = require("vue").default;
import router from "./router";
import App from "./layouts/App.vue";
import vuetify from "./vuetify";

Vue.component("sidebar", require("./components/Sidebar.vue").default);

const app = new Vue({
    router,
    vuetify,
    el: "#app",
    render: (h) => h(App),
});

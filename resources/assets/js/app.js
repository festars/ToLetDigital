import Vuex from "vuex";
import Vuetify from "vuetify";
import VueTelInput from "vue-tel-input";
import BootstrapVue from "bootstrap-vue";
import VModal from "vue-js-modal";
import VueSweetAlert from "vue-sweetalert2";

window.Vue = require("vue");

require("./bootstrap");
Vue.use(Vuex);
Vue.use(Vuetify);
Vue.use(BootstrapVue);
Vue.use(VueTelInput);
Vue.use(VueSweetAlert);
Vue.use(VModal, { dialog: true, dynamic: true });
let store = require("./store/");

import "vuetify/dist/vuetify.min.css";

import "material-design-icons-iconfont/dist/material-design-icons.css";
import "bootstrap-vue/dist/bootstrap-vue.css";
import "moment";

Vue.component("user-notifications", require("./components/UserNotifications.vue"));

Vue.component("flash", require("./components/Notification.vue"));
Vue.component("delete-item", require("./components/Delete.vue"));
Vue.component("login", require("./components/login/LoginEntity.vue"));
Vue.component("admin-login", require("./components/login/AdminLogin.vue"));
Vue.component("register", require("./components/login/Register.vue"));
Vue.component("top-right-drop", require("./components/TopRightDropDown.vue"));

require("./components/admin/Admin");
require("./components/agent/agent");

require("./components/tenant/tenant");

const app = new Vue({
  el: "#app",
  store: store.default
});

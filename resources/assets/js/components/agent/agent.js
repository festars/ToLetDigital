Vue.component("new-listing", require("./listing/New.vue"));
Vue.component("edit-listing", require("./listing/Edit.vue"));
Vue.component("new-room", require("./room/New.vue"));
Vue.component("edit-room", require("./room/Edit.vue"));
Vue.component("new-tenant", require("./tenants/New.vue"));
Vue.component("edit-tenant", require("./tenants/Edit.vue"));
Vue.component("assign-tenant", require("./tenants/Assign.vue"));
Vue.component("remove-tenant", require("./tenants/Remove.vue"));

Vue.component("new-account", require("./account/New.vue"));
Vue.component("edit-account", require("./account/Edit.vue"));
Vue.component("remove-account", require("./account/Remove.vue"));
Vue.component("new-owner", require("./owner/New.vue"));
Vue.component("edit-owner", require("./owner/Edit.vue"));


Vue.component("new-invoice", require("./invoice/NewInvoice.vue"));
Vue.component("email-invoice", require("./invoice/EmailInvoice.vue"));
Vue.component("pay-invoice", require("./payments/NewPayment.vue"));

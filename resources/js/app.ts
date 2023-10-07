import "./bootstrap";
import { createApp } from "vue";
import "vuetify/lib/styles/main.sass"; // 追加
import { createVuetify } from "vuetify"; // 追加
import "@mdi/font/css/materialdesignicons.css";
import router from "./router";
import { createPinia } from "pinia";
import { createPersistedState } from "pinia-plugin-persistedstate";
import App from "./App.vue";

const vuetify = createVuetify();

const pinia = createPinia();
pinia.use(createPersistedState());

const app = createApp(App);
app.use(vuetify);
app.use(router);
app.use(pinia);
app.mount("#app");

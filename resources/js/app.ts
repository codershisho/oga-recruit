import "./bootstrap";
import { createApp } from "vue";
import "vuetify/lib/styles/main.sass"; // 追加
import { createVuetify } from "vuetify"; // 追加
import "@mdi/font/css/materialdesignicons.css";
import App from "./App.vue";

const vuetify = createVuetify();

const app = createApp(App);
app.use(vuetify);
app.mount("#app");

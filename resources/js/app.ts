import "./bootstrap";
import { createApp } from "vue";
import "vuetify/lib/styles/main.sass"; // 追加
import { createVuetify } from "vuetify"; // 追加
import "@mdi/font/css/materialdesignicons.css";
import router from "./router";
import { createPinia } from "pinia";
import { createPersistedState } from "pinia-plugin-persistedstate";
import App from "./App.vue";
// plugins
import axios from "./plugins/axios";

// components
import Sheet from "./components/Sheet.vue";
import Text from "./components/Text.vue";
import Select from "./components/Select.vue";
import Textarea from "./components/Textarea.vue";

const vuetify = createVuetify();

const pinia = createPinia();
pinia.use(createPersistedState());

const app = createApp(App);
app.use(vuetify);
app.use(router);
app.use(pinia);

app.use(axios, {
  baseURL: import.meta.env.VITE_API_BASE_URL,
  pinia,
});

app.component("w-sheet", Sheet);
app.component("w-text", Text);
app.component("w-select", Select);
app.component("w-text-area", Textarea);
app.mount("#app");

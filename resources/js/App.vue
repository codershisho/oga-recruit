<template>
  <v-app id="inspire">
    <v-app-bar v-if="authStore._isAuth">
      <v-app-bar-title>OGA REC</v-app-bar-title>
      <template v-for="[icon, text, url] in links">
        <v-btn flat variant="text" :prepend-icon="icon" :text="text" :to="url"> </v-btn>
      </template>
      <v-btn
        flat
        variant="text"
        prepend-icon="mdi-logout-variant"
        text="ログアウト"
        @click="logout"
      >
      </v-btn>
    </v-app-bar>

    <v-main class="tw-bg-gray-200">
      <div class="!tw-px-8 !tw-pt-6">
        <router-view></router-view>
      </div>
    </v-main>
  </v-app>
</template>

<script setup lang="ts">
import { ref } from "vue";
import { useAuthStore } from "./stores/auth";
import { useRouter } from "vue-router";

const authStore = useAuthStore();
const router = useRouter();

const links = [
  ["mdi-inbox-arrow-down", "エントリー一覧", "/entries"],
  ["mdi-send", "Send", ""],
  ["mdi-delete", "Trash", ""],
];

async function logout() {
  await authStore.logout();
  authStore.$reset();
  router.replace({ name: "Login" });
}
</script>

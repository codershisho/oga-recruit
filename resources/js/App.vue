<template>
  <v-app id="inspire">
    <v-app-bar v-if="authStore._isAuth">
      <v-app-bar-title>OGA REC</v-app-bar-title>
      <template v-for="[icon, text, url] in links">
        <v-btn flat variant="text" :prepend-icon="icon" :text="text" :to="url"> </v-btn>
      </template>
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

const authStore = useAuthStore();

const links = [
  ["mdi-inbox-arrow-down", "エントリー一覧", "/entries"],
  ["mdi-send", "Send", ""],
  ["mdi-delete", "Trash", ""],
  ["mdi-alert-octagon", "Spam", ""],
];
</script>

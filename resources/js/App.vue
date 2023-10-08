<template>
  <v-app id="inspire">
    <v-navigation-drawer v-if="authStore._isAuth" v-model="drawer">
      <v-sheet color="grey-lighten-4" class="pa-4">
        <v-avatar class="mb-4" color="grey-darken-1" size="64"></v-avatar>

        <div>john@google.com</div>
      </v-sheet>

      <v-divider></v-divider>

      <v-list>
        <v-list-item
          v-for="[icon, text, url] in links"
          :key="icon"
          :prepend-icon="icon"
          :title="text"
          :to="url"
          color="primary"
        ></v-list-item>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar v-if="authStore._isAuth">
      <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>

      <v-app-bar-title>Application</v-app-bar-title>
    </v-app-bar>

    <v-main class="tw-bg-gray-200">
      <div class="!tw-px-24 !tw-pt-12">
        <router-view></router-view>
      </div>
    </v-main>
  </v-app>
</template>

<script setup lang="ts">
import { ref } from "vue";
import { useAuthStore } from "./stores/auth";

const authStore = useAuthStore();

const drawer = ref(null);
const links = [
  ["mdi-inbox-arrow-down", "エントリー一覧", "/entries"],
  ["mdi-send", "Send", ""],
  ["mdi-delete", "Trash", ""],
  ["mdi-alert-octagon", "Spam", ""],
];
</script>

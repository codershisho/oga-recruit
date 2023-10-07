<template>
  <v-app id="inspire">
    <v-navigation-drawer v-if="authStore._isAuth" v-model="drawer">
      <!--  -->
    </v-navigation-drawer>

    <v-app-bar v-if="authStore._isAuth">
      <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>

      <v-app-bar-title>Application</v-app-bar-title>
    </v-app-bar>

    <v-main>
      <router-view></router-view>
    </v-main>
  </v-app>
</template>

<script setup>
import { ref } from "vue";
import { useAuthStore } from "./stores/auth";

const authStore = useAuthStore();

const drawer = ref(null);
</script>

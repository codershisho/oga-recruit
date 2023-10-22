<template>
  <v-app id="inspire">
    <v-app-bar v-if="authStore._isAuth" flat>
      <div class="d-flex align-center w-100 h-100">
        <div @click="jumpDashboard" class="me-auto tw-pl-10">OGA REC</div>
        <template v-for="[icon, text, url] in links">
          <v-btn class="!tw-h-2/3" flat variant="text" :prepend-icon="icon" :text="text" :to="url">
          </v-btn>
        </template>
        <v-btn
          class="!tw-h-2/3"
          variant="text"
          prepend-icon="mdi-logout-variant"
          text="ログアウト"
          @click="logout"
        >
        </v-btn>
      </div>
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

const links = [["mdi-inbox-arrow-down", "エントリー一覧", "/entries"]];

async function logout() {
  await authStore.logout();
  authStore.$reset();
  router.replace({ name: "Login" });
}

function jumpDashboard() {
  router.replace({ name: "Dashboard" });
}
</script>

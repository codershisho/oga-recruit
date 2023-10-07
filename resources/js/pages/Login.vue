<template>
  <div>Login</div>

  <v-text-field>{{ credentials.email }}</v-text-field>
  <v-text-field>{{ credentials.password }}</v-text-field>
  <v-btn @click="login">login</v-btn>
</template>

<script setup lang="ts">
import { ref } from "vue";
import { Credentials } from "../types/auth";
import { useRouter } from "vue-router";
import { useAuthStore } from "../stores/auth";

const authStore = useAuthStore();
const router = useRouter();
const credentials = ref<Credentials>({
  email: "admin@example.com",
  password: "password1234",
});

async function login() {
  await authStore.login(credentials.value);
  router.push("/");
}
</script>

<template>
  <div>
    top
    <v-btn @click="jump">jump</v-btn>
  </div>
</template>

<script setup lang="ts">
import { useRouter } from "vue-router";
const router = useRouter();

function jump() {
  router.push({ name: "NextPage" });
}
</script>

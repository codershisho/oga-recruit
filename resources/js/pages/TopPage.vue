<template>
  <div>
    top
    <v-btn @click="jump">jump</v-btn>
    <div>{{ sampleStore.count }}</div>
  </div>
</template>

<script setup lang="ts">
import { useRouter } from "vue-router";
import { useStoreCounter } from "../stores/sample";
const router = useRouter();
const sampleStore = useStoreCounter();

function jump() {
  router.push({ name: "NextPage" });
}
</script>

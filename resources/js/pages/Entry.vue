<template>
  <div>
    <EntryBasicInfo :entry-id="route.params.id"></EntryBasicInfo>
  </div>
</template>

<script setup lang="ts">
import { useRoute } from "vue-router";
import EntryBasicInfo from "../components/organisms/EntryBasicInfo.vue";

const route = useRoute();
</script>

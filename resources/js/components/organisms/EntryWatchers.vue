<template>
  <w-sheet> watchers </w-sheet>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";

const props = defineProps<{
  entryId?: Number;
}>();

onMounted(async () => {
  // const res = await axios.get("/api/ogarec/v1/entries/" + props.entryId);
  // entry.value = res.data;
});
</script>

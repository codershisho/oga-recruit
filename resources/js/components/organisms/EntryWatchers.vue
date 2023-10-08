<template>
  <w-sheet>
    <div>watchers</div>
    <v-checkbox
      v-for="(watcher, i) in watchers"
      :key="i"
      density="compact"
      hide-details
      :label="watcher.name"
      v-model="watcher.is_watcher"
      @update:model-value="update(watcher)"
    ></v-checkbox>
  </w-sheet>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";

const props = defineProps<{
  entryId?: Number;
}>();

const watchers = ref([]);

search();

async function search() {
  const res = await axios.get("/api/ogarec/v1/entries/" + props.entryId + "/watchers");
  watchers.value = res.data;
}

async function update(watcher) {
  await axios.put("/api/ogarec/v1/entries/" + props.entryId + "/watchers/" + watcher.id);
}
</script>

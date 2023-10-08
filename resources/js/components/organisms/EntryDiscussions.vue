<template>
  <w-sheet>
    <div>discussions</div>
    <div v-for="(discussion, i) in discussions" :key="i">
      {{ discussion.message }}
    </div>
    <w-text placeholder="message" v-model="postMessage"></w-text>
    <v-btn color="primary" @click="onSend">send</v-btn>
  </w-sheet>
</template>
<script setup lang="ts">
import { ref } from "vue";

const props = defineProps<{
  entryId?: Number;
}>();

const discussions = ref([]);

const postMessage = ref("");

search();

Echo.channel("test").listen("MessageReceived", (e) => {
  console.log(e.data);
  discussions.value = e.data;
});

async function search() {
  const res = await axios.get("/api/ogarec/v1/entries/" + props.entryId + "/discussion");
  discussions.value = res.data;
}

async function onSend() {
  await axios.post("/api/ogarec/v1/entries/" + props.entryId + "/discussion", {
    message: postMessage.value,
  });
}
</script>

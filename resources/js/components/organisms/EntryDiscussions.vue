<template>
  <w-sheet>
    <div>discussions</div>
    <div
      v-for="(discussion, i) in discussions"
      :key="i"
      :style="discussion.user_id == authStore.user.id ? `text-align:end` : ``"
    >
      <div>
        <span class="tw-text-lg tw-font-bold pr-2">{{ discussion.user_name }}</span>
        <span class="tw-text-xs">{{ discussion.created_at }}</span>
      </div>
      <v-chip class="my-1" label color="secondary">
        {{ discussion.message }}
      </v-chip>
    </div>
    <w-text placeholder="message" v-model="postMessage"></w-text>
    <v-btn color="primary" @click="onSend">send</v-btn>
  </w-sheet>
</template>
<script setup lang="ts">
// TODO chatデザイン
// TODO 検索
import { useAuthStore } from "@/stores/auth";
import { ref } from "vue";

const props = defineProps<{
  entryId?: Number;
}>();

const authStore = useAuthStore();
const discussions = ref([]);
const postMessage = ref("");

search();

Echo.channel("discussion-" + props.entryId).listen("MessageReceived", (e) => {
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
  postMessage.value = "";
}
</script>

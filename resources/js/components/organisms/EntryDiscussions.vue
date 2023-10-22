<template>
  <w-sheet>
    <div class="overflow-y-auto px-3" style="max-height: 650px !important">
      <div class="chat-main">
        <template v-for="(discussion, i) in discussions" :key="i">
          <div :class="discussion.user_id != authStore.user.id ? `chat-left` : `chat-right`">
            <div class="">
              <div class="tw-text-sm tw-font-bold pr-2">{{ discussion.user_name }}</div>
              <!-- <div class="tw-text-xs">{{ discussion.created_at }}</div> -->
              <div class="chat-post-area">
                {{ discussion.message }}
              </div>
            </div>
          </div>
        </template>
      </div>
    </div>
    <div class="d-flex align-center">
      <v-textarea
        class="pt-3 pr-3"
        placeholder="message"
        auto-grow
        density="compact"
        rows="1"
        variant="solo-filled"
        flat
        hide-details
        v-model="postMessage"
      ></v-textarea>
      <v-btn class="mt-3" color="primary" prepend-icon="mdi-send-outline" @click="onSend">
        送信
      </v-btn>
    </div>
  </w-sheet>
</template>
<script setup lang="ts">
// TODO chatデザイン
// TODO 検索
import { useAuthStore } from "@/stores/auth";
import { ref } from "vue";
import Push from "push.js";

const props = defineProps<{
  entryId?: Number;
}>();

const authStore = useAuthStore();
const discussions = ref([]);
const postMessage = ref("");

search();

Echo.channel("discussion-" + props.entryId).listen("MessageReceived", (e) => {
  console.log(e.data);
  discussions.value.push(e.data);
  Push.create("チャット更新通知", {
    body: e.data.user_name + "さんがチャットしました。\n" + e.data.message,
  });
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

<style>
.chat-left,
.chat-right {
  margin: 10px 0;
  display: flex;
  justify-content: flex-start;
  align-items: flex-start;
}
.chat-right {
  justify-content: flex-end;
}
.chat-post-area {
  white-space: pre-wrap;
  word-wrap: break-word;
  background-color: #f2f6fa;
  border-radius: 8px;
  padding: 4px 12px;
}
</style>

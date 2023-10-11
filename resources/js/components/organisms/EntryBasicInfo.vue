<template>
  <w-sheet height="250">
    <div>basic</div>
    <w-text label="氏名" v-model="entry.full_name" readonly></w-text>
    <w-select
      label="フェーズ"
      :items="phases"
      item-title="name"
      item-value="id"
      v-model="entry.phase_id"
      color="primary"
    ></w-select>
    <w-select
      label="ステータス"
      :items="statuses"
      item-title="name"
      item-value="id"
      v-model="entry.status_id"
      color="primary"
    ></w-select>
    <!-- <w-text label="メールアドレス" v-model="entry.mail" readonly></w-text>
    <w-text label="電話番号" v-model="entry.phone" readonly></w-text>
    <w-text label="生年月日" v-model="entry.birth_day" readonly></w-text>
    <w-text label="郵便番号" v-model="entry.post_code" readonly></w-text>
    <w-text label="住所" v-model="entry.address" readonly></w-text>
    <w-text label="希望部署" v-model="entry.positions" readonly></w-text>
    <w-text label="入社希望日" v-model="entry.join_day" readonly></w-text>
    <w-text label="フリーメッセージ" v-model="entry.free_message" readonly></w-text>
    <w-text label="登録日" v-model="entry.created_at" readonly></w-text> -->
  </w-sheet>
</template>

<script setup lang="ts">
import axios from "axios";
import { ref, onMounted } from "vue";
import { Entry } from "../../types/entry";

const props = defineProps<{
  entryId?: Number;
}>();

const entry = ref<Entry>({});
const phases = ref([]);
const statuses = ref([]);

onMounted(async () => {
  const res = await axios.get("/api/ogarec/v1/entries/" + props.entryId);
  entry.value = res.data;

  const res1 = await axios.get("/api/ogarec/v1/masters", { params: { table: "m_phases" } });
  phases.value = res1.data;

  const res2 = await axios.get("/api/ogarec/v1/masters", { params: { table: "m_statuses" } });
  statuses.value = res2.data;
});
</script>

<template>
  <div>basic</div>
  <w-sheet>
    <w-text label="氏名" v-model="entry.full_name" readonly></w-text>
    <div class="d-flex">
      <div class="w-50">
        <w-select
          label="フェーズ"
          :items="phases"
          item-title="name"
          item-value="id"
          v-model="entry.phase_id"
          color="primary"
        ></w-select>
      </div>
      <div class="w-50">
        <w-select
          label="ステータス"
          :items="statuses"
          item-title="name"
          item-value="id"
          v-model="entry.status_id"
          color="primary"
        ></w-select>
      </div>
    </div>
    <div class="d-flex">
      <div class="w-50">
        <w-text label="メールアドレス" v-model="entry.mail" readonly></w-text>
      </div>
      <div class="w-50">
        <w-text label="電話番号" v-model="entry.phone" readonly></w-text>
      </div>
    </div>
    <div class="d-flex">
      <div class="w-50">
        <w-text label="生年月日" v-model="entry.birth_day" readonly></w-text>
      </div>
      <div class="w-50">
        <w-text label="郵便番号" v-model="entry.post_code" readonly></w-text>
      </div>
    </div>
    <w-text label="住所" v-model="entry.address" readonly></w-text>
    <w-text label="希望部署" v-model="entry.positions" readonly></w-text>
    <w-text label="入社希望日" v-model="entry.join_day" readonly></w-text>
    <w-text label="フリーメッセージ" v-model="entry.free_message" readonly></w-text>
    <w-text label="登録日" v-model="entry.created_at" readonly></w-text>
  </w-sheet>
  <div>
    {{ entry }}
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";

const props = defineProps<{
  entryId?: Number;
}>();

const entry = ref({});
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

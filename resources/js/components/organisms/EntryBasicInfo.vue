<template>
  <w-sheet>
    <v-form v-model="valid">
      <template v-if="!updMode">
        <w-text label="姓" v-model="entry.first_name" :rules="[requiredValidation]"></w-text>
        <w-text label="名" v-model="entry.last_name" :rules="[requiredValidation]"></w-text>
        <w-text
          label="姓（かな）"
          v-model="entry.first_name_kana"
          :rules="[requiredValidation]"
        ></w-text>
        <w-text
          label="名（かな）"
          v-model="entry.last_name_kana"
          :rules="[requiredValidation]"
        ></w-text>
      </template>
      <template v-else>
        <w-text label="氏名" v-model="entry.full_name" readonly></w-text>
      </template>
      <w-select
        label="応募元"
        :items="sources"
        item-title="name"
        item-value="id"
        v-model="entry.source_id"
        color="primary"
        :rules="[requiredValidation]"
      ></w-select>
      <w-select
        label="フェーズ"
        :items="phases"
        item-title="name"
        item-value="id"
        v-model="entry.phase_id"
        color="primary"
        :rules="[requiredValidation]"
      ></w-select>
      <w-select
        label="ステータス"
        :items="statuses"
        item-title="name"
        item-value="id"
        v-model="entry.status_id"
        color="primary"
        :rules="[requiredValidation]"
      ></w-select>
      <w-text label="メールアドレス" v-model="entry.mail"></w-text>
      <w-text label="電話番号" v-model="entry.phone"></w-text>
      <w-text label="生年月日" v-model="entry.birth_day"></w-text>
      <w-text label="郵便番号" v-model="entry.post_code"></w-text>
      <w-text label="住所" v-model="entry.address"></w-text>
      <w-text label="希望部署" v-model="entry.positions"></w-text>
      <w-text label="入社希望日" v-model="entry.join_day"></w-text>
      <w-text-area label="フリーメッセージ" rows="3" v-model="entry.free_message"></w-text-area>
      <w-text label="登録日" v-model="entry.created_at"></w-text>
    </v-form>
    <div class="d-flex justify-space-between">
      <v-btn
        v-if="!updMode"
        class="mt-3 mr-3 tw-w-40"
        color="blue-grey-darken-3"
        variant="outlined"
        text="閉じる"
        prepend-icon="mdi-close-box-outline"
        @click="onClose"
      >
      </v-btn>
      <v-btn
        :disabled="!valid"
        class="mt-3 tw-w-40"
        color="primary"
        text="保存"
        prepend-icon="mdi-content-save-edit-outline"
        @click="onSave"
      >
      </v-btn>
    </div>
  </w-sheet>
</template>

<script setup lang="ts">
import axios from "axios";
import { ref, onMounted, watch } from "vue";
import { Entry } from "../../types/entry";

const props = defineProps({
  entryId: {
    type: Number,
    default: 0,
  },
  updMode: {
    type: Boolean,
    default: true,
  },
});

const emit = defineEmits(["onClose"]);

const entry = ref<Entry>({});
const phases = ref([]);
const statuses = ref([]);
const sources = ref([]);
const valid = ref(false);

// バリデーション
const requiredValidation = (value: any) => !!value || "必須項目";

onMounted(async () => {
  const res1 = await axios.get("/api/ogarec/v1/masters", { params: { table: "m_phases" } });
  phases.value = res1.data;

  const res2 = await axios.get("/api/ogarec/v1/masters", { params: { table: "m_statuses" } });
  statuses.value = res2.data;

  const res3 = await axios.get("/api/ogarec/v1/masters", { params: { table: "m_sources" } });
  sources.value = res3.data;

  if (props.updMode) {
    const res = await axios.get("/api/ogarec/v1/entries/" + props.entryId);
    entry.value = res.data;
  }
});

async function onSave() {
  if (props.updMode) {
    await axios.put("/api/ogarec/v1/entries/" + props.entryId, entry.value);
    return;
  }
  await axios.post("/api/ogarec/v1/entries", entry.value);
  onClose();
}

function onClose() {
  emit("onClose");
}
</script>

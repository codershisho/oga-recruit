<template>
  <w-sheet>
    <div v-for="(judge, i) in judges" :key="i" class="pb-3">
      <div class="d-flex align-center">
        <div class="tw-text-sm tw-font-semibold">選考ステップ</div>
        <v-chip class="ml-2 tw-me-auto" color="light-blue-darken-3" label>
          {{ judge.phase_name }}
        </v-chip>
        <div class="w-50 mr-2">
          <w-select
            label="ステータス"
            :items="statuses"
            item-title="name"
            item-value="id"
            v-model="judge.status_id"
            color="primary"
          ></w-select>
        </div>
        <v-btn
          variant="tonal"
          text="保存"
          prepend-icon="mdi-content-save-edit-outline"
          color="primary"
          @click="onSave(judge)"
        ></v-btn>
      </div>
      <w-text-area v-model="judge.message"></w-text-area>
    </div>
  </w-sheet>
</template>

<script setup lang="ts">
import { Judge } from "../../types/entry";
import { ref } from "vue";

const props = defineProps({
  entryId: {
    type: Number,
    default: 0,
  },
});

const judges = ref<Judge[]>();
const statuses = ref([]);

search();

async function search() {
  const res = await axios.get("/api/ogarec/v1/entries/" + props.entryId + "/judges");
  judges.value = res.data;
  const res2 = await axios.get("/api/ogarec/v1/masters", { params: { table: "m_statuses" } });
  statuses.value = res2.data;
}

async function onSave(judge: Judge) {
  await axios.put("/api/ogarec/v1/entries/" + props.entryId + "/judges/" + judge.id, judge);
}
</script>

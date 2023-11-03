<template>
  <v-btn
    class="mb-3"
    color="primary"
    variant="outlined"
    text="新規エントリー"
    prepend-icon="mdi-content-save-edit-outline"
    @click="onNew"
  ></v-btn>
  <div :class="newFlag ? `d-flex` : ``">
    <EntryBasicInfo
      v-if="newFlag"
      class="w-50 mr-3"
      :upd-mode="false"
      @onClose="onCreated"
    ></EntryBasicInfo>
    <w-sheet :class="newFlag ? `w-50` : `w-100`">
      <v-item-group selected-class="selected" v-model="selectedPhase" @update:modelValue="filter">
        <div class="d-flex justify-space-between">
          <div v-for="(phase, i) in phases" :key="i" class="w-100">
            <v-item v-slot="{ isSelected, toggle }" :value="phase.id">
              <v-card
                :class="isSelected ? `selected` : `unselected`"
                class="rounded-pill mx-2"
                height="40"
                flat
                @click="toggle"
              >
                <div class="mt-2 tw-text-center">{{ phase.name }}</div>
              </v-card>
            </v-item>
          </div>
        </div>
      </v-item-group>
      <v-table>
        <thead>
          <tr>
            <th class="!tw-text-base !tw-font-semibold">id</th>
            <th class="!tw-text-base !tw-font-semibold">氏名</th>
            <th class="!tw-text-base !tw-font-semibold">フェーズ</th>
            <th class="!tw-text-base !tw-font-semibold">ステータス</th>
            <th class="!tw-text-base !tw-font-semibold">登録日</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(item, i) in items" :key="i" @click="onClickRow(item)">
            <td class="!tw-text-sm">{{ item.id }}</td>
            <td class="!tw-text-sm">{{ item.full_name }}</td>
            <td class="!tw-text-sm">{{ item.phase_name }}</td>
            <td class="!tw-text-sm">{{ item.status_name }}</td>
            <td class="!tw-text-sm">{{ item.created_at }}</td>
          </tr>
        </tbody>
      </v-table>
    </w-sheet>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";
import { useRouter } from "vue-router";
import axios from "axios";
import EntryBasicInfo from "../components/organisms/EntryBasicInfo.vue";

const router = useRouter();
const items = ref([]);
const newFlag = ref(false);
const selectedPhase = ref(null);
const phases = ref([]);

onMounted(() => {
  search();
});

/**
 * 一覧検索
 */
async function search() {
  const [resEntries, resPhase] = await Promise.all([
    axios.get("/api/ogarec/v1/entries"),
    axios.get("/api/ogarec/v1/masters", { params: { table: "m_phases" } }),
  ]);

  items.value = resEntries.data;
  phases.value = resPhase.data;
}

/**
 * フェーズによるフィルタリング
 * @param selected 選択されたフェーズID
 */
async function filter(selectedPhaseId: Number | undefined) {
  // 条件がクリアされた場合は一覧検索
  if (selectedPhaseId === undefined) {
    search();
    return;
  }

  const res = await axios.get("/api/ogarec/v1/entries", { params: { phase_id: selectedPhaseId } });
  items.value = res.data;
}

/**
 * 行クリックイベント
 * @param event
 * @param rowVal
 */
function onClickRow(rowVal: any) {
  const entryId = rowVal.id;
  router.push("/entries/" + entryId);
}

/**
 * 新規ボタン押下イベント
 */
function onNew() {
  newFlag.value = true;
}

/**
 * 新規作成後はモードを解除し、一覧の再検索
 */
function onCreated() {
  newFlag.value = false;
  search();
}
</script>

<style>
.selected {
  background-color: rgba(23, 92, 177, 0.79) !important;
  color: white !important;
}
.unselected {
  background-color: rgba(160, 179, 203, 0.79) !important;
  color: white !important;
}
</style>

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
      @onClose="newFlag = false"
    ></EntryBasicInfo>
    <w-sheet :class="newFlag ? `w-50` : `w-100`">
      <v-data-table
        :headers="headers"
        :items="items"
        item-value="name"
        density="compact"
        @click:row="onClickRow"
      ></v-data-table>
    </w-sheet>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";
import { VDataTable } from "vuetify/labs/VDataTable";
import { useRouter } from "vue-router";
import axios from "axios";
import EntryBasicInfo from "../components/organisms/EntryBasicInfo.vue";

const router = useRouter();
const headers = ref([
  { title: "id", key: "id" },
  { title: "氏名", key: "full_name" },
  { title: "フェーズ", key: "phase_name" },
  { title: "ステータス", key: "status_name" },
  { title: "登録日", key: "created_at" },
]);

const items = ref([]);
const newFlag = ref(false);

onMounted(async () => {
  const res = await axios.get("/api/ogarec/v1/entries");
  items.value = res.data;
});

function onClickRow(event: any, rowVal: any) {
  const entryId = rowVal.item.id;
  router.push("/entries/" + entryId);
}

function onNew() {
  newFlag.value = true;
}
</script>

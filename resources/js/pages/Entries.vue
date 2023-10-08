<template>
  <b-sheet>
    <v-data-table :headers="headers" :items="items" item-value="name" @click:row="onClickRow"></v-data-table>
  </b-sheet>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";
import BSheet from "../components/Sheet.vue";
import { VDataTable } from "vuetify/labs/VDataTable";
import { useRouter } from "vue-router";

const router = useRouter();
const headers = ref([
  { title: "id", key: "id" },
  { title: "氏名", key: "full_name" },
  { title: "フェーズ", key: "phase_name" },
  { title: "ステータス", key: "status_name" },
  { title: "登録日", key: "created_at" },
]);

const items = ref([]);

onMounted(async () => {
  const res = await axios.get("api/ogarec/v1/entries");
  items.value = res.data;
});

function onClickRow(event: any, rowVal: any) {
  const entryId = rowVal.item.id;
  console.log(entryId);
  router.push("/entries/" + entryId);
}
</script>

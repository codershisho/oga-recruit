<template>
  <w-sheet>
    <div class="d-flex align-center">
      <div class="tw-w-2/12 tw-text-sm tw-font-semibold">履歴書</div>
      <div class="tw-w-7/12">
        <v-file-input
          label="upload"
          density="compact"
          hide-details
          v-model="resumeFile"
        ></v-file-input>
      </div>
      <div class="tw-w-1/12">
        <v-btn
          v-if="uploaded?.resume_path"
          class="ml-2"
          icon="mdi-arrow-top-right-bold-box-outline"
          size="x-small"
          color="primary"
          @click="onJumpResume"
        ></v-btn>
      </div>
      <div class="tw-w-2/12">
        <v-btn class="tw-w-full" variant="outlined" color="primary" @click="onUpload">
          Upload
        </v-btn>
      </div>
    </div>
    <div class="d-flex align-center py-2">
      <div class="tw-w-2/12 tw-text-sm tw-font-semibold">職務経歴書</div>
      <div class="tw-w-7/12">
        <v-file-input label="upload" density="compact" hide-details v-model="cvFile"></v-file-input>
      </div>
      <div class="tw-w-1/12">
        <v-btn
          v-if="uploaded?.cv_path"
          class="ml-2"
          icon="mdi-arrow-top-right-bold-box-outline"
          size="x-small"
          color="primary"
          @click="onJumpCv"
        ></v-btn>
      </div>
      <div class="tw-w-2/12">
        <v-btn class="tw-w-full" variant="outlined" color="primary" @click="onUpload">
          Upload
        </v-btn>
      </div>
    </div>
    <div class="d-flex align-center">
      <div class="tw-w-2/12 tw-text-sm tw-font-semibold">適性結果</div>
      <div class="tw-w-7/12">
        <w-text placeholder="リンクURL" v-model="analysisLink"></w-text>
      </div>
      <div class="tw-w-1/12">
        <v-btn
          v-if="uploaded?.analysis_link"
          class="ml-2"
          icon="mdi-arrow-top-right-bold-box-outline"
          size="x-small"
          color="primary"
        ></v-btn>
      </div>
      <div class="tw-w-2/12">
        <v-btn class="tw-w-full" variant="outlined" color="primary" @click="onUpload"> Save </v-btn>
      </div>
    </div>
  </w-sheet>
</template>

<script setup lang="ts">
import { Uploaded } from "@/types/entry";
import axios from "axios";
import { ref, onMounted } from "vue";

const props = defineProps<{
  entryId?: Number;
}>();

const resumeFile = ref<File[]>();
const cvFile = ref<File[]>();
const analysisLink = ref("");
// upload済みファイルパス情報
const uploaded = ref<Uploaded>();

onMounted(() => {
  search();
});

/**
 * アップロード済みの情報を検索
 */
async function search() {
  const res = await axios.get("/api/ogarec/v1/entries/" + props.entryId + "/upload");
  uploaded.value = res.data;
}

/**
 * 選択されたドキュメントをアップロード
 */
async function onUpload() {
  const formData = new FormData();

  if (resumeFile.value !== undefined) {
    formData.append("resumeFile", resumeFile.value[0]);
  }
  if (cvFile.value !== undefined) {
    formData.append("cvFile", cvFile.value[0]);
  }

  await axios.post("/api/ogarec/v1/entries/" + props.entryId + "/upload", formData, {
    headers: {
      "content-type": "multipart/form-data",
    },
  });
}

// TODO 適性検査URLの保存

/**
 * アップロードされたPFDを別タブで参照
 */
function onJumpResume() {
  const url = "http://localhost/uploads/pdf/resume/" + props.entryId;
  window.open(url, "_blank");
}
function onJumpCv() {
  const url = "http://localhost/uploads/pdf/cv/" + props.entryId;
  window.open(url, "_blank");
}
</script>

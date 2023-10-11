<template>
  <div class="d-flex">
    <div class="tw-w-1/2 mr-3">
      <EntryDiscussions class="w-100" :entry-id="Number(route.params.id)"></EntryDiscussions>
    </div>
    <div class="tw-w-1/2">
      <EntryBasicInfo
        class="w-100"
        v-show="expand"
        :entry-id="Number(route.params.id)"
      ></EntryBasicInfo>
      <EntryDocs class="w-100" :entry-id="Number(route.params.id)"></EntryDocs>
      <EntryJudge class="w-100"></EntryJudge>
    </div>
  </div>
  <!-- <div class="d-flex align-stretch">
    <div class="d-flex tw-w-10/12">
      <div class="d-flex tw-w-1/2">
        <EntryBasicInfo
          class="w-100"
          v-show="expand"
          :entry-id="Number(route.params.id)"
        ></EntryBasicInfo>
      </div>
      <div class="d-flex tw-w-1/2 mx-3">
        <EntryDocs class="w-100" :entry-id="Number(route.params.id)"></EntryDocs>
      </div>
    </div>
    <div class="d-flex tw-w-2/12">
      <EntryWatchers class="w-100" :entry-id="Number(route.params.id)"></EntryWatchers>
    </div>
  </div>
  <div class="mt-3 d-flex align-stretch">
    <div class="d-flex w-50 mr-3">
      <EntryDiscussions class="w-100" :entry-id="Number(route.params.id)"></EntryDiscussions>
    </div>
    <div class="d-flex w-50">
      <EntryJudge class="w-100"></EntryJudge>
    </div>
  </div> -->
</template>

<script setup lang="ts">
import { ref } from "vue";
import { useRoute } from "vue-router";
import EntryBasicInfo from "../components/organisms/EntryBasicInfo.vue";
import EntryWatchers from "../components/organisms/EntryWatchers.vue";
import EntryDiscussions from "../components/organisms/EntryDiscussions.vue";
import EntryDocs from "../components/organisms/EntryDocs.vue";
import EntryJudge from "../components/organisms/EntryJudge.vue";

const route = useRoute();

const expand = ref(true);
</script>

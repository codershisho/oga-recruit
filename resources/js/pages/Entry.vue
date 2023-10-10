<template>
  <div class="d-flex">
    <div class="d-flex tw-w-5/6">
      <div class="tw-w-1/3">
        <v-btn color="primary" @click="expand = !expand"> Expand Transition </v-btn>
        <v-expand-transition>
          <EntryBasicInfo v-show="expand" :entry-id="route.params.id"></EntryBasicInfo>
        </v-expand-transition>
        <EntryDocs :entry-id="route.params.id"></EntryDocs>
      </div>
      <div class="tw-w-2/3 mx-3">
        <EntryDiscussions :entry-id="route.params.id"></EntryDiscussions>
      </div>
    </div>
    <div class="tw-w-1/6 mx-3">
      <EntryWatchers :entry-id="route.params.id"></EntryWatchers>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from "vue";
import { useRoute } from "vue-router";
import EntryBasicInfo from "../components/organisms/EntryBasicInfo.vue";
import EntryWatchers from "../components/organisms/EntryWatchers.vue";
import EntryDiscussions from "../components/organisms/EntryDiscussions.vue";
import EntryDocs from "../components/organisms/EntryDocs.vue";

const route = useRoute();

const expand = ref(true);
</script>

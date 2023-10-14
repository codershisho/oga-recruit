<template>
  <div class="d-flex align-center py-2">
    <div v-if="label" class="tw-w-1/4 tw-text-sm tw-font-semibold">
      {{ label }}
    </div>
    <v-textarea
      v-bind="$attrs"
      auto-grow
      density="compact"
      variant="solo-filled"
      flat
      hide-details
      v-model="value"
    ></v-textarea>
  </div>
</template>

<script setup lang="ts">
import { computed } from "vue";

defineOptions({
  inheritAttrs: false,
});

const props = defineProps(["modelValue", "label"]);
const emit = defineEmits(["update:modelValue"]);

const value = computed({
  get() {
    return props.modelValue;
  },
  set(value) {
    emit("update:modelValue", value);
  },
});
</script>

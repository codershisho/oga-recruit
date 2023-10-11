<template>
  <div class="d-flex align-center py-2">
    <div class="tw-w-1/4 tw-text-sm tw-font-semibold">
      {{ label }}
    </div>
    <div class="tw-w-3/4">
      <v-autocomplete
        v-bind="$attrs"
        v-model="value"
        variant="solo-filled"
        flat
        density="compact"
        hide-details
        clearable
      />
    </div>
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

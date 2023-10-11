<template>
  <div class="d-flex align-center py-2">
    <div v-if="label" class="tw-w-1/4 tw-text-sm tw-font-semibold">
      {{ label }}
    </div>
    <div :class="label ? `tw-w-3/4` : `tw-w-full`">
      <v-text-field
        class="tw-text-sm tw-font-semibold"
        v-bind="$attrs"
        v-model="value"
        variant="solo-filled"
        flat
        density="compact"
        hide-details
        single-line
      >
        <template v-if="preicon" v-slot:prepend-inner>
          <v-icon :icon="preicon" :size="15" />
        </template>
      </v-text-field>
    </div>
  </div>
</template>
<script setup lang="ts">
import { computed } from "vue";

defineOptions({
  inheritAttrs: false,
});

const props = defineProps(["modelValue", "label", "preicon"]);
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

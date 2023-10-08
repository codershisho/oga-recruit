<template>
  <div>
    {{ label }}
  </div>
  <v-autocomplete
    v-bind="$attrs"
    v-model="value"
    variant="solo-filled"
    flat
    density="compact"
    hide-details
    clearable
  />
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

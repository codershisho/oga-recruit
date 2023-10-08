<template>
  <div class="">
    {{ label }}
  </div>
  <v-text-field
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

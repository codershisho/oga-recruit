<template>
  <v-sheet v-bind="$attrs" class="pa-6 py-3 rounded-lg" elevation="0">
    <slot />
  </v-sheet>
</template>

<script setup lang="ts">
defineOptions({
  inheritAttrs: false,
});
</script>

<script setup>
import { Head } from "@inertiajs/vue3";

defineProps(["step"]);
</script>

<template>
  <div>
    <Head title="Testeci_whisnu" />
    <h1>step {{ step }} page!</h1>
  </div>
</template>

<script setup lang="ts">
import { inject } from 'vue';
const i18n = inject<any>('i18n');
defineProps<{ project: any }>();
</script>

<template>
    <div class="mx-auto max-w-5xl px-4 py-12">
        <h1 class="text-3xl font-bold mb-4">{{ project.title }}</h1>
        <p class="text-zinc-300 mb-6">{{ project.summary }}</p>
        <div class="prose prose-invert max-w-none" v-html="project.description"></div>
    </div>
</template>



<script setup lang="ts">
defineProps<{ post: any }>();
</script>

<template>
    <div class="mx-auto max-w-3xl px-4 py-12">
        <h1 class="text-3xl font-bold mb-4">{{ post.title }}</h1>
        <div class="prose prose-invert max-w-none" v-html="post.content"></div>
    </div>
</template>



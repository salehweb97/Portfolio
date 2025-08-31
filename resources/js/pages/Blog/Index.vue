<script setup lang="ts">
defineProps<{ posts: any }>();
</script>

<template>
    <div class="mx-auto max-w-5xl px-4 py-12">
        <h1 class="text-2xl font-semibold mb-6">Blog</h1>
        <div class="grid gap-4">
            <article v-for="p in posts.data" :key="p.id" class="rounded-lg border border-zinc-800 p-4 bg-zinc-900/40">
                <h2 class="font-semibold">{{ p.title }}</h2>
                <p class="text-sm text-zinc-400">{{ p.excerpt }}</p>
            </article>
        </div>
    </div>
</template>



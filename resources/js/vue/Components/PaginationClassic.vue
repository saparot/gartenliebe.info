<template>
    <div class="flex gap-1">
        <Link
            v-for="(link, index) in links"
            :key="index" class="box"
            :href="link.url"
            :class="{
                'hover:bg-primary hover:text-white':true,
                'bg-secondary text-white dark:bg-secondary dark:hover:text-inherit': link.active
            }"
            v-html="link.label"
        />
    </div>
</template>

<script setup>
import {Link} from '@inertiajs/inertia-vue3';

defineProps({links: Array});
</script>

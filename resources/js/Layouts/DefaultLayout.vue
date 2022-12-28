<template>
    <Link :href="route('landingpage.index')">Landing Page</Link>
    <Link :href="route('news.index')">News</Link>
    <slot>Default</slot>
</template>

<script setup>
import {Link, usePage} from '@inertiajs/inertia-vue3';

const page = usePage();
</script>

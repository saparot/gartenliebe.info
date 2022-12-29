<template>
    <Header class="flex w-full justify-between flex-row p-1 bg-gray-200 dark:bg-gray-700">

        <Link :href="route('landingpage.index')">Landing Page</Link>
        <Link :href="route('news.index')">News</Link>

    </Header>
    <Main>
        <slot>Default</slot>
    </Main>
</template>

<script setup>
import {Link, usePage} from '@inertiajs/inertia-vue3';
const page = usePage();
</script>

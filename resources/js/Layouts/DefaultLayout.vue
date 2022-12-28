<template>
    <Link href="/landingpage">Landing Page</Link>
    <Link href="/news">News</Link>
    <div v-if="flashMessageSuccess">
        {{ flashMessageSuccess }}
    </div>
    <slot>Default</slot>
</template>

<script setup>
import {Link, usePage} from '@inertiajs/inertia-vue3';
import {computed} from 'vue';

const page = usePage();
const flashMessageSuccess = computed(() => page.props.value.flash.success || false);
</script>

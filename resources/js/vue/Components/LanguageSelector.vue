<template>
    <div class="ml-4">
        <Link
            class="inline-flex items-center px-1 pt-1 text-sm"
            :href="route('language.switch', { locale})"
            method="POST"
        >
            <div v-if="localeGiven === 'de'">EN</div>
            <div v-else>DE</div>
        </Link>
    </div>
    <div>{{ localeGiven }}</div>
</template>

<script setup>
import {Link, usePage} from '@inertiajs/vue3';
import {computed} from 'vue';

const locale = computed(() => usePage().props.locale === 'en' ? 'de' : 'en');
const localeGiven = computed(() => usePage().props.locale === 'en' ? 'en' : 'de');
</script>

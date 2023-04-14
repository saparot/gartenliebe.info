<template>
    <div class="justify-items-center ml-4">
        <Link
            class=""
            :href="route('language.switch', { locale})"
            method="POST"
        >
            <div v-if="localeGiven === 'de'"><img :src="flagEnglish" alt="switch language to English" class="max-w-full h-10"></div>
            <div v-else><img :src="flagGerman" alt="switch language to German" class="max-w-full h-10"></div>
        </Link>
    </div>

    <div v-if="localeGiven === 'de'">
        <img :src="flagGerman" alt="switch language to German" class="max-w-full h-10">
    </div>
    <div v-else>
        <img :src="flagEnglish" alt="switch language to English" class="max-w-full h-10">
    </div>

</template>

<script setup>
import {Link, usePage} from '@inertiajs/vue3';
import {computed} from 'vue';
import flagGerman from '/resources/images/flags/de.svg';
import flagEnglish from '/resources/images/flags/gb.svg';

const locale = computed(() => usePage().props.locale === 'en' ? 'de' : 'en');
const localeGiven = computed(() => usePage().props.locale === 'en' ? 'en' : 'de');
</script>

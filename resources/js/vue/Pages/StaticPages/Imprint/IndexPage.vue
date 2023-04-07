<template>
    <ImprintGerman
        v-if="languageIso === 'de'"
        :address="props.address"
        :contactEmail="props.contactEmail"
        :contactPhone="props.contactPhone"
    />
    <ImprintEnglish
        v-else
        :address="props.address"
        :contactEmail="props.contactEmail"
        :contactPhone="props.contactPhone"
    />

</template>
<script setup>
import {computed} from 'vue';
import {usePage} from '@inertiajs/inertia-vue3';
import ImprintGerman from './ImprintGerman.vue';
import ImprintEnglish from './ImprintEnglish.vue';

const props = defineProps({
    address: Array,
    contactEmail: String,
    contactPhone: String,
});

const page = usePage();
const languageIso = computed(() => page.props.value.languageIso);
</script>

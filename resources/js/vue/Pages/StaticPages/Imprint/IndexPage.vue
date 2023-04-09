<template>
    <div class="mx-auto md:w-1/3">
        <h1 class="headline-1">{{ __('static.pages.imprint.title') }}</h1>
        <h2 class="headline-2">{{ __('static.pages.imprint.tmg') }}</h2>
        <div class="mb-2">
            <div v-for="addressLine in address">
                {{ addressLine }}
            </div>
        </div>
        <h3 class="headline-3">{{ __('static.pages.imprint.contact') }}</h3>
        <div class="mb-2">
            <div>{{ __('static.pages.imprint.contact') }}: {{ contactPhone }}</div>
            <div>{{ __('static.pages.imprint.contact') }}: {{ contactEmail }}</div>
        </div>
        <h2 class="headline-2">{{ __('static.pages.imprint.content.responsible') }}</h2>
        <div v-for="addressLine in address">
            {{ addressLine }}
        </div>
    </div>
</template>
<script setup>
import {computed} from 'vue';
import {usePage} from '@inertiajs/inertia-vue3';

const props = defineProps({
    address: Array,
    contactEmail: String,
    contactPhone: String,
});

const page = usePage();
const locale = computed(() => page.props.value.locale);
</script>

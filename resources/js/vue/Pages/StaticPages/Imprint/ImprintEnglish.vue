<template>
    <div class="mx-auto md:w-1/3">
        <h1 class="headline-1">Imprint</h1>
        <h2 class="headline-2">Information according to § 5 TMG</h2>
        <div class="mb-2">
            <div v-for="addressLine in props.address">
                {{ addressLine }}
            </div>
        </div>
        <h3 class="headline-3">Contact</h3>
        <div class="mb-2">
            <div>Telefon: {{ props.contactPhone }}</div>
            <div>E-Mail: {{ props.contactEmail }}</div>
        </div>

        <h2 class="headline-2">Responsible for the content according to § 55 para. 2 RStV</h2>
        <div v-for="addressLine in props.address">
            {{ addressLine }}
        </div>
    </div>
</template>
<script setup>
const props = defineProps({
    address: Array,
    contactEmail: String,
    contactPhone: String,
});
</script>

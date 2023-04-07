<template>
    <div class="mx-auto md:w-1/3">
        <h1 class="headline-1">Impressum</h1>
        <h2 class="headline-2">Angaben gemäß § 5 TMG</h2>
        <div class="mb-2">
            <div v-for="addressLine in props.address">
                {{ addressLine }}
            </div>
        </div>
        <h3 class="headline-3">Kontakt</h3>
        <div class="mb-2">
            <div>Telefon: {{ props.contactPhone }}</div>
            <div>E-Mail: {{ props.contactEmail }}</div>
        </div>
        <h2 class="headline-2">Verantwortlich für Inhalte gemäß § 18 Abs. 2 MStV</h2>
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

<template>
    <div>
        Landing page index
        plant info count: {{ plantInfoCount }}
    </div>
</template>

<script setup>

defineProps({
    plantInfoCount: {
        type: Number,
        default: 0,
    },
});
</script>

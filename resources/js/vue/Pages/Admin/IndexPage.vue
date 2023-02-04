<template>
    <div>
        Admin Index Page ({{ plantInfoCounter }})
    </div>
</template>

<script setup>

defineProps({
    plantInfoCounter: {
        type: Number,
        default: 0,
    },
});
</script>

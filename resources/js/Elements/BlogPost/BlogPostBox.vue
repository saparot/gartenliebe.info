<template>
    <Box>
        <div class="text-gray-500 font-medium mb-1">
            {{ blog.title_de }}
        </div>
        <div>
            {{ blog.content_de }}
        </div>
    </Box>

</template>

<script setup>

import Box from '/resources/js/UI/PurpleOlives/Box.vue';

const props = defineProps({
    blog: Object,
});
</script>

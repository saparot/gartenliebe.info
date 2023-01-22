<template>
    <Box>
        <div class="text-gray-500 font-medium mb-1">
            {{ blog.title_de }}
        </div>
        <div>
            {{ blog.content_de }}
        </div>

        <div class="flex">
            <a :href="route('blog.show', {blog: blog})" class="button-primary">show</a>
            <a :href="route('blog.edit', {blog: blog})" class="button-secondary">edit</a>

        </div>
    </Box>

</template>

<script setup>

import Box from '/resources/js/UI/PurpleOlives/Box.vue';

const props = defineProps({
    blog: Object,
});
</script>

<template>

    <h1 class="text-6xl font-normal leading-normal mt-0 mb-2 text-fuchsia-800">Latest blog posts</h1>


    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        <BlogPostBox v-for="blog in blogs" :key="blog.id" :blog="blog"/>
    </div>

</template>

<script setup>

import BlogPostBox from '/resources/js/Elements/BlogPost/BlogPostBox.vue';

const props = defineProps({
    blogs: Array,
});
</script>

<template>

    <h1 class="headline-1">Latest blog posts</h1>

    <div class="flex justify-end mb-4">
        <a class="button-primary flex"
        :href="route('blog.create')">

            <PlusIcon class="h-4"/>
            Blog-Post
        </a>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        <BlogPostBox v-for="blog in blogs" :key="blog.id" :blog="blog"/>
    </div>


</template>

<script setup>

import {PlusIcon} from '@heroicons/vue/24/solid';

import BlogPostBox from '/resources/js/Elements/BlogPost/BlogPostBox.vue';

const props = defineProps({
    blogs: Array,
});
</script>

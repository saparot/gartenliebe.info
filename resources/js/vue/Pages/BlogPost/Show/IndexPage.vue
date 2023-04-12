<template>
    <div class="flex justify-end mb-4">
        <a class="button-secondary flex"
           :href="route(routeBlog.list)">

            <ArrowLeftOnRectangleIcon class="h-4"/>
            {{ __('blogposts.overview') }}
        </a>
    </div>
    <h1 class="headline-1">{{ blogPost.title_de }}</h1>
    <div>
        <MdEditor
            previewOnly
            previewTheme="vuepress"
            noMermaid="true"
            :theme="theme"
            language="en-US"
            :modelValue="blogPost.content_de"
        />
    </div>
</template>
<script setup>
import {ArrowLeftOnRectangleIcon} from '@heroicons/vue/24/solid';
import {routeBlog} from '~lib/routes';
import {modelBlogPost} from '~lib/models/modelBlogPost';
import MdEditor from 'md-editor-v3';
import 'md-editor-v3/lib/style.css';
import {darkMode} from '~lib/darkMode';
import {computed} from 'vue';

const props = defineProps({
    blogPost: modelBlogPost,
});

const theme = computed(() => darkMode().isDarkMode() ? 'dark' : 'light');


</script>

<template>
    <div class="flex justify-end mb-4">
        <a class="button-secondary flex"
           :href="route(routeBlog.list)">

            <ArrowLeftOnRectangleIcon class="h-4"/>
            Blog Overview
        </a>
    </div>
    <h1 class="headline-1">{{ blogPost.title_de }}</h1>

    <div>
        {{ blogPost.content_de }}

    </div>
</template>
<script setup>
import {ArrowLeftOnRectangleIcon} from '@heroicons/vue/24/solid';
import {routeBlog} from '~lib/routes';

const props = defineProps({
    blogPost: Object,
});

</script>

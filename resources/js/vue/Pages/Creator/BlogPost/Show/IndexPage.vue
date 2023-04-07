<template>
    <div class="flex justify-end mb-4">
        <a class="button-secondary flex"
           :href="route(routeBlog.creator.list)">

            <ArrowLeftOnRectangleIcon class="h-4"/>
            Blog Preview List
        </a>
    </div>


    <div class="flex justify-end mb-4">
        <div class="flex justify-endssss items-center gap-2">
            <a :href="route(routeBlog.show, { blog })" class="button-primary">Show Public page</a>
            <a :href="route(routeBlog.creator.edit, { blog })" class="button-secondary">Edit</a>
            <a :href="route(routeBlog.creator.image.create, { blog })" class="button-secondary">Add Images</a>
        </div>

    </div>

    <h1 class="headline-1">{{ blog.title_de }}</h1>

    <div>
        {{ blog.content_de }}

    </div>
</template>
<script setup>
import {ArrowLeftOnRectangleIcon} from '@heroicons/vue/24/solid';
import {routeBlog} from '~lib/routes';

const props = defineProps({
    blog: Object,
});
</script>

<template>

    <h1 class="headline-1">{{ __('blogposts.title.latest') }}</h1>

    <div
        v-if="isCreator"
        class="flex justify-end mb-4">
        <a class="button-primary flex"
           :href="route(routeBlog.creator.create)">

            <PlusIcon class="h-4"/>
            {{ __('blogposts.blogpost.title') }}
        </a>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 mb-4">
        <BlogPostBox v-for="blog in blogs.data" :key="blog.id" :blog="blog" :creatorMode="false"/>
    </div>
    <div v-if="blogs.data.length" class="w-full flex justify-center mx-8">
        <PaginationClassic :links="blogs.links"/>
    </div>


</template>

<script setup>
import {PlusIcon} from '@heroicons/vue/24/solid';
import BlogPostBox from '~olive/BlogPostBox.vue';
import PaginationClassic from '~olive/PaginationClassic.vue';
import {computed} from 'vue';
import {usePage} from '@inertiajs/inertia-vue3';
import {routeBlog} from '~lib/routes';

const page = usePage({
    isCreator: {
        type: Boolean,
        default: false,
    },
});
const props = defineProps({
    blogs: {
        data: Array,
    },
});

const isCreator = computed(() => page.props.value.isCreator);
</script>

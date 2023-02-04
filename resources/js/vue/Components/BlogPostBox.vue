<template>
    <Box>
        <div class="flex overflow-hidden max-h-56">

            <img src="/images/random/random1.jpg"
                 alt="garden picture"
                 class="object-cover w-2/5 border-r2 border-lime-700"
            >

            <div class="bg-gray-200 dark:bg-gray-900 w-full flex flex-col justify-between py-0.5 pl-1">
                <div class="dark:text-lime-800 font-bold mb-1">
                    {{ blog.title_de }}
                </div>
                <div class="relative">
                    <div class="overflow-hidden">
                        {{ blog.content_de }}
                    </div>
                </div>

                <div class="flex justify-end">
                    <a :href="route(routeBlog.show, {blog: blog})" class="button-primary">show</a>
                    <a v-if="creatorMode && isCreator" :href="route('creator.blog.edit', {blog: blog})" class="button-secondary">edit</a>

                </div>
            </div>
        </div>
    </Box>

</template>

<script setup>
import {routeBlog} from '~lib/routes';
import Box from '~olive/Box.vue';
import {computed} from 'vue';
import {usePage} from '@inertiajs/inertia-vue3';

const page = usePage();
const isCreator = computed(() => page.props.value.isCreator);
const props = defineProps({
    blog: Object,
    creatorMode: {
        type: Boolean,
        default: false,
    },
});


</script>

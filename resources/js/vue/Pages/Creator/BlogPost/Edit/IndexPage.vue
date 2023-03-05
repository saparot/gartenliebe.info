<template>

    <h1 class="headline-1">Edit Blog Post</h1>

    <div class="flex justify-end mb-4">
        <a class="button-secondary flex"
           :href="route(routeBlog.creator.list)">

            <ArrowLeftOnRectangleIcon class="h-4"/>
            Blog Overview
        </a>
    </div>

    <form @submit.prevent="update">
        <div class="container md:container md:mx-auto">
            <div class="col-span-2 mt-4">
                <label for="titleDe">Title (de)</label>
                <input type="text" v-model.number="blogPostEdit.title_de" class="input">
                <div v-if="blogPostEdit.errors.title_de" class="error">
                    {{ blogPostEdit.errors.title_de }}
                </div>
            </div>

            <div class="col-span-2 mt-4">
                <label for="seoKeywords">SEO Keywords</label>
                <input type="text" v-model.number="blogPostEdit.seo_keywords" class="input">
                <div v-if="blogPostEdit.errors.seo_keywords" class="error">
                    {{ blogPostEdit.errors.seo_keywords }}
                </div>
            </div>

            <div class="col-span-2 mt-4">
                <label for="contentDe">Blogpost</label>
                <textarea v-model.number="blogPostEdit.content_de" class="input h-64"></textarea>
                <div v-if="blogPostEdit.errors.content_de" class="error">
                    {{ blogPostEdit.errors.content_de }}
                </div>
            </div>

            <div class="col-span-2 mt-4">
                <label for="status">Status ({{ blogPostEdit.status }})</label>
                <select class="input"
                        v-model.number="blogPostEdit.status"
                >
                    <option value="preview">Preview</option>
                    <option value="published">Published</option>
                    <option value="unpublished">Not Published</option>
                </select>

                <div v-if="blogPostEdit.errors.status" class="error">
                    {{ blogPostEdit.errors.status }}
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="button-primary w-full">Save</button>
            </div>
        </div>
    </form>


</template>

<script setup>
import {useForm} from '@inertiajs/inertia-vue3';
import {ArrowLeftOnRectangleIcon} from '@heroicons/vue/24/solid';
import {routeBlog} from '~lib/routes';

const props = defineProps({
    blog: Object,
});

const blogPostEdit = useForm({
    title_de: props.blog.title_de,
    content_de: props.blog.content_de,
    seo_keywords: props.blog.seo_keywords,
    status: props.blog.status,
});

const update = () => blogPostEdit.patch(route('blog.update', {blog: props.blog}));

</script>

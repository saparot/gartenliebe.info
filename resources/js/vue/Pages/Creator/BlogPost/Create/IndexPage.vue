<template>

    <h1 class="headline-1">Create Blog Post</h1>

    <div class="flex justify-end mb-4">
        <a class="button-secondary flex"
           :href="route(routeBlog.creator.list)">

            <ArrowLeftOnRectangleIcon class="h-4"/>
            Blog Overview
        </a>
    </div>

    <form @submit.prevent="create">
        <div class="container md:container md:mx-auto">


            <div class="col-span-2 mt-4">
                <label for="titleDe">Title (de)</label>
                <input type="text" v-model.number="blogPost.title_de" class="input">
                <div v-if="blogPost.errors.title_de" class="error">
                    {{ blogPost.errors.title_de }}
                </div>
            </div>

            <div class="col-span-2 mt-4">
                <label for="seoKeywords">SEO Keywords</label>
                <input type="text" v-model.number="blogPost.seo_keywords" class="input">
                <div v-if="blogPost.errors.seo_keywords" class="error">
                    {{ blogPost.errors.seo_keywords }}
                </div>
            </div>

            <div class="col-span-2 mt-4">
                <label for="contentDe">Blogpost</label>
                <textarea v-model.number="blogPost.content_de" class="input h-64"></textarea>
                <div v-if="blogPost.errors.content_de" class="error">
                    {{ blogPost.errors.content_de }}
                </div>
            </div>

            <div class="col-span-2 mt-4">
                <label for="status">Status</label>
                <select v-model.number="blogPost.status" class="input">
                    <option value="published">Published</option>
                    <option value="unpublished">Not Published</option>
                    <option value="preview">Preview</option>
                </select>

                <div v-if="blogPost.errors.status" class="error">
                    {{ blogPost.errors.status }}
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

const blogPost = useForm({
    title_de: null,
    content_de: null,
    seo_keywords: null,
    status: 'preview',
});

const create = () => blogPost.post(route(routeBlog.creator.store));

</script>

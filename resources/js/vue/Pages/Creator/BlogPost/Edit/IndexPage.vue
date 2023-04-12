<template>

    <h1 class="headline-1">{{ __('blogposts.blogpost.edit') }}</h1>

    <div class="flex justify-end mb-4">
        <a class="button-secondary flex"
           :href="route(routeBlog.creator.list)">

            <ArrowLeftOnRectangleIcon class="h-4"/>
            {{ __('blogposts.overview') }}
        </a>
    </div>

    <form @submit.prevent="update">
        <div class="container md:container md:mx-auto">
            <div class="col-span-2 mt-4">
                <label for="titleDe">{{ __('blogpost.attribute.titleDE') }}</label>
                <input type="text" v-model.number="blogPostEdit.title_de" class="input">
                <div v-if="blogPostEdit.errors.title_de" class="error">
                    {{ blogPostEdit.errors.title_de }}
                </div>
            </div>

            <div class="col-span-2 mt-4">
                <label for="seoKeywords">{{ __('blogpost.attribute.seo') }}</label>
                <input type="text" v-model.number="blogPostEdit.seo_keywords" class="input">
                <div v-if="blogPostEdit.errors.seo_keywords" class="error">
                    {{ blogPostEdit.errors.seo_keywords }}
                </div>
            </div>

            <div class="col-span-2 mt-4">
                <label for="contentDe">{{ __('blogpost.attribute.contentDE') }}</label>
                <MdEditor
                    v-model.number="blogPostEdit.content_de"
                    theme="dark"
                    language="en-US"
                />
                <div v-if="blogPostEdit.errors.content_de" class="error">
                    {{ blogPostEdit.errors.content_de }}
                </div>
            </div>

            <div class="col-span-2 mt-4">
                <label for="status">{{ __('blogpost.attribute.status') }} ({{ blogPostEdit.status }})</label>
                <select class="input"
                        v-model.number="blogPostEdit.status"
                >
                    <option value="preview">{{ __('blogposts.status.preview') }}</option>
                    <option value="published">{{ __('blogposts.status.published') }}</option>
                    <option value="unpublished">{{ __('blogposts.status.unpublished') }}</option>
                </select>

                <div v-if="blogPostEdit.errors.status" class="error">
                    {{ blogPostEdit.errors.status }}
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="button-primary w-full">{{ __('general.nav.save') }}</button>
            </div>
        </div>
    </form>


</template>

<script setup>
import {useForm} from '@inertiajs/vue3';
import {ArrowLeftOnRectangleIcon} from '@heroicons/vue/24/solid';
import {routeBlog} from '~lib/routes';
import {modelBlogPost} from '~lib/models/modelBlogPost';
import MdEditor from 'md-editor-v3';
import 'md-editor-v3/lib/style.css';

const props = defineProps({
    blog: modelBlogPost,
});

const blogPostEdit = useForm({
    title_de: props.blog.title_de,
    content_de: props.blog.content_de,
    seo_keywords: props.blog.seo_keywords,
    status: props.blog.status,
});

const update = () => blogPostEdit.patch(route(routeBlog.creator.update, {blog: props.blog}));

</script>

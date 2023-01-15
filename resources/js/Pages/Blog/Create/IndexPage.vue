<template>
    <form @submit.prevent="create">
        <div class="container md:container md:mx-auto">


            <div class="col-span-2 mt-4">
                <h1>Create Blog Post</h1>
            </div>

            <div class="col-span-2 mt-4">
                <label for="titleDE">Title (de)</label>
                <input type="text" name="titleDE" value="" class="input">
                <div v-if="blogPost.errors.titleDE" class="error">
                    {{ blogPost.errors.titleDE }}
                </div>
            </div>
            <div class="col-span-2 mt-4">

            </div>
            <div class="mt-4">
                <button type="submit" class="btn-primary w-full">Save</button>
            </div>
        </div>
    </form>


</template>

<script setup>


import {useForm} from '@inertiajs/inertia-vue3';

const blogPost = useForm({
    titleDE: null,
    contentDE: null,
    seoKeywords: null,
    status: null,
});

const create = () => blogPost.post('blog.store');

</script>

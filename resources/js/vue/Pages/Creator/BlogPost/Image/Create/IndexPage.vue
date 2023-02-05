<template>
    <h1 class="headline-1">Image upload for blog post</h1>
    <h2 class="headline-2">{{ blog.title_de }}</h2>

    <form
        enctype="multipart/form-data"
        method="POST"
        :action="route(routeBlog.creator.image.store, { blog })"
    >

        <div class="mt-4">
            <input type="file" name="images[]" accept=".jpg, .png"/>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn-primary w-full">Upload Images</button>
        </div>

    </form>
</template>

<script setup>
import {routeBlog} from '~lib/routes';

const props = defineProps({
    blog: Object,
});
</script>

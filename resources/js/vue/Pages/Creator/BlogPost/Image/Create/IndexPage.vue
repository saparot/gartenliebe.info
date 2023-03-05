<template>

    <div class="flex justify-end mb-4">
        <a class="button-secondary flex"
           :href="route(routeBlog.creator.show, { blog})">

            <ArrowLeftOnRectangleIcon class="h-4"/>
            Back to Blog Post
        </a>
    </div>

    <h1 class="headline-1">Image upload for blog post</h1>
    <h2 class="headline-2">{{ blog.title_de }}</h2>

    <form @submit.prevent="upload">

        <div class="mt-4">
            <input type="file" multiple @input="addFiles" accept=".jpg, .png"/>
            <button type="submit"
                    class="button-primary mr-2"
                    :class="{'button-disabled': !canUpload}"
                    :disabled="canUpload === false">Upload Images
            </button>
            <button type="submit" class="button-secondary" @click="reset">Reset Images</button>
        </div>

    </form>
</template>

<script setup>
import {ArrowLeftOnRectangleIcon} from '@heroicons/vue/24/solid';
import {routeBlog} from '~lib/routes';
import {useForm} from '@inertiajs/inertia-vue3';
import {computed} from 'vue';

const props = defineProps({
    blog: Object,
});

const form = useForm({
    images: [],
});

const reset = () => {
    form.reset('images');
};

const canUpload = computed(() => form.images.length > 0);

const upload = () => {
    form.post(route(routeBlog.creator.image.store, {blog: props.blog}),
        {
            onSuccess: () => reset(),
        });
};
const addFiles = (event) => {
    for (const image of event.target.files) {
        form.images.push(image);
    }
};

</script>

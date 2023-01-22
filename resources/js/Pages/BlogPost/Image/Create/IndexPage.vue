<template>
    <div>Its image upload</div>

    <form
        method="post"
        :action="route(' blog.image.store', { blog: blog.id})"
    >

        <div class="mt-4">
            <input type="file" multiple name="files">
        </div>

        <div class="mt-4">
            <button type="submit" class="btn-primary w-full">Upload</button>
        </div>

    </form>
</template>

<script setup>

defineProps({
    blog: Object,
});
</script>

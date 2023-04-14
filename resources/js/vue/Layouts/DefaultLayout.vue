<template>

    <header class="bg-gray-200 dark:bg-transparent mb-4">
        <navigation-bar/>
        <div class="h-0.5 bg-lime-800"></div>
    </header>
    <main>
        <section v-if="flashMessageSuccess" class="bg-lime-300 text-black">
            {{ flashMessageSuccess }}
        </section>
        <section v-if="flashMessageWarning" class="bg-orange-300 text-black">
            {{ flashMessageWarning }}
        </section>

        <section v-if="flashMessageError" class="bg-red-900 text-white">
            {{ flashMessageError }}
        </section>

        <div class="container dark:bg-transparent dark:text-gray-300 mx-auto min-h-screen px-4 lg:px-0">
            <slot/>
        </div>
    </main>
    <Footer/>
</template>

<script setup>
import {computed} from 'vue';
import NavigationBar from '~olive/NavigationBar.vue';
import Footer from '/resources/js/vue/Layouts/Footer.vue';
import {usePage} from '@inertiajs/vue3';

const flashMessageSuccess = computed(() => usePage().props.flashMessage.success);
const flashMessageError = computed(() => usePage().props.flashMessage.error);
const flashMessageWarning = computed(() => usePage().props.flashMessage.warning);

</script>

<template>
    <header class="bg-gray-200 dark:bg-gray-900 mb-4">
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

        <div class="container dark:bg-gray-800 dark:text-gray-300 mx-auto min-h-screen px-4 lg:px-0">
            <slot/>
        </div>
    </main>
    <Footer/>
</template>

<script setup>
import {usePage} from '@inertiajs/inertia-vue3';
import {computed} from 'vue';
import NavigationBar from '~olive/NavigationBar.vue';
import Footer from '/resources/js/vue/Layouts/Footer.vue';

const page = usePage();
const flashMessageSuccess = computed(() => page.props.value.flashMessage.success);
const flashMessageError = computed(() => page.props.value.flashMessage.error);
const flashMessageWarning = computed(() => page.props.value.flashMessage.warning);

</script>

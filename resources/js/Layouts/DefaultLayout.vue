<template>
    <header class="bg-gray-200 dark:bg-gray-900 mb-4">
        <div class="p-1 ">
            <div class="h-9 flex w-full justify-center items-center flex-row">
                <div class="w-12">
                    <img class="max-w-full h-auto" src="/static/images/logo/logo.svg" alt="gartenliebe.info logo">
                </div>
                <div class="text-lime-700 font-bold">gartenliebe.info</div>
            </div>
            <div class="flex justify-around">
                <Link class="hover:color-primary" :href="route('landingpage.index')">Pflanzen Lexikon</Link>
                <Link class="hover:color-primary" :href="route('news.index')">News</Link>
                <Link class="hover:color-primary" :href="route('news.index')">Blog</Link>
                <Link class="hover:color-primary" :href="route('news.index')">Artikel</Link>
                <Link class="hover:color-primary" :href="route('news.index')">Rezepte</Link>
                <Link class="hover:color-primary" :href="route('login')">Login</Link>

            </div>
        </div>
        <div class="h-0.5 bg-lime-700"></div>
    </header>
    <main>
        <section v-if="flashMessageSuccess" class="bg-lime-300 text-black">
            {{flashMessageSuccess}}
        </section>
        <section v-if="flashMessageWarning" class="bg-orange-300 text-black">
            {{flashMessageWarning}}
        </section>

        <section v-if="flashMessageError" class="bg-red-900 text-white">
            {{flashMessageError}}
        </section>

        <slot/>
    </main>
</template>

<script setup>
import {Link, usePage} from '@inertiajs/inertia-vue3';
import {computed} from 'vue';

const page = usePage();
const flashMessageSuccess = computed(() => page.props.value.flashMessage.success);
const flashMessageError = computed(() => page.props.value.flashMessage.error);
const flashMessageWarning = computed(() => page.props.value.flashMessage.warning);

</script>

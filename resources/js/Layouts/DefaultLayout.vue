<template>
    <header class="bg-gray-200 dark:bg-gray-900 mb-4">

        <div class="flex w-full justify-between ">
            <div class="w-1/3">
                <!-- 1st box ------------->
            </div>
            <div class="w-1/3 flex justify-center items-center">
                <!-- 2nd box ------------->
                <div class="w-12">
                    <img class="max-w-full h-auto" :src="logoUrl" alt="gartenliebe.info logo">
                </div>
                <div class="text-lime-700 font-bold">
                    gartenliebe.info
                </div>
            </div>
            <div class="w-1/3 flex justify-end pr-1">
                <!-- 3rd box ------------->
                <div class="ml-1">
                    <!-- assigned by HandleInertiaRequests-->
                    <div v-if="user">
                        <div>{{ user.name }}</div>
                        <Link class="hover:color-primary" :href="route('logout')" method="DELETE" as="button">Logout</Link>
                    </div>
                    <div v-else>
                        <Link class="hover:color-primary" :href="route('login')">Login</Link>
                    </div>
                </div>
            </div>

        </div>

        <div class="flex justify-around">

            <Link class="hover:color-primary" :href="route('landingpage.index')">Pflanzen Lexikon</Link>
            <Link class="hover:color-primary" :href="route('news.index')">News</Link>
            <Link class="hover:color-primary" :href="route('news.index')">Blog</Link>
            <Link class="hover:color-primary" :href="route('news.index')">Artikel</Link>
            <Link class="hover:color-primary" :href="route('news.index')">Rezepte</Link>

        </div>
        <div class="h-0.5 bg-lime-700"></div>
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

        <slot/>
    </main>
</template>

<script setup>
import logoUrl from '/resources/images/logo/logo.svg';
import {Link, usePage} from '@inertiajs/inertia-vue3';
import {computed} from 'vue';

const page = usePage();
const flashMessageSuccess = computed(() => page.props.value.flashMessage.success);
const flashMessageError = computed(() => page.props.value.flashMessage.error);
const flashMessageWarning = computed(() => page.props.value.flashMessage.warning);

const user = computed(() => page.props.value.user);

</script>

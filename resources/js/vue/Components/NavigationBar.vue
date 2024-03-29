<template>
    <nav class="relative px-4 py-4 flex items-center w-full justify-between">
        <!--logo left        -->

        <div class="flex justify-items-center items-center">
            <a class="text-3xl font-bold leading-none h-10 w-10" href="#">
                <img :src="logoUrl" alt="logo" class="max-w-full">
            </a>
            <span class="green-tree">gartenliebe.info</span>
        </div>


        <!--menu items        -->
        <div class="hidden lg:flex justify-evenly lg:w-full lg:items-center lg:w-auto lg:space-x-6">

            <Link v-for="item in menuItems" class="hover:text-gray-500"
                  :class="item.isActive ? 'color-primary' : 'text-gray-400'"
                  :href="route(item.url)">{{ __(item.name) }}
            </Link>
        </div>

        <div class="hidden lg:flex items-center">
            <!--dark-mode selector        -->
            <dark-mode-selector additional-classes="hidden lg:block"/>

            <div v-if="isLoggedIn" class="mr-2">{{ user.name }}</div>
            <Link v-if="isLoggedIn" class="hover:color-primary justify-self-auto" :href="route(routeAccount.logout)" method="DELETE" as="button" type="button">
                <PowerIcon class="h-6" alt="logout"/>
            </Link>
            <Link v-if="isLoggedIn === false"
                  class="lg:mr-3 py-3 px-6 bg-gray-50 font-semibold leading-none bg-gray-50 dark:text-gray-900 hover:bg-gray-100 rounded-xl hover:color-primary rounded-md whitespace-nowrap"
                  :href="route(routeAccount.login)">Sign in
            </Link>
            <Link v-if="isLoggedIn === false"
                  class="lg:mr-3 py-3 px-6 text-white font-semibold leading-none bg-primary hover:bg-primary-light hover:color-primary rounded-md whitespace-nowrap"
                  :href="route(routeAccount.signUp)">Sign Up
            </Link>
        </div>
        <div class="hidden lg:flex items-center">
            <LanguageSelector/>
        </div>

        <!--hamburger menu        -->
        <div class="lg:hidden">
            <button class="navbar-burger flex items-center text-blue-600 p-3"
                    @click="toggleHamburgerMenu();"
            >
                <Bars3Icon class="h-6 w-6 text-lime-700 dark:text-white mr-2"/>
            </button>
        </div>
    </nav>
    <div class="navbar-menu relative z-50"
         :class="showHamburgerMenu ? 'lg:hidden' : 'hidden'"
    >
        <!--backdrop for sidebar navigation        -->
        <div class="fixed inset-0 bg-gray-200 dark:bg-gray-900 opacity-25"></div>
        <!--sidebar navigation        -->
        <nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-gray-200 dark:bg-gray-900 overflow-y-auto">
            <div class="flex items-center mb-8">
                <a class="mr-auto text-3xl font-bold leading-none" href="#">
                    <img :src="logoUrl" alt="logo {{ projectName }}" class="max-w-full h-10">
                </a>
                <button class="navbar-close"
                        @click="toggleHamburgerMenu();"
                >
                    <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div>
                <ul>
                    <li v-for="item in menuItems" class="mb-1">
                        <Link class="block p-4 text-sm font-semibold text-gray-400 hover:bg-primary-light hover:color-primary rounded" :href="route(item.url)">{{
                                __(item.name)
                            }}
                        </Link>
                    </li>
                </ul>
            </div>
            <div class="mt-auto">
                <div>
                    <LanguageSelector/>
                </div>
                <!--darkmode selector        -->
                <dark-mode-selector open-direction="right"/>
                <div class="pt-6">

                    <Link v-if="isLoggedIn === true"
                          class="button-secondary w-full"
                          :href="route(routeAccount.logout)"
                          method="DELETE"
                          as="button"
                    >Logout

                    </Link>

                    <Link v-if=" isLoggedIn=== false
                    "
                          class="button-secondary"
                          :href="route(routeAccount.login)">Sign in
                    </Link>

                    <Link v-if="isLoggedIn === false"
                          class="button-primary"
                          :href="route(routeAccount.signUp)">Sign Up
                    </Link>
                </div>
            </div>
        </nav>
    </div>

</template>

<script setup>
import DarkModeSelector from '~olive/DarkModeSelector.vue';
import {Bars3Icon} from '@heroicons/vue/24/solid';
import {PowerIcon} from '@heroicons/vue/24/solid';
import logoUrl from '/resources/images/logo/logo.svg';
import {computed, ref} from 'vue';
import {Link, usePage} from '@inertiajs/vue3';
import {routeAccount, routeBlog} from '~lib/routes';
import LanguageSelector from './LanguageSelector.vue';

const showHamburgerMenu = ref(false);
const toggleHamburgerMenu = () => showHamburgerMenu.value ? showHamburgerMenu.value = false : showHamburgerMenu.value = true;
const projectName = computed(() => usePage().props.projectName);
const user = computed(() => usePage().props.user);
const isCreator = computed(() => usePage().props.isCreator);
const isLoggedIn = computed(() => usePage().props.isLoggedIn);

const menuItemsPrepare = [
    {url: routeBlog.list, name: 'nav.menu.main.plantEncyclopedia', isActive: true},
    {url: routeBlog.list, name: 'nav.menu.main.news', isActive: false},
    {url: routeBlog.list, name: 'nav.menu.main.blog', isActive: false},
    {url: routeBlog.list, name: 'nav.menu.main.recipes', isActive: false},
];
if (isCreator) {
    menuItemsPrepare.push({url: routeBlog.creator.list, name: 'nav.menu.main.creator.blog', isActive: false});
}

const menuItems = ref(menuItemsPrepare);

</script>

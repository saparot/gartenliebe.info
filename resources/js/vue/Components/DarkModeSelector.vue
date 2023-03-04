<template>
    <div
        class="relative inline-block text-right"
        :class="props.additionalClasses"
    >
        <div>
            <button type="button"
                    class="inline-flex w-full justify-center px-4 py-2 text-sm font-medium text-gray-700"
                    id="menu-button" aria-expanded="true" aria-haspopup="true"
                    @click="toggleDropDown"
            >
                <MoonIcon v-if="darkModeHandler.modeCurrent.value === 'dark'" class="h-6 w-6 text-lime-700 dark:text-white"/>
                <SunIcon v-else-if="darkModeHandler.modeCurrent.value === 'light'" class="h-6 w-6 text-lime-700 dark:text-white"/>
                <TvIcon v-else-if="darkModeHandler.modeCurrent.value === 'system'" class="h-6 w-6 text-lime-700 dark:text-white"/>
            </button>
        </div>
        <div
            class="absolute left-0 z-10 mt-2 origin-top-right rounded-md bg-gray-200 dark:bg-gray-900 text-lime-700 dark:text-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
            :class="showDropDown ? ' visible transition ease-out duration-100 transform opacity-100 scale-100' : ' invisible transition ease-in duration-75 transform opacity-0 scale-95' "
            role="menu"
            aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
            <div class="py-1" role="none">
                <div @click="darkModeHandler.darkModeDark(); toggleDropDown();"
                     class="block px-4 py-2 text-sm flex justify-items-center items-center hover:bg-lime-700 hover:text-white cursor-pointer"
                     role="menuitem"
                     tabindex="-1"
                     id="menu-item-0"
                >
                    <MoonIcon class="h-6 w-6 mr-2"/>
                    <div>Dark</div>
                </div>

                <div @click="darkModeHandler.darkModeLight(); toggleDropDown();"
                     class="block px-4 py-2 text-sm flex justify-items-center items-center hover:bg-lime-700 hover:text-white cursor-pointer"
                     role="menuitem"
                     tabindex="-1"
                     id="menu-item-1"
                >
                    <SunIcon class="h-6 w-6 text-lime-700 dark:text-white mr-2"/>
                    <div>Light</div>

                </div>
                <div @click="darkModeHandler.darkModeAuto(); toggleDropDown();"
                     class="block px-4 py-2 text-sm flex justify-items-center items-center hover:bg-lime-700 hover:text-white cursor-pointer"
                     role="menuitem"
                     tabindex="-1"
                     id="menu-item-2"
                >
                    <TvIcon class="h-6 w-6 text-lime-700 dark:text-white mr-2"/>
                    <div>System</div>
                </div>
            </div>
        </div>
    </div>

</template>

<script setup>
import {ref} from 'vue';
import {MoonIcon, SunIcon, TvIcon} from '@heroicons/vue/24/solid';
import {darkMode} from '~lib/darkMode';

const props = defineProps(['additionalClasses', 'openDirection']);

const darkModeHandler = darkMode();
darkModeHandler.init();

const showDropDown = ref(false);
const toggleDropDown = () => showDropDown.value ? showDropDown.value = false : showDropDown.value = true;
</script>

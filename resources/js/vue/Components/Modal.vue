<template>
    <div v-if="showModal"
         class="js-lcc-modal-alert relative"
         aria-labelledby="modal-title"
         role="dialog"
         aria-modal="true"
    >

        <div v-if="hasInset" class="fixed inset-0 bg-gray-700 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 overflow-y-auto">
            <div class="flex justify-center p-4 text-center h-full sm:items-center p-0">
                <div class="flex flex-col self-center self- transform overflow-hidden rounded-lg shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg md:max-w-xl">
                    <div class="bg-white text-black dark:bg-slate-900 dark:text-gray-300 dark:gradient-corner px-4 pb-4 pt-5 sm:pr-6 pb-4">
                        <div class="flex items-start">
                            <div v-if="hideClose === false" class="flex justify-end sm:order-3 sm:ml-4 sm:mt-0">
                                <XMarkIcon class="h-4 cursor-pointer" @click="close"/>
                            </div>
                            <div class="hidden sm:flex flex-shrink-0 order-0 mx-0 h-10 w-10 mx-auto">
                                <slot name="icon"/>

                            </div>
                            <div class="mt-3 w-full sm:ml-4 sm:mt-0 sm:order-2">
                                <slot name="content"/>
                            </div>
                        </div>
                    </div>
                    <div v-if="showActions" class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <div>

                        </div>
                        <slot name="actions"></slot>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>
<script setup>
import {XMarkIcon} from '@heroicons/vue/24/solid';

const props = defineProps({
    showModal: Boolean,
    hideClose: {
        type: Boolean,
        default: false,
    },
    showActions: {
        type: Boolean,
        default: false,
    },
    close: Function,
    hasInset: {
        type: Boolean,
        default: true,
    },
});
</script>

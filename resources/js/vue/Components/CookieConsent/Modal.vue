<template>
    <Modal
        :showModal="showModal"
        :close="close"
        :showActions="true"
    >
        <template v-slot:content>
            <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">
                {{ __('cookieConsent.modalMain.title') }}

            </h3>
            <div class="mt-2">
                <p id="lcc-modal-alert-desc" class="lcc-text">
                    {{ __('cookieConsent.modalMain.info') }}
                </p>
            </div>
            <div>
                <button
                    type="button"
                    class="lcc-button lcc-button--link js-lcc-settings-toggle"
                    @click="settingsSwitch()"
                >
                    {{ __('cookieConsent.settings.adjust') }}
                </button>
            </div>
        </template>
        <template v-slot:icon>
            <div class="flex bg-gray-600 rounded-full">
                <img :src="cookie" alt="cookie" class="max-w-full p-1">
            </div>
        </template>
        <template v-slot:actions>
            <button type="button"
                    class="js-lcc-settings-save inline-flex w-full justify-center rounded-md bg-lime-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto"
                    @click="acceptAll()"
            >
                {{ __('cookieConsent.button.accept.all') }}
            </button>
            <button type="button"
                    class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto"
                    @click="acceptRequiredOnly()">
                {{ __('cookieConsent.button.accept.requiredOnly') }}
            </button>
        </template>
    </Modal>
</template>
<script setup>
import cookie from '/resources/images/misc/cookie.svg';
import Modal from '~olive/Modal.vue';

const props = defineProps({
    showModal: Boolean,
    isForced: Boolean,
    close: Function,
    settingsSwitch: Function,
    acceptAll: Function,
    acceptRequiredOnly: Function,
});
</script>

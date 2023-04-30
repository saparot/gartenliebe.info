<template>
    <Modal
        :showModal="showSettings"
        :close="close"
        :showActions="true"
    >
        <template v-slot:content>

            <h2 id="lcc-modal-settings-label" class="headline-2">{{ __('cookieConsent.settings.adjust') }}</h2>
            <p id="lcc-modal-settings-desc" class="lcc-text" v-html="__('cookieConsent.settings.info', { cookiePolicy : route('static.privacy')})"></p>

            <div class="lcc-modal__section lcc-u-text-center">
                <button type="button"
                        class="js-lcc-settings-save inline-flex w-full justify-center rounded-md bg-lime-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto"
                        @click="acceptAll()"
                >
                    {{ __('cookieConsent.button.accept.all') }}
                </button>
            </div>

            <div v-for="category in categories" :key="category.ident" class="flex items-start mb-4">
                <input
                    id="cookie-setting-{{category.ident}}"
                    type="checkbox"
                    value=""
                    class="cursor-pointer mt-1 w-5 h-5  bg-white border-lime-800 rounded focus:ring-lime-800 dark:focus:ring-lime-800 dark:ring-offset-lime-400 focus:ring-2"
                    :class="category.disabled ? 'color-secondary' : 'color-primary'"
                    :disabled="category.disabled"
                    :checked="category.checked"
                >
                <label for="cookie-setting-{{category.ident}}" class="cursor-pointer ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    <span class="headline-4">{{ __(category.i18nTitle) }}</span><br>
                    <span>{{ __(category.i18nText) }}</span>
                </label>
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
                    @click="acceptSelected()"
            >
                {{ __('cookieConsent.button.accept.selected') }}
            </button>
        </template>
    </Modal>
</template>
<script setup>
import Modal from '~olive/Modal.vue';

const props = defineProps({
    cookieSettings: {
        type: Object,
        default: {
            analytics: true,
            functional: true,
            marketing: true,
        },
    },
    showSettings: Boolean,
    close: Function,
    acceptAll: Function,
    acceptRequiredOnly: Function,
    acceptSelected: Function,
});

const categories = [
    {
        ident: 'essentials',
        checked: true,
        disabled: true,
        i18nTitle: 'cookieConsent.category.essentials.title',
        i18nText: 'cookieConsent.category.essentials.text',
    },
    {
        ident: 'functional',
        checked: props.cookieSettings.functional,
        disabled: false,
        i18nTitle: 'cookieConsent.category.functional.title',
        i18nText: 'cookieConsent.category.functional.text',
    },
    {
        ident: 'analytics',
        checked: props.cookieSettings.analytics,
        disabled: false,
        i18nTitle: 'cookieConsent.category.analytics.title',
        i18nText: 'cookieConsent.category.analytics.text',
    },
    {
        ident: 'marketing',
        checked: props.cookieSettings.marketing,
        disabled: false,
        i18nTitle: 'cookieConsent.category.marketing.title',
        i18nText: 'cookieConsent.category.marketing.text',
    },

];
</script>

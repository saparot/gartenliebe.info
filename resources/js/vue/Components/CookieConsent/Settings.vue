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
                    v-bind:id="'cookie-setting-' + category.ident"
                    :data-ident="category.ident"
                    type="checkbox"
                    value=""
                    class="cursor-pointer mt-1 w-5 h-5  bg-white border-lime-800 rounded focus:ring-lime-800 dark:focus:ring-lime-800 dark:ring-offset-lime-400 focus:ring-2"
                    :class="category.disabled ? 'color-secondary' : 'color-primary'"
                    :disabled="category.disabled"
                    :checked="category.checked"
                    @change="(event) => updateConsent(event)"
                >
                <label v-bind:for="'cookie-setting-' + category.ident" class="cursor-pointer ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
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
                    @click="saveSelected()"
            >
                {{ __('cookieConsent.button.accept.selected') }}
            </button>
        </template>
    </Modal>
</template>
<script setup>
import Modal from '~olive/Modal.vue';
import {reactive, watch} from 'vue';

const props = defineProps({
    cookieSettings: {
        type: Object,
        default: {
            essentials: true,
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

const cookieSettings = reactive(props.cookieSettings);
const categories = [];
const decisions = {};

for (let category in cookieSettings) {
    categories.push({
        ident: category,
        checked: cookieSettings[category],
        disabled: category === 'essentials',
        i18nTitle: `cookieConsent.category.${category}.title`,
        i18nText: `cookieConsent.category.${category}.text`,
    });
    decisions[category] = cookieSettings[category];
}

watch(cookieSettings, () => {
    for (let category in cookieSettings) {
        decisions[category] = cookieSettings[category];

    }
    categories.map((category) => category.checked = cookieSettings[category.ident]);
});

const updateConsent = (event) => decisions[event.target.dataset.ident] = event.target.checked;
const saveSelected = () => props.acceptSelected(decisions.analytics, decisions.functional, decisions.marketing);
</script>

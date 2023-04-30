<template>
    <CookieConsentModal
        :isforced="state.isForced"
        :showModal="state.isViewModal"
        :close="hideModal"
        :settingsSwitch="showSettings"
        :acceptAll="acceptAll"
        :acceptRequiredOnly="acceptRequiredOnly"
        :hideClose="true"
    />
    <CookieConsentSettings
        :cookieSettings="cookieSettings"
        :showSettings="state.isViewSettings"
        :close="hideSettings"
        :acceptAll="acceptAll"
        :acceptSelected="acceptSelected"
    />
</template>
<script setup>
import CookieConsentModal from '~olive/CookieConsent/Modal.vue';
import CookieConsentSettings from '~olive/CookieConsent/Settings.vue';
import {ccModalState} from '~olive/CookieConsent/Status';
import {toRefs, watch} from 'vue';

const props = defineProps({
    showConsentSettings: Boolean,
    closeSettings: Function,
});
const {showConsentSettings} = toRefs(props);

const {
    state, cookieSettings, showSettings, hideSettings, hideModal, acceptAll, acceptRequiredOnly, acceptSelected,
} = ccModalState.setup(showConsentSettings);

watch(showConsentSettings, () => {
    state.isViewSettings = true;
    props.closeSettings();
});
</script>

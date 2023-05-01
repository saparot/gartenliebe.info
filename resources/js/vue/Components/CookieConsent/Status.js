import {reactive} from 'vue';
import {usePage} from '@inertiajs/vue3';

const cookieValidMicroSeconds = 86400000; //24*60*60*1000 ^= 1 day
const cookieExpireDays = 365;
const consentDecided = 'decided';
const consentUndecided = 'undecided';

function setCookie (data) {
    const d = new Date();
    d.setTime(d.getTime() + (cookieExpireDays * cookieValidMicroSeconds));
    const expires = 'expires=' + d.toUTCString();
    document.cookie = usePage().props.cookieName + '=' + JSON.stringify(data) + ';' + expires + ';path=/';
}

function getCookie (cookieName) {
    const name = cookieName + '=';
    let cookie = decodeURIComponent(document.cookie).split(';');
    for (let i = 0; i < cookie.length; i++) {
        let c = cookie[i];
        while (c.charAt(0) === ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) === 0) {
            return JSON.parse(c.substring(name.length, c.length));
        }
    }
    return {};
}

const cookieCategories = {
    analytics: false,
    functional: false,
    marketing: false,
};

const cookieDefaults = {
    consent: consentUndecided,
    decided: null,
    categories: cookieCategories,
};

function cookieDefaultsDecided () {
    return {
        consent: consentDecided,
        decided: Date.now(),
    };
}

function setCookieCategories (analytics, functional, marketing) {
    return {...cookieCategories, marketing: marketing, analytics: analytics, functional: functional};
}

const isValidConsent = value => /^undecided|decided$/i.test(value);

export const ccModalState = {
    setup (showConsent) {

        const state = reactive({
            isViewModal: (showConsent === true || usePage().props.forceCookieConsent === true),
            isForced: usePage().props.forceCookieConsent,
            isViewSettings: false,
        });

        const cookieCategoryDecisions = reactive(getCategoryDecisions());

        function showSettings () {
            state.isViewSettings = true;
        }

        function hideSettings () {
            state.isViewSettings = false;
        }

        function hideModal () {
            if (state.isForced) return;
            state.isViewModal = false;
        }

        function acceptAll () {
            acceptSelected(true, true, true);
        }

        function acceptRequiredOnly () {
            acceptSelected(false, false, false);
        }

        function acceptSelected (analytics, functional, marketing) {
            setCookie({...cookieDefaults, ...cookieDefaultsDecided(), categories: setCookieCategories(analytics, functional, marketing)});
            state.isForced = false;
            state.isViewModal = false;
            state.isViewSettings = false;
            cookieCategoryDecisions.marketing = marketing;
            cookieCategoryDecisions.analytics = analytics;
            cookieCategoryDecisions.functional = functional;
        }

        function getCategoryDecisions () {
            const current = getCookie(usePage().props.cookieName);
            const categories = current.categories || {};
            return {
                essentials: true,
                functional: categories.functional === true,
                marketing: categories.marketing === true,
                analytics: categories.analytics === true,

            };
        }

        return {
            state, cookieCategoryDecisions, showSettings, hideSettings, hideModal, acceptAll, acceptRequiredOnly, acceptSelected,
        };
    },
};

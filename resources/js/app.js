import {createApp, h} from 'vue';
import DefaultLayout from './vue/Layouts/DefaultLayout.vue';
import {ZiggyVue} from 'ziggy';
import {library} from '@fortawesome/fontawesome-svg-core';
import {FontAwesomeIcon, FontAwesomeLayers, FontAwesomeLayersText} from '@fortawesome/vue-fontawesome';
import {faTwitter, faGithub} from '@fortawesome/free-brands-svg-icons';
import {faCircle, faEnvelope} from '@fortawesome/free-solid-svg-icons';
import '../css/app.css';
import {vueMixins} from './vue/bootstrap/vueMixins';
import {createInertiaApp} from '@inertiajs/vue3';

import.meta.glob([
    '../images/**',
    '../fonts/**',
]);

library.add(faTwitter, faGithub, faCircle, faEnvelope);

createInertiaApp({
    progress: {
        delay: 0,
        color: '#9333ea',
        includeCSS: true,
        showSpinner: false,
    },
    resolve: async (name) => {
        const pages = import.meta.glob('./vue/Pages/**/**/*Page.vue');
        const page = await pages[`./vue/Pages/${name}/IndexPage.vue`]();
        page.default.layout = page.default.layout || DefaultLayout;

        return page;
    },
    setup ({el, App, props, plugin}) {
        createApp({render: () => h(App, props)})
        .use(plugin)
        .use(ZiggyVue)
        .mixin({
            methods: {
                __: vueMixins.i18n,
            },
        })
        .component('font-awesome-icon', FontAwesomeIcon)
        .component('font-awesome-layers', FontAwesomeLayers)
        .component('font-awesome-layer-text', FontAwesomeLayersText)
        .mount(el);
    },
});

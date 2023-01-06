import {createApp, h} from 'vue';
import {createInertiaApp} from '@inertiajs/inertia-vue3';
import DefaultLayout from './Layouts/DefaultLayout.vue';
import {ZiggyVue} from 'ziggy';
import '../css/app.css';
import.meta.glob([
    '../images/**',
    '../fonts/**',
]);

createInertiaApp({
    resolve: async (name) => {
        const pages = import.meta.glob('./Pages/**/**/*Page.vue');
        const page = await pages[`./Pages/${name}/IndexPage.vue`]();
        page.default.layout = page.default.layout || DefaultLayout;

        return page;
    },
    setup ({el, App, props, plugin}) {
        createApp({render: () => h(App, props)})
        .use(plugin)
        .use(ZiggyVue)
        .mount(el);
    },
});

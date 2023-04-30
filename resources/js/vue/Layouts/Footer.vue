<template>
    <footer class="bg-gray-900">
        <div class="h-0.5 bg-lime-800 mb-2"></div>
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap">
                <div class="w-full md:w-6/12 px-4">
                    <h4 class="text-lg">{{ __('nav.footer.teaser.keepInTouch') }}</h4>
                    <h5 class="leading-normal mt-1 mb-2 text-blueGray-500">{{ __('nav.footer.teaser.findMeOnPlatforms') }}</h5>
                    <div class="mt-4">

                        <a href="mailto:coding.saparot@gmail.com" target="_blank" rel=“noopener“ class="">
                            <font-awesome-layers class="fa-2x bg-white shadow-lg rounded-full m-2">
                                <font-awesome-icon icon="fa-solid fa-envelope" size="xs" :style="{ color: '#111827' }"/>
                            </font-awesome-layers>
                        </a>

                        <a href="https://github.com/saparot" target="_blank" rel=“noopener“>
                            <font-awesome-layers class="fa-2x bg-white shadow-lg rounded-full m-2">
                                <font-awesome-icon icon="fab fa-github" size="xs" :style="{ color: '#111827' }"/>
                            </font-awesome-layers>
                        </a>


                        <a href="https://twitter.com/CSaparot" target="_blank" rel=“noopener“>
                            <font-awesome-layers class="fa-2x bg-white shadow-lg rounded-full m-2 items-center">
                                <font-awesome-icon icon="fab fa-twitter" size="xs" :style="{ color: '#111827' }"/>
                            </font-awesome-layers>
                        </a>
                    </div>
                </div>
                <div class="w-full md:w-6/12 px-4">
                    <div class="flex flex-wrap items-top mb-6">
                        <div class="w-full md:w-6/12 xl:w-4/12 pt-6 md:pt-0 md:px-4 ml-auto">
                            <div class="uppercase text-xs mb-2">{{ __('nav.footer.links.title') }}</div>
                            <ul class="list-unstyled">
                                <li>
                                    <Link class="hover:text-primary block pb-2 text-sm" :href="route('static.imprint')">{{ __('nav.footer.imprint') }}</Link>
                                </li>
                                <li>
                                    <Link class="hover:text-primary block pb-2 text-sm" :href="route('static.privacy')">{{ __('nav.footer.privacy') }}</Link>
                                </li>
                                <li>
                                    <div class="hover:text-primary block pb-2 text-sm" @click="openConsent">{{ __('nav.footer.consent') }}</div>
                                </li>
                                <li>
                                    <Link class="hover:text-primary block pb-2 text-sm" :href="route('static.contact')">{{ __('nav.footer.contact') }}</Link>
                                </li>
                            </ul>
                        </div>
                        <div class="w-full md:w-6/12 xl:w-4/12 pt-6 md:pt-0 md:px-4 ml-auto">
                            <span class="uppercase text-xs mb-2">{{ __('nav.resources.title') }}</span>
                            <ul class="list-unstyled">
                                <li id="todo">
                                    <Link class="hover:text-primary block pb-2 text-sm" href="#todo">{{ __('nav.resources.apiDocumentation') }}</Link>
                                </li>
                                <li><a class="hover:text-primary block pb-2 text-sm" href="https://saparot.io" target="_blank">saparot.io</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            <div class="mx-auto text-center text-sm py-1">© 2020 - {{ year }}
                <a href="https://saparot.io" class="hover:text-blueGray-600 font-semibold" target="_blank">saparot.io</a>. {{ __('nav.footer.rights.reserved') }}
            </div>
        </div>
        <cookie-consent-modal
            :showConsentSettings="isConsentModalActive"
            :closeSettings="closeSettings"
        />
    </footer>
</template>
<script setup>
import {Link} from '@inertiajs/vue3';
import CookieConsentModal from '~olive/CookieConsentModal.vue';
import {ref} from 'vue';

const isConsentModalActive = ref(false);

const openConsent = () => {
    console.log('calling me');
    isConsentModalActive.value = true;
    console.log('calling done');
};

const closeSettings = () => {
    isConsentModalActive.value = false;
};

const year = new Date().getFullYear();
</script>

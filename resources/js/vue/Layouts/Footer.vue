<template>
    <footer class="bg-gray-900">
        <div class="h-0.5 bg-lime-800 mb-2"></div>
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap">
                <div class="w-full md:w-6/12 px-4">
                    <h4 class="text-lg">Let's keep in touch!</h4>
                    <h5 class="leading-normal mt-1 mb-2 text-blueGray-500">Find me on any of these platforms, I try to response quick.</h5>
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
                            <div class="uppercase text-xs mb-2">links</div>
                            <ul class="list-unstyled">
                                <li><a class="hover:text-lime-800 block pb-2 text-sm" :href="route('static.imprint')">Impressum</a></li>
                                <li><a class="hover:text-lime-800 block pb-2 text-sm" :href="route('static.privacy')">Datenschutzhinweise</a></li>
                                <li><a class="hover:text-lime-800 block pb-2 text-sm" :href="route('static.contact')">Kontakt</a></li>
                            </ul>
                        </div>
                        <div class="w-full md:w-6/12 xl:w-4/12 pt-6 md:pt-0 md:px-4 ml-auto">
                            <span class="uppercase text-xs mb-2">resources</span>
                            <ul class="list-unstyled">
                                <li><a class="hover:text-lime-800 block pb-2 text-sm" href="#todo">API Documentation</a></li>
                                <li><a class="hover:text-lime-800 block pb-2 text-sm" href="https://saparot.io" target="_blank">saparot.io</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            <div class="mx-auto text-center text-sm py-1">© 2020 - {{ year }}
                <a href="https://saparot.io" class="hover:text-blueGray-600 font-semibold" target="_blank">saparot.io</a>. All rights reserved.
            </div>


        </div>
    </footer>
</template>
<script setup>
const year = new Date().getFullYear();
</script>

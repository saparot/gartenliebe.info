<template>
    <form @submit.prevent="register">
        <div class="w-1/2 mx-auto max-w-sm">
            <div class="mt-4">
                <label for="name" class="label">Your Name</label>
                <input id="name" v-model="form.name" type="text" class="input"/>
                <div v-if="form.errors.name" class="input-error">{{ form.errors.name }}</div>
            </div>
            <div class="mt-4">
                <label for="email" class="label">E-mail (username)</label>
                <input id="email" v-model="form.email" type="text" class="input"/>
                <div v-if="form.errors.email" class="input-error">{{ form.errors.email }}</div>
            </div>
            <div class="mt-4">
                <label for="password" class="label">Password</label>
                <input id="password" v-model="form.password" type="password" class="input"/>
                <div v-if="form.errors.password" class="input-error">{{ form.errors.password }}</div>
            </div>
            <div class="mt-4">
                <label for="password_confirmation" class="label">Password Repeat</label>
                <input id="password_confirmation" v-model="form.password_confirmation" type="password" class="input"/>
                <div v-if="form.errors.password_confirmation" class="input-error">{{ form.errors.password_confirmation }}</div>
            </div>
            <div class="mt-4">
                <button class="btn-primary w-full" type="submit">Register</button>
            </div>
            <div class="mt-4">
                <div>
                    <Link class="hover:color-secondary text-sm" :href="route('login')">Already have an account? Click here</Link>
                </div>
            </div>
        </div>
    </form>
</template>

<script setup>
import {useForm, Link} from '@inertiajs/inertia-vue3';

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,

});
const register = () => form.post(route('user-account.store'));
</script>

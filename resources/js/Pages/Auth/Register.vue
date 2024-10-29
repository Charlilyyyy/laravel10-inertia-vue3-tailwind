<script setup>
import { reactive } from 'vue';
// import { router } from '@inertiajs/vue3'
import { useForm } from '@inertiajs/vue3'
import TextInput from '../../Components/TextInput.vue';

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
})

const submit = () => {
    form.post(route('register'), {
        preserveScroll: true,
        // onSuccess:
        onError: () => {
            form.reset('password','password_confirmation')
        }
    })
}
</script>

<template>
    <Head title=" | Register"/>
    <h1 class="title hover:uppercase text-center font-extrabold">Register</h1>
    <div class="w-2/4 mx-auto">

    <form class="px-4 card" @submit.prevent="submit">
        <TextInput
            name="Name"
            v-model="form.name"
            :message="form.errors.name"
        />
        <TextInput
            name="Email"
            type="email"
            v-model="form.email"
            :message="form.errors.email"
        />
        <TextInput
            name="Password"
            type="password"
            v-model="form.password"
            :message="form.errors.password"
        />
        <TextInput
            name="Confirm Password"
            type="password"
            v-model="form.password_confirmation"
        />
        <div>
            <p class="text-slate-600 mb-2">Already a user?
                <!-- <a href="/about" class="text-link">Login here</a> -->
                <Link class="nav-link" :href="route('login')"><span class="text-cyan-600 font-medium">Login</span> here</Link>
            </p>
            <button class="primary-btn bg-blue-500 w-full py-2 rounded-sm text-white" :disabled="form.processing">Register</button>
        </div>
    </form>

    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import TextInput from '../../Components/TextInput.vue';

const form = useForm({
    email: null,
    password: null,
    remember: null,
})

const submit = () => {
    form.post(route('login'), {
        preserveScroll: true,
        onError: () => {
            form.reset('password')
        }
    })
}
</script>

<template>
    <Head title=" | Register"/>
    <h1 class="title hover:uppercase text-center font-extrabold">Login to your account</h1>
    <div class="w-2/4 mx-auto">

    <form class="px-4 card" @submit.prevent="submit">
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

       <div class="flex items-center justify-between mb-2">
            <div>
                <input class="me-2" type="checkbox" v-model="form.remember" id="remember">
                <label for="remember">Remember Me</label>
            </div>

            <p class="text-slate-600">Need an account ?
                <!-- <a href="/about" class="text-link">Login here</a> -->
                <Link class="nav-link" :href="route('register')"><span class="text-cyan-600 font-medium">Register</span> here</Link>
            </p>
       </div>

        <div>

            <button class="primary-btn bg-blue-500 w-full py-2 rounded-sm text-white" :disabled="form.processing">Login</button>
        </div>
    </form>

    </div>
</template>

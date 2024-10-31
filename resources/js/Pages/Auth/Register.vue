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
    avatar: null,
    preview: null,
})

const change = (e) => {
    form.avatar = e.target.files[0]
    form.preview = URL.createObjectURL(e.target.files[0])
}

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
        <!-- Upload Avatar -->
        <div class="grid place-items-center">
            <div class="relative w-28 h-28 rounded-full overflow-hidden border border-slate-300">
                <label for="avatar" class="absolute inset-0 grid content-end cursor-pointer">
                    <span class="bg-white/70 pb-2 text-center">Avatar</span>
                </label>
                <input accept=".png, .jpeg, .jpg" type="file" @input="change" id="avatar" hidden />
                <img
                    class="object-cover w-28 h-28"
                    :src="form.preview ?? 'storage/avatar/default-avatar.jpg'"
                />
            </div>
            <p class="error mt-2">{{ form.errors.avatar }}</p>
        </div>
        <!-- End Upload Avatar -->

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

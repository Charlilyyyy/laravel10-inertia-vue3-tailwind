<script setup>
import { Link,Head } from '@inertiajs/vue3'

</script>
<template>
    <Head>
        <!-- <title>Inertia App</title> -->
        <meta name="description" content="this is meta description">
    </Head>
    <div>
        <header class="bg-slate-900 text-white">
            <nav class="flex items-center justify-between p-4 max-w-screen-lg">
                <!-- {{ $page.props.user }} -->
                <div v-if="$page.props.auth.user" class="">
                    <Link
                        class="nav-link px-4 py-2 hover:bg-sky-900 rounded-sm"
                        :class="{'bg-slate-700' : $page.component === 'Dashboard'}"
                        :href="route('dashboard')">
                    Dashboard</Link>
                </div>
                <div v-else>
                    <Link
                        class="nav-link px-4 py-2 hover:bg-sky-900 rounded-sm"
                        :class="{'bg-slate-700' : $page.component === 'Home'}"
                        :href="route('home')">
                    Home</Link>
                </div>
                <div v-if="$page.props.auth.user" class="space-x-6 flex">
                    <img class="avatar" :src="$page.props.auth.user.avatar ? ('storage/'+$page.props.auth.user.avatar) : ('storage/avatar/default-avatar.jpg')"/>
                    <Link
                        class="nav-link px-4 py-2 hover:bg-sky-900 rounded-sm"
                        :href="route('logout')"
                        method="post"
                        as="button">
                    Logout</Link>
                </div>
                <div v-else class="space-x-6">
                    <Link
                        class="nav-link px-4 py-2 hover:bg-sky-900 rounded-sm"
                        :class="{'bg-slate-700' : $page.component === 'Auth/Register'}"
                        :href="route('register')">
                    Register</Link>
                    <Link
                        class="nav-link px-4 py-2 hover:bg-sky-900 rounded-sm"
                        :class="{'bg-slate-700' : $page.component === 'Auth/Login'}"
                        :href="route('login')">
                    Login</Link>
                </div>
            </nav>
        </header>

        <main class="p-4">
            <slot/>
        </main>
    </div>
</template>

<style>
.avatar {
    width: 50px;              /* Width of the avatar */
    height: 50px;             /* Height of the avatar */
    border-radius: 50%;       /* Makes it round */
    overflow: hidden;         /* Hides overflow if image is too large */
    display: inline-block;    /* Allows the avatar to be inline */
    object-fit: cover;        /* Ensures image fills container without distortion */
}

</style>

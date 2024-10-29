<script setup>
import { Link } from '@inertiajs/vue3'

</script>

<template>
    <div>
        <header class="bg-green-900 text-white">
            <nav class="flex items-center justify-between p-4 max-w-screen-lg">
                <div class="space-x-6">
                    <!-- <a href="/">Home</a>
                    <a href="/about">About</a> -->

                    <Link href="/">Home</Link>
                    <Link href="/about">About</Link>
                </div>
            </nav>
        </header>

        <main class="p-4">
            <slot/>
        </main>
    </div>
</template>

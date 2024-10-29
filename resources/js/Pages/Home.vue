<script setup>
// import { Link,Head } from '@inertiajs/vue3'
// import TestLayout from '../Layouts/Test.vue';

// this define options only for layouts in current page, need to define in every
// defineOptions({ layout: TestLayout })
</script>

<template>
    <Head title=" | Home"/>
    <Link class="mt-[1400px] block" :href="route('home')" preserve-scroll>About</Link>
</template>

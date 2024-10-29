<script setup>
// import { Link,Head } from '@inertiajs/vue3'
// import TestLayout from '../Layouts/Test.vue';

// this define options only for layouts in current page, need to define in every
// defineOptions({ layout: TestLayout })
</script>

<template>
    <!-- <Head> -->
        <Head :title="` | ${$page.component}`"/>
        <!-- <meta head-key="description" name="description" content="this is meta description">
    </Head> -->
    about
    {{ $page.props.user }}
</template>

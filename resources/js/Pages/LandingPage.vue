<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    }
});
</script>

<template>
    <Head title="Welcome" />

    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900">
        <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">

            <div>
                <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                >Dashboard</Link>

                <template v-else>
                    <Link
                        :href="route('login')"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                        >Log in</Link
                    >

                    <Link
                        v-if="canRegister"
                        :href="route('register')"
                        class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                        >Register</Link
                    >
                </template>
            </div>
        </div>
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900">
            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <img src="../Components/images/guide.png" alt="" class="w-[350px] mx-auto">

                <div class="text-center mt-8">
                    <h1 class="text-4xl font-semibold text-gray-600">Welcome to Our Guidance System!</h1>
                    <p class="text-lg font-normal">Discover personalized guidance for your journey.</p>
                </div>

                <div class="flex justify-center mt-5">
                    <a :href="route('register')" class="px-4 py-2 bg-blue-600 hover:bg-blue-500 text-white rounded-lg">
                        Get Started
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

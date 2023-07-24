<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import CustomerCard from '@/Components/CustomerCard.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, router, Link } from '@inertiajs/vue3';

const props = defineProps({
    accounts: Array
})

function search(ev) {
    router.visit('/accounts/search/' + ev.target.value)
}
</script>

<template>
    <Head title="Accounts" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Advisers Accounts</h2>
                <!-- <Link :href="route('accounts.create')" class="px-4 py-1.5 rounded-md bg-black text-white">Create Account</Link> -->
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-end mb-3">
                    <!-- <input type="text" id="search" class="px-2 py-1 rounded-md"> -->
                    <TextInput class="w-1/4" placeholder="Search keyword" @keydown.enter="search($event)" />
                </div>
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                        <hr class="mt-3 mb-3">
                    <!-- </section> -->

                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-wrap">
                            <CustomerCard v-for="account in accounts" :key="account.id" :account="account" />
                        </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

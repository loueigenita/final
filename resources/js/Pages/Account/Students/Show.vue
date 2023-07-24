<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

const props = defineProps({
    account: Object,
    students: Array,
});

</script>

<template>
    <Head title="My Students" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">My Students</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="flex items-start space-x-4">
                        <div class="border border-1 border-green-500 p-4 w-2/5">
                            <p class="text-base font-normal text-gray-900">
                                Account no.: <strong>0000{{ props.account.id }}</strong> <br>
                                Account name: <strong>{{ props.account.lname }}, {{ props.account.fname }}</strong> <br>
                                Address: <strong>{{ props.account.address }}</strong> <br>
                                Type: <strong>{{ props.account.type }}</strong> <br>
                            </p>
                        </div>

                        <table class="w-full border border-1">
                            <thead class="bg-green-500">
                                <th class="px-8 py-1.5">Student First Name</th>
                                <th class="px-8 py-1.5">Student Last Name</th>
                                <th class="px-8 py-1.5">Age</th>
                                <th class="px-8 py-1.5">Address</th>
                                <th class="px-8 py-1.5">Department</th>
                                <th class="px-8 py-1.5">Course</th>
                                <th class="px-8 py-1.5">Adviser</th>
                                <th class="px-8 py-1.5">Action</th>
                            </thead>

                            <tbody>
                                <tr v-for="student in props.students" :key="student.id">
                                    <td class="border-b text-center border-1 py-1.5">{{ student.fname }}</td>
                                    <td class="border-b text-center border-1 py-1.5">{{ student.lname }}</td>
                                    <td class="border-b text-center border-1 py-1.5">{{ student.age }}</td>
                                    <td class="border-b text-center border-1 py-1.5">{{ student.department }}</td>
                                    <td class="border-b text-center border-1 py-1.5">{{ student.course }}</td>
                                    <td class="border-b text-center border-1 py-1.5">{{ student.adviser }}</td>
                                    <td class="border-b text-center border-1 py-1.5">
                                        <a class="text-sm underline hover:text-blue-500" :href="'/students/' + student.id + '/generate'" target="_blank"> View </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<template>
    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Students</h2>
                <!-- <Link :href="route('accounts.create')" class="px-4 py-1.5 rounded-md bg-black text-dark">Create Account</Link> -->
            </div>
        </template>
        <div>
            <div class="mt-5 max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-4 sm:p-8 bg-dark shadow sm:rounded-lg">
                    <!-- Display account details -->
                    <p>Account no.: <strong>0{{ account.id }}</strong></p>
                    <p>Account name: <strong>{{ account.lname }}, {{ account.fname }}</strong></p>
                    <p>Address: <strong>{{ account.address }}</strong></p>
                    <p>Email: <strong>{{ account.email }}</strong></p>
                    <p>Phone: <strong>{{ account.phone_no }}</strong></p>
                    <p>Advisory Department: <strong>{{ account.department }}</strong></p>
                    <div class="container mx-auto my-4">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <div class="relative mt-5 mb-2 mx-5 flex justify-between items-center">
                                <table class="w-full text-sm text-center text-dark dark:text-gray-400 mt-5">
                                    <thead
                                        class="text-sm text-dark uppercase bg-blue-800 border-b dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 text-center">
                                        <tr>
                                            <th scope="col" class="p-4">
                                                <div class="flex items-center">
                                                    <input id="checkbox-all-search" type="checkbox"
                                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                                </div>
                                            </th>
                                            <th>STUDENT FIRST NAME</th>
                                            <th>STUDENT LAST NAME</th>
                                            <th>STUDENT DEPARTMENT</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr v-for="student in students" :key="student.id">
                                            <td class="w-4 p-4">
                                                <div class="flex items-center">
                                                    <input id="checkbox-table-search-1" type="checkbox"
                                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                </div>
                                            </td>
                                            <td>{{ student.fname }}</td>
                                            <td> {{ student.lname }}</td>
                                            <td> {{ student.department }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
  
<script setup>
import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
const { account, students } = usePage().props;
</script>
  
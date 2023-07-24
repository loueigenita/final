<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, router, useForm } from '@inertiajs/vue3';

const props = defineProps({
    accounts: Array
})


const form = useForm({
    subject: '',
    message: '',
})

function submit() {
    form.post('/announcements/send-mail')

    form.subject = ''
    form.message = ''
}
</script>

<template>
    <Head title="Accounts" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Send announcement to students</h2>
            </div>
        </template>

        <div class="py-12">
            
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                
                <!-- <div class="flex justify-end mb-3">
                    
                </div> -->
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    
                    <div class="w-2/5 mx-auto">
                        <form @submit.prevent="submit">
                            <!-- <TextInput v-model="form.subject" class="w-full mb-4" placeholder="Subject" /> -->
                            <input v-model="form.subject" class="w-full mb-4 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="text" placeholder="Subject" id="">
                            <textarea v-model="form.message" class="w-full mb-4 min-h-[150px] border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="" id="" placeholder="Message"></textarea>
                            <div class="flex justify-end">
                                <PrimaryButton type="submit"> SUBMIT </PrimaryButton>
                            </div>
                        </form>
                    </div>
                        
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

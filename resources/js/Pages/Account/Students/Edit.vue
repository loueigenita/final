<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputLabel from '@/Components/InputLabel.vue'
import InputError from '@/Components/InputError.vue'
import TextInput from '@/Components/TextInput.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, useForm, usePage } from '@inertiajs/vue3';

const props = defineProps({
    account: {
        type: Object,
        required: true,
        default: () => ({
            fname: '',
            lname: '',
            age: '',
            address: '',
            department: '',
            yr_level: '',
            adviser: '',
        }),
    },
});

const form = useForm({
    fname: props.account.fname,
    lname: props.account.lname,
    address: props.account.address,
    age: props.account.age,
    department: props.account.department,
    yr_level: props.account.yr_level,
    adviser: props.account.adviser,
});


</script>

<template>
    <Head title="My Account" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">My Account</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <section class="max-w-xl">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">Account Information</h2>

                            <p class="mt-1 text-sm text-gray-600">
                                Update your account information.
                            </p>
                        </header>

                        <form @submit.prevent="form.patch(route('account.update'))" class="mt-6 space-y-6">
                            <div>
                                <InputLabel for="fname" value="First Name" />

                                <TextInput id="fname" type="text" class="mt-1 block w-full" v-model="form.fname" required
                                    autocomplete="fname" />

                                <InputError class="mt-2" :message="form.errors.fname" />
                            </div>

                            <div>
                                <InputLabel for="lname" value="Last Name" />

                                <TextInput id="lname" type="text" class="mt-1 block w-full" v-model="form.lname" required
                                    autocomplete="lname" />

                                <InputError class="mt-2" :message="form.errors.lname" />
                            </div>

                            <div>
                                <InputLabel for="age" value="Age" />
                                <TextInput id="age" type="text" class="mt-1 block w-full" v-model="form.age" required
                                    autocomplete="age" />
                                <InputError class="mt-2" :message="form.errors.age" />
                            </div>

                            <div>
                                <InputLabel for="address" value="Address" />

                                <TextInput id="address" type="text" class="mt-1 block w-full" v-model="form.address"
                                    required autocomplete="address" />

                                <InputError class="mt-2" :message="form.errors.address" />
                            </div>
                            <div>
                                <InputLabel for="department" value="Department" />
                                <TextInput id="department" type="text" class="mt-1 block w-full" v-model="form.department"
                                    required autocomplete="department" />
                                <InputError class="mt-2" :message="form.errors.department" />
                            </div>

                            <div>
                                <InputLabel for="yr_level" value="Year Level" />
                                <TextInput id="yr_level" type="text" class="mt-1 block w-full" v-model="form.yr_level"
                                    required autocomplete="yr_level" />
                                <InputError class="mt-2" :message="form.errors.yr_level" />
                            </div>

                            <div>
                                <InputLabel for="adviser" value="Adviser" />
                                <TextInput id="adviser" type="text" class="mt-1 block w-full" v-model="form.adviser"
                                    required autocomplete="adviser" />
                                <InputError class="mt-2" :message="form.errors.adviser" />
                            </div>
                            <div class="flex items-center gap-4">
                                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                                <Transition enter-active-class="transition ease-in-out" enter-from-class="opacity-0"
                                    leave-active-class="transition ease-in-out" leave-to-class="opacity-0">
                                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                                </Transition>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
      <Head title="Log in" />
  
      <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
        {{ status }}
      </div>
  
      <form @submit.prevent="submit" class="max-w-md mx-auto mt-8 space-y-4">
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
          <input
            id="email"
            type="email"
            v-model="form.email"
            required
            autofocus
            autocomplete="username"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
          />
          <InputError class="mt-2 text-sm text-red-600" :message="form.errors.email" />
        </div>
  
        <div class="mt-4">
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <input
            id="password"
            type="password"
            v-model="form.password"
            required
            autocomplete="current-password"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
          />
          <InputError class="mt-2 text-sm text-red-600" :message="form.errors.password" />
        </div>
  
        <div class="block mt-4">
          <label class="flex items-center">
            <input type="checkbox" v-model="form.remember" class="text-indigo-600 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 rounded" />
            <span class="ml-2 text-sm text-gray-600">Remember me</span>
          </label>
        </div>
  
        <div class="flex items-center justify-end">
          <Link
            v-if="canResetPassword"
            :href="route('password.request')"
            class="text-sm font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
          >
            Forgot your password?
          </Link>
  
          <PrimaryButton
            class="ml-4 px-4 py-2 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold rounded-md focus:outline-none focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
          >
            Log in
          </PrimaryButton>
        </div>
      </form>
    </GuestLayout>
  </template>
  


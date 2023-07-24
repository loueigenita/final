<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    account: Object
})

// console.log(props)
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div>
    <!-- Hero Section -->
    <div class="bg-blue py-12">
      <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <img src="../Components/images/guide.png" alt="" class="w-[250px] mx-auto">
        </div>
      </div>
    </div>

    <!-- Content Section -->
    <div class="py-8">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <!-- Add your content here -->
          <div class="p-6 text-gray-900">
            <h2 class=" text-center text-4xl uppercase font-semibold mb-4" style="font-family: 'Times New Roman', serif;">Welcome to our Guidance System</h2>
            <p class="text-base mb-2">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eu lacus ut tellus scelerisque euismod.
              Quisque ultricies aliquet urna, vitae tempus lorem tempor id. Vivamus feugiat erat in orci tristique,
              vitae dapibus odio faucibus. Suspendisse eu metus sit amet lorem varius cursus.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
    </AuthenticatedLayout>
</template>


<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link } from '@inertiajs/vue3';

</script>

<template>
  <AuthenticatedLayout>
    <div class="mt-20 flex justify-center items-center h-screen">
      <div class="mt-20 w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        <form @submit.prevent="submit" class="space-y-6" enctype="multipart/form-data">
          
          <div class="flex items-center justify-between">
            <h1 class="text-l text-gray-900 dark:text-white">CREATE A RECORD</h1>
            <Link
              :href="(route('students.index'))"
              type="button"
              class="text-dark bg-yellow-300 hover:bg-yellow-400 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            >
              Back
            </Link>
          </div>
          <div>
    <label for="fname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
    <input
      type="text"
      id="fname"
      v-model="form.fname"
      placeholder="First Name"
      required
      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
    />
    <div class="text-red-600 text-sm" v-if="form.errors.fname">{{ form.errors.fname }}</div>
  </div>

  <div>
    <label for="lname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
    <input
      type="text"
      id="lname"
      v-model="form.lname"
      placeholder="Last Name"
      required
      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
    />
    <div class="text-red-600 text-sm" v-if="form.errors.lname">{{ form.errors.lname }}</div>
  </div>

  <div>
    <label for="age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Age</label>
    <input
      type="text"
      id="age"
      v-model="form.age"
      placeholder="Age"
      required
      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
    />
    <div class="text-red-600 text-sm" v-if="form.errors.age">{{ form.errors.age }}</div>
  </div>

  <div>
    <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
    <input
      type="text"
      id="address"
      v-model="form.address"
      placeholder="Address"
      required
      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
    />
    <div class="text-red-600 text-sm" v-if="form.errors.address">{{ form.errors.address }}</div>
  </div>

  <div>
    <label for="department" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Department</label>
    <input
      type="text"
      id="department"
      v-model="form.department"
      placeholder="Department"
      required
      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
    />
    <div class="text-red-600 text-sm" v-if="form.errors.department">{{ form.errors.department }}</div>
  </div>



  <div>
    <label for="yr_level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year Level</label>
    <input
      type="text"
      id="yr_level"
      v-model="form.yr_level"
      placeholder="Year Level"
      required
      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
    />
    <div class="text-red-600 text-sm" v-if="form.errors.yr_level">{{ form.errors.yr_level }}</div>
  </div>

  <div>
    <label for="adviser" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Adviser</label>
    <input
      type="text"
      id="adviser"
      v-model="form.adviser"
      placeholder="Adviser"
      required
      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
    />
    <div class="text-red-600 text-sm" v-if="form.errors.adviser">{{ form.errors.adviser }}</div>
  </div>
          <div>
            <button
              class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
              type="submit"
            >
              Create
            </button>
          </div>
        </form>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script>
import { useForm } from '@inertiajs/vue3';

const form = useForm({
  fname: '',
  lname: '',
  age: '',
  address: '',
  department: '',
  yr_level: '',
  adviser: '',
});

function submit() {
  form.post(route('students.store'), {
    onSuccess: () => {
      const { visit } = usePage();
      visit(route('students.index'));
    },
  });
}
</script>

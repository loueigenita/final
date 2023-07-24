
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link } from '@inertiajs/vue3';


</script>

<template>
  <AuthenticatedLayout>
    <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Students Lists</h2>
                <!-- <Link :href="route('accounts.create')" class="px-4 py-1.5 rounded-md bg-black text-white">Create Account</Link> -->
            </div>
        </template>
    <div class="container mx-auto my-4">
      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="relative mt-5 mb-2 mx-5 flex justify-between items-center">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
              fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
            </svg>
          </div>
          <input type="text" v-model="searchQuery" @input="updateSearchQuery" @keydown.enter="performSearch"
            id="table-search"
            class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Search for items" />
          <Link :href="route('students.create')" type="button"
            class="text-black bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
          Create</Link>

        </div>

        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mt-5">
          <thead
            class="text-sm text-white uppercase bg-blue-800 border-b dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 text-center">
            <tr>
              <th scope="col" class="p-4">
                <div class="flex items-center">
                  <input id="checkbox-all-search" type="checkbox"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                  <label for="checkbox-all-search" class="sr-only">checkbox</label>
                </div>
              </th>
              <th scope="col" class="px-6 py-3">ID</th>
              <th scope="col" class="px-6 py-3">First Name</th>
              <th scope="col" class="px-6 py-3">Last Name</th>
              <th scope="col" class="px-6 py-3">Age</th>
              <th scope="col" class="px-6 py-3">Address</th>
              <th scope="col" class="px-6 py-3">Department</th>
              <th scope="col" class="px-6 py-3">Year Level</th>
              <th scope="col" class="px-6 py-3">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="student in students" :key="student.id"
              class=" bg-blue border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

              <td class="w-4 p-4">
                <div class="flex items-center">
                  <input id="checkbox-table-search-1" type="checkbox"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                  <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                </div>
              </td>
              <td class=" text-center">{{ student.id }}</td>
              <td class=" text-center">{{ student.fname }}</td>
              <td class=" text-center">{{ student.lname }}</td>
              <td class=" text-center">{{ student.age }}</td>
              <td class=" text-center">{{ student.address }}</td>
              <td class=" text-center">{{ student.department }}</td>
              <td class=" text-center">{{ student.yr_level }}</td>
              <td class=" text-center">
                <!-- <Link :href="`/students/${student.id}/edit`" type="button"
                  class="px-3 py-2 text-xs font-medium text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-center mr-2 mb-2">
                Edit
                </Link> -->
                <!-- <Link :to="`/students/${student.id}`" type="button" class="px-3 py-2 text-xs font-medium text-black bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 shadow-lg shadow-lime-500/50 dark:shadow-lg dark:shadow-lime-800/80 font-medium rounded-lg mr-2 mb-2">Show</Link> -->
                <button href="#" @click="deleteStudent(student.id)" type="button"
                  class="px-3 py-2 text-xs font-small text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-small rounded-lg text-center mr-2 mb-2">
                  Delete
                </button>
              </td>
            </tr>
          </tbody>

        </table>
      </div>
    </div>

  </AuthenticatedLayout>
</template>

<script>

export default {
  props: {
    students: [],
    search: String,

  },
  data() {
    return {
      searchQuery: this.search || '',
      students: this.students,
      minSearchLength: 3,
    };
  },
  methods: {
    updateSearchQuery() {
      this.students = this.students;
    },
    performSearch() {
      if (this.searchQuery.length >= this.minSearchLength) {
        this.$inertia.get((route('students.index')), { search: this.searchQuery });
      } else {
        this.students = this.students;
      }
    },

  },
  methods: {
    performSearch() {
      this.$inertia.get((route('students.index')), { search: this.searchQuery });
    },
    deleteStudent(studentId) {
  if (confirm('Are you sure you want to delete this student?')) {

    axios
      .delete(`/students/${studentId}`)
      .then((response) => {
        location.reload();
      })
      .catch((error) => {
        console.error(error);
      });
  }
},



  },

};
</script>

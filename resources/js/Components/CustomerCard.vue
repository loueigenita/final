<script setup>
import { router } from '@inertiajs/vue3';

const prop = defineProps({
    account: Object
})

const toggleActive = (account) => {
    router.visit('/accounts/toggle/' + account.id, {
        method: 'post',
        preserveScroll: true
    })
}

function viewAccount() {
    router.visit('/accounts/view/' + prop.account.id)
}
</script>

<template>
    <div
      class="min-w-[350px] mb-4 mx-2 p-4 rounded shadow border flex-1 cursor-pointer transition duration-300 ease-in-out transform hover:scale-105 hover:bg-blue-100 dark:hover:bg-blue-800"
    >
      <div @click="viewAccount">
        <p class="text-base font-normal text-gray-900">
          Account no.: <strong>0{{ account.id }}</strong> <br>
          Account name: <strong>{{ account.lname }}, {{ account.fname }}</strong> <br>
          Address: <strong>{{ account.address }}</strong> <br>
          Email: <strong>{{ account.email }}</strong> <br>
          Phone: <strong>{{ account.phone_no }}</strong> <br>
        </p>
        <p>
          Status:
          <span
            v-if="account.active == 1"
            class="text-md font-semibold text-green-500"
          >Active</span>
          <span
            v-else
            class="text-md font-semibold text-yellow-500"
          >Inactive</span>
        </p>
      </div>
      <label
        class="relative inline-flex items-center cursor-pointer"
        :for="'status-' + account.id"
      >
        <input
          type="checkbox"
          value=""
          :checked="account.active"
          :id="'status-' + account.id"
          class="sr-only peer"
          @change="toggleActive(account)"
        />
        <div
          class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"
        ></div>
        <span class="ml-3 text-md font-semibold text-gray-900 dark:text-gray-300"></span>
      </label>
    </div>
  </template>
  
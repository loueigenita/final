<script setup>
const prop = defineProps({
    message: Object
})

function close() {
    if(prop.message.success) {
        prop.message.success = null
    } else {
        prop.message.error = null
    }
}
</script>

<template>
    <div v-if="prop.message.success" class="sticky top-0 z-10 p-2 w-full bg-indigo-500">
        <div class="px-5 mx-auto flex justify-between">
            <p class="text-sm font-normal text-white">{{ prop.message.success }}</p>
            <button class="text-white" @click="close">x</button>
        </div>
    </div>
    <div v-if="prop.message.error" class="sticky top-0 z-10 p-2 w-full bg-red-500">
        <div class="px-5 mx-auto flex justify-between">
            <p class="text-sm font-normal text-white">{{ prop.message.error }}</p>
            <button class="text-white" @click="close">x</button>
        </div>
    </div>
</template>
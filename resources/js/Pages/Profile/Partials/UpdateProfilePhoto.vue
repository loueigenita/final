<script setup>
import { Link, useForm, usePage, router } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const user = usePage().props.auth.user;


const form = useForm({
    profile_pic: null
});

const submit = () => {
    form.post(route('profilepic.update'))
    form.profile_pic = null
}
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">Profile Picture</h2>

            <p class="mt-1 text-sm text-gray-600">
                Update your profile picture.
            </p>
        </header>

        <div class="mt-3">
            <img v-if="!user.profile_pic_url" src="../../../Components/icons/usericon.png" alt="" class="border border-1 w-52 rounded-full">   
            <img v-if="user.profile_pic_url" :src="user.profile_pic_url" alt="" class="border border-1 w-52 h-52 rounded-full">   
            <form @submit.prevent="submit">
                <div class="flex items-center space-x-2 mt-5">
                    <input type="file" name="profilepic" id="profilepic" class="" @input="form.profile_pic = $event.target.files[0]">
                    <PrimaryButton v-if="form.profile_pic" :disabled="form.processing">Save</PrimaryButton>
                </div>
                <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                    {{ form.progress.percentage }}%
                  </progress>
            </form>
        </div>
    </section>
</template>
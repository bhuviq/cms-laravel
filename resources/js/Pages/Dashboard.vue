<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { reactive } from 'vue'
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import TextEditor from '@/Components/TextEditor.vue';

import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    categories: {
        type: Array
    },
    status: {
        type: String,
    },
});

const form = useForm({
    title: '',
    category: '',
    content: ''
});

const submit = () => {
    form.post(route('save-content'), {
        onFinish: () => {
            form.reset();
            alert('News Posted Successfully!');
        }
    });
};
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="flex flex-col sm:justify-center items-center pt-6">
            <div
                class="w-full xl:max-w-xl mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg"
            >
                <form @submit.prevent="submit">
                    <div>
                        <InputLabel for="title" value="Title" />

                        <TextInput
                            id="title"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.title"
                            required
                            autofocus
                        />

                        <InputError class="mt-2" :message="form.errors.title" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="Category" value="Category" />

                        <select
                            id="category"
                            class="mt-1 block w-full"
                            v-model="form.category"
                            required
                        >
                            <option disabled value="">Please Select Category</option>
                            <option v-for="(item, index) in categories" :value="item.name" :key="index">{{ item.name }}</option>
                        </select>

                        <InputError class="mt-2" :message="form.errors.category" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="Content" value="Content" />

                        <TextEditor
                            id="content"
                            v-model="form.content"
                        />

                        <InputError class="mt-2" :message="form.errors.content" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Save
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>

    </AuthenticatedLayout>
</template>

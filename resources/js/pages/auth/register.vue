<script setup>
import { useForm } from '@inertiajs/vue3';
import MainLayout from '../../layouts/mainLayout.vue';

defineOptions({
    layout: MainLayout,
});

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post('/register');
};
</script>
<template>
    <div class="max-w-md mx-auto">
        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">
                <h2 class="card-title
                    text-2xl font-bold text-center mb-4 align-middle justify-center"
                >
                    Register for Chirper
                </h2>
                <form @submit.prevent="submit" class="space-y-4">
                    <div>
                        <label
                            for="name"
                            class="block text-sm font-medium text-gray-700"
                            >Name</label
                        >
                        <input
                            id="name"
                            type="text"
                            required
                            v-model="form.name"
                            class="input input-bordered w-full mt-1"
                        />
                        <p v-if="form.errors.name" class="text-sm text-error mt-1">{{ form.errors.name }}</p>
                    </div>

                    <div>
                        <label
                            for="email"
                            class="block text-sm font-medium text-gray-700"
                            >Email</label
                        >
                        <input
                            id="email"
                            type="email"
                            required
                            v-model="form.email"
                            class="input input-bordered w-full mt-1"
                        />
                        <p v-if="form.errors.email" class="text-sm text-error mt-1">{{ form.errors.email }}</p>
                    </div>

                    <div>
                        <label
                            for="password"
                            class="block text-sm font-medium text-gray-700"
                            >Password</label
                        >
                        <input
                            id="password"
                            type="password"
                            required
                            v-model="form.password"
                            class="input input-bordered w-full mt-1"
                        />
                        <p v-if="form.errors.password" class="text-sm text-error mt-1">{{ form.errors.password }}</p>
                    </div>

                    <div>
                        <label
                            for="password_confirmation"
                            class="block text-sm font-medium text-gray-700"
                            >Confirm Password</label
                        >
                        <input
                            id="password_confirmation"
                            type="password"
                            required
                            v-model="form.password_confirmation"
                            class="input input-bordered w-full mt-1"
                        />
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary w-full" :disabled="form.processing">
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

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
    <div class="max-w-md mx-auto space-y-4">
        <section class="rounded-2xl border border-red-200 bg-gradient-to-br from-red-50 to-rose-100 p-4">
            <h1 class="text-xl font-black text-red-900 tracking-tight">Create Your Blipper Account</h1>
            <p class="text-sm text-red-700">Join in and start sharing quick blips.</p>
        </section>

        <div class="card bg-base-100 shadow-lg border border-base-300">
            <div class="card-body">
                <h2 class="card-title
                    text-2xl font-bold text-center mb-4 align-middle justify-center"
                >
                    Register for Blipper
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

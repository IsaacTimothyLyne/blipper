<script>
import MainLayout from '../../layouts/mainLayout.vue';

export default {
    layout: MainLayout,
};

</script>
<template>
    <div class="max-w-md mx-auto space-y-4">
        <section class="rounded-2xl border border-red-200 bg-gradient-to-br from-red-50 to-rose-100 p-4">
            <h1 class="text-xl font-black text-red-900 tracking-tight">Welcome Back</h1>
            <p class="text-sm text-red-700">Log in to keep posting blips.</p>
        </section>

        <div class="card bg-base-100 shadow-lg border border-base-300">
            <div class="card-body">
                <h2 class="card-title text-2xl font-bold text-center mb-4 align-middle justify-center">
                    Login to Blipper
                </h2>

                <form method="POST" action="/login" class="space-y-4">
                    <div>
                        <label
                            for="email"
                            class="block text-sm font-medium text-gray-700"
                            >Email</label
                        >
                        <input
                            id="email"
                            name="email"
                            type="email"
                            required
                            class="input input-bordered w-full mt-1"
                        />
                    </div>

                    <div>
                        <label
                            for="password"
                            class="block text-sm font-medium text-gray-700"
                            >Password</label
                        >
                        <input
                            id="password"
                            name="password"
                            type="password"
                            required
                            class="input input-bordered w-full mt-1"
                        />
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary w-full">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

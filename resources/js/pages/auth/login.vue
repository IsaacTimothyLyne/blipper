<script>
import MainLayout from '../../layouts/mainLayout.vue';

export default {
    layout: MainLayout,
};

</script>
<template>
    <div class="max-w-md mx-auto">
        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">
                <h2 class="card-title text-2xl font-bold text-center mb-4 align-middle justify-center">
                    Login to Chirper
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

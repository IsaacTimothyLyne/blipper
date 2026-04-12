<script>

export default {
    props: {
        chirps: {
            type: Array,
            required: true,
        },
    },
};

</script>

<template>
    <div class="space-y-4">
        <div v-for="chirp in chirps" :key="chirp.id" class="card bg-base-100 shadow">
            <div class="card-body">
                <p>{{ chirp.message }}</p>
                <div class="text-sm text-gray-500">
                    Posted by {{ chirp.user.name }} on {{ new Date(chirp.created_at).toLocaleString() }}
                </div>
            </div>
        </div>
    </div>
</template>

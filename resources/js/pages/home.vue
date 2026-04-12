<script>
import BlipComposer from "../components/BlipComposer.vue";
import mainLayout from "../layouts/mainLayout.vue";
import BlipFeed from "../components/BlipFeed.vue";

export default {
    layout: mainLayout,
    components: {
        BlipComposer,
        BlipFeed,
    },
    methods: {
        handleBlipSubmit(blipText) {
            this.$inertia.post(
                "/blips",
                { message: blipText },
                {
                    preserveScroll: true,
                    onError: (errors) => {
                        console.error("Error submitting blip:", errors);
                    },
                },
            );
        },
    },
};
</script>

<template>
    <div class="max-w-3xl mx-auto space-y-4">
        <section class="rounded-2xl border border-red-200 bg-gradient-to-br from-red-50 to-rose-100 p-5">
            <h1 class="text-2xl font-black text-red-900 tracking-tight">Blipper Feed</h1>
            <p class="text-sm text-red-700 mt-1">Post quick blips and manage your own updates below.</p>
        </section>

        <div class="card bg-base-100 shadow-lg border border-base-300">
            <BlipComposer @submit-blip="handleBlipSubmit" />
            <BlipFeed
                :blips="$page.props.blips"
                :current-user-id="$page.props.auth?.user?.id || null"
            />
        </div>
    </div>
</template>

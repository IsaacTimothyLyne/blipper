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
    data() {
        return {
            blipSounds: [3, 4, 5, 6, 7, 8, 9, 10].map(n => `/sounds/Blip${n}.wav`),
        };
    },
    methods: {
        handleBlipSubmit(blipText) {
            // const sound = this.blipSounds[Math.floor(Math.random() * this.blipSounds.length)];
            // new Audio(sound).play();
            this.$inertia.post(
                "/blips",
                { message: blipText },
                {
                    preserveScroll: true,
                    onSuccess: () => {
                        // Clear the blip text after successful submission
                        this.$refs.blipComposer.blipText = "";
                    },
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
            <BlipComposer @submit-blip="handleBlipSubmit" :is-logged-in="$page.props.auth?.user?.id || false" />
            <BlipFeed
                :blips="$page.props.blips"
                :current-user-id="$page.props.auth?.user?.id || null"
            />
        </div>
    </div>
</template>

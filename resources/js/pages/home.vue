<script>
import ChirpModule from "../components/ChirpModule.vue";
import mainLayout from "../layouts/mainLayout.vue";
import ChirpDisplay from "../components/ChirpDisplay.vue";

export default {
    layout: mainLayout,
    components: {
        ChirpModule,
        ChirpDisplay
    },
    methods: {
        handleChirpSubmit(chirpText) {
            this.$inertia.post(
                "/chirps",
                { message: chirpText },
                {
                    onSuccess: () => {
                        this.$emit("chirp-submitted");
                    },
                    onError: (errors) => {
                        console.error("Error submitting chirp:", errors);
                    },
                },
            );
        },
    },
};
</script>

<template>
    <div class="max-w-2xl mx-auto">
        <div class="card bg-base-100 shadow mt-8">
            <ChirpModule @submit-chirp="handleChirpSubmit" />
            <ChirpDisplay :chirps="$page.props.chirps" />
        </div>
    </div>
</template>

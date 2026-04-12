<!-- Chirp Module, is a component for submitting chirps (a short message similar to a tweet)-->
<script>
    export default {
        data() {
            return {
                chirpText: '',
            };
        },
    };
</script>
<template>
    <div class="card bg-base-100 shadow mt-8">
        <div class="card-body">
            <form @submit.prevent="$emit('submit-chirp', chirpText)" method="POST" action="/chirps" class="space-y-4">
                <div>
                    <textarea
                        v-model="chirpText"
                        placeholder="What's on your mind?"
                        class="textarea textarea-bordered w-full mt-1 resize-none h-12"
                        required
                    ></textarea>
                </div>
                <div class="flex justify-end">
                    <button
                        type="submit"
                        class="btn btn-primary"
                        :disabled="!chirpText.trim()"
                    >
                        Chirp
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

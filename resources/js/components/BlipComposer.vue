<!-- Blip module for submitting short updates -->
<script>
export default {
    data() {
        return {
            blipText: "",
        };
    },
};
</script>
<template>
    <div class="card bg-base-100 shadow rounded-none rounded-t-2xl border-b border-base-300">
        <div class="card-body">
            <form @submit.prevent="$emit('submit-blip', blipText)" class="space-y-4">
                <div>
                    <textarea
                        v-model="blipText"
                        placeholder="What's on your mind? Drop a blip..."
                        class="textarea textarea-bordered w-full mt-1 resize-none h-20"
                        required
                    ></textarea>
                </div>
                <div class="flex justify-end">
                    <button
                        type="submit"
                        class="btn btn-primary"
                        :disabled="!blipText.trim()"
                    >
                        Blip
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

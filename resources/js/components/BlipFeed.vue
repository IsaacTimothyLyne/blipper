<script>
export default {
    props: {
        blips: {
            type: Array,
            required: true,
        },
        currentUserId: {
            type: Number,
            default: null,
        },
    },
    data() {
        return {
            editingId: null,
            editMessage: "",
        };
    },
    methods: {
        isOwnBlip(blip) {
            return this.currentUserId !== null && blip.user_id === this.currentUserId;
        },
        startEdit(blip) {
            this.editingId = blip.id;
            this.editMessage = blip.message;
        },
        cancelEdit() {
            this.editingId = null;
            this.editMessage = "";
        },
        saveEdit(blipId) {
            const message = this.editMessage.trim();
            if (!message) {
                return;
            }

            this.$inertia.put(
                `/blips/${blipId}`,
                { message },
                {
                    preserveScroll: true,
                    onSuccess: () => this.cancelEdit(),
                },
            );
        },
        deleteBlip(blipId) {
            if (!confirm("Delete this blip?")) {
                return;
            }

            this.$inertia.delete(`/blips/${blipId}`, {
                preserveScroll: true,
            });
        },
    },
};
</script>

<template>
    <div class="space-y-4 p-4">
        <div
            v-if="blips.length === 0"
            class="rounded-xl border border-dashed border-red-200 bg-red-50 px-4 py-6 text-center text-red-800"
        >
            No blips yet. Be the first to post one.
        </div>

        <div
            v-for="blip in blips"
            :key="blip.id"
            class="card shadow border"
            :class="isOwnBlip(blip) ? 'bg-red-50 border-red-200' : 'bg-base-100 border-base-300'"
        >
            <div class="card-body">
                <template v-if="editingId === blip.id">
                    <textarea
                        v-model="editMessage"
                        class="textarea textarea-bordered w-full"
                        rows="3"
                    />
                    <div class="flex justify-end gap-2 mt-2">
                        <button class="btn btn-sm" @click="cancelEdit">Cancel</button>
                        <button class="btn btn-sm btn-error" @click="saveEdit(blip.id)">Save</button>
                    </div>
                </template>

                <template v-else>
                    <p class="whitespace-pre-wrap">{{ blip.message }}</p>
                </template>

                <div class="text-sm text-gray-500 mt-2">
                    Blipped by {{ blip.user?.name || "Unknown" }} on
                    {{ new Date(blip.created_at).toLocaleString() }}
                </div>

                <div v-if="isOwnBlip(blip)" class="flex justify-end gap-2 mt-2">
                    <button class="btn btn-sm" @click="startEdit(blip)">Edit</button>
                    <button class="btn btn-sm btn-error" @click="deleteBlip(blip.id)">Delete</button>
                </div>
            </div>
        </div>
    </div>
</template>

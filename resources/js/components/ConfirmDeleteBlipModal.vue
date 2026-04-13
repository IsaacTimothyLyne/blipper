<script>
</script>
<template>
    <div class="modal modal-open">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Confirm Deletion</h3>
            <p class="py-4">Are you sure you want to delete this blip? This action cannot be undone.</p>
            <div class="modal-action">
                <button @click="$emit('cancel')" class="btn btn-ghost">Cancel</button>
                <button @click="$emit('confirm-delete')" class="btn btn-error">Delete</button>
            </div>
        </div>
    </div>
</template>
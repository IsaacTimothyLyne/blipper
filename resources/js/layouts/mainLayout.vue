<script setup>
const year = new Date().getFullYear();
</script>

<template>
    <div class="min-h-screen flex flex-col bg-base-200 font-sans">
        <nav class="navbar bg-base-100">
            <div class="navbar-start">
                <a href="/" class="btn btn-ghost text-xl">💬 Blipper</a>
            </div>
            <div class="navbar-end gap-2">
                <a href="/login" class="btn btn-ghost btn-sm">Login</a>
                <a href="/register" class="btn btn-primary btn-sm">Register</a>
            </div>
        </nav>

        <main class="flex-1 container mx-auto px-4 py-8">
            <slot />
        </main>

        <footer
            class="footer footer-center p-5 bg-base-300 text-base-content text-xs"
        >
            <div>
                <p>© {{ year }} Isaac Lyne - Built with Laravel, Vue, Inertia and Tailwind CSS</p>
            </div>
        </footer>
    </div>
</template>

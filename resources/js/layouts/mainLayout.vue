<script setup lang="ts"></script>

<template>
    <body class="min-h-screen flex flex-col bg-base-200 font-sans">
        <nav class="navbar bg-base-100">
            <div class="navbar-start">
                <a href="/" class="btn btn-ghost text-xl">🐦 Chirper</a>
            </div>
            <div class="navbar-end gap-2">
                <a href="#" class="btn btn-ghost btn-sm">Sign In</a>
                <a href="#" class="btn btn-primary btn-sm">Sign Up</a>
            </div>
        </nav>

        <main class="flex-1 container mx-auto px-4 py-8">
            <slot />
        </main>

        <footer
            class="footer footer-center p-5 bg-base-300 text-base-content text-xs"
        >
            <div>
                <p>© {{ date("Y") }} Chirper - Built with Laravel and ❤️</p>
            </div>
        </footer>
    </body>
</template>

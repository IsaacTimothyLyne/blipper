# Blipper

A micro-blogging app where you post short updates called "blips." Built with Laravel, Vue 3, Inertia.js, and Tailwind CSS.

## Setup

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
```

## Run

```bash
composer run dev
```

This starts the Laravel server, queue worker, and Vite dev server together.

## Tech Stack

- **Backend:** Laravel 13, PHP 8.4, SQLite
- **Frontend:** Vue 3, Inertia.js, Tailwind CSS, DaisyUI
- **Build:** Vite

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

FROM php:8.4-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl unzip sqlite3 libsqlite3-dev \
    libzip-dev libpng-dev libonig-dev libxml2-dev \
    nodejs npm \
    && docker-php-ext-install pdo pdo_sqlite mbstring xml zip bcmath \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Install PHP dependencies
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Install Node dependencies and build
COPY package.json package-lock.json ./
RUN npm install
COPY . .
RUN npm run build

# Laravel setup
RUN composer dump-autoload --optimize \
    && php artisan route:cache \
    && php artisan view:cache \
    && mkdir -p database storage/logs storage/framework/sessions storage/framework/views storage/framework/cache \
    && chmod -R 775 storage database \
    && touch database/database.sqlite

EXPOSE ${PORT:-8000}

CMD php artisan config:cache && php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=${PORT:-8000}

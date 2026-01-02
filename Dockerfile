FROM php:8.3-cli

# Install dependency sistem
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    sqlite3 \
    libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite

# Install composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copy project
COPY . .

# Install dependency PHP
RUN composer install --no-dev --optimize-autoloader --no-interaction

CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]


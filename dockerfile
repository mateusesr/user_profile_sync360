FROM php:8.2-fpm

# Instala extensões PHP e Node
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    libzip-dev \
    nodejs \
    npm \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Define diretório de trabalho
WORKDIR /var/www

# Copia arquivos do projeto
COPY . .

# Instala dependências
RUN composer install
RUN php artisan storage:link
RUN npm install
RUN npm run build

# Cache de configuração Laravel
RUN php artisan config:cache

# Inicia servidor
CMD php artisan serve --host=0.0.0.0 --port=10000

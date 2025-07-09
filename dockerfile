FROM php:8.2-fpm

# Instala extensões PHP necessárias
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
@@ -10,6 +10,8 @@ RUN apt-get update && apt-get install -y \
    git \
    curl \
    libzip-dev \
    nodejs \
    npm \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Instala Composer
@@ -18,12 +20,16 @@ COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
# Define diretório de trabalho
WORKDIR /var/www

# Copia os arquivos do projeto
COPY . .

# Instala dependências PHP e JS
RUN composer install
RUN php artisan storage:link

RUN npm install
RUN npm run build



# Cache de config Laravel
RUN php artisan config:cache

# Executa Laravel com host e porta
CMD php artisan serve --host=0.0.0.0 --port=10000
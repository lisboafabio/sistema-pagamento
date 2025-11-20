FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libzip-dev \
    zip \
    unzip

RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Cria usuário que corresponde ao usuário do host
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

WORKDIR /var/www

# Importante: copie depois de definir workdir
COPY . .

# Ajusta permissões dentro da imagem
RUN chown -R www:www /var/www \
    && chmod -R 775 /var/www/storage \
    && chmod -R 775 /var/www/bootstrap/cache

USER www

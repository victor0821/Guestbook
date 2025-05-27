# Imagen base oficial con PHP 8.3, Apache y extensiones comunes
FROM php:8.3-apache

# Establecer el directorio de trabajo
WORKDIR /var/www/html

# Instalar dependencias necesarias del sistema
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libpq-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libmcrypt-dev \
    libcurl4-openssl-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring exif pcntl bcmath gd

# Habilitar módulos de Apache necesarios
RUN a2enmod rewrite

# Instalar Composer (gestor de dependencias PHP)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar todos los archivos del proyecto
COPY . .

# Dar permisos a carpetas necesarias
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Establecer permisos para Laravel
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Puerto en el que Apache corre dentro del contenedor
EXPOSE 80

# Comando por defecto al iniciar el contenedor
CMD ["apache2-foreground"]
# Imagen base con Apache
FROM php:8.2-apache

# Instalar extensiones y herramientas necesarias
RUN apt-get update && apt-get install -y \
    zip unzip git curl \
    libzip-dev libpng-dev libonig-dev \
    libjpeg-dev libfreetype6-dev libxml2-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring zip pcntl exif gd soap \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Habilitar mod_rewrite para Laravel
RUN a2enmod rewrite

# Cambiar el DocumentRoot de Apache a la carpeta "public"
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

# Copiar Composer desde imagen oficial
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Establecer el directorio de trabajo
WORKDIR /var/www/html

# Copiar el código del proyecto
COPY . /var/www/html

# Asignar permisos correctos
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Instalar dependencias PHP con Composer
RUN composer install

# Exponer el puerto 80
EXPOSE 80

# Comando por defecto
CMD ["apache2-foreground"]

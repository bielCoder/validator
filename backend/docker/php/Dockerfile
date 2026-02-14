FROM php:8.2-apache

# Instala dependências necessárias
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl

# Instala Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Habilita rewrite
RUN a2enmod rewrite

# Permite .htaccess
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Ajusta DocumentRoot
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' \
    /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html

# Copia o projeto
COPY . .

# Instala dependências e gera autoload
RUN composer install --no-interaction --optimize-autoloader

EXPOSE 80

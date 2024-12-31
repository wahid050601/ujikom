
FROM php:apache

# Aktifkan ekstensi mysqli
RUN docker-php-ext-install mysqli

# Install Composer
# Install Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php && \
    php -r "unlink('composer-setup.php');" && \
    mv composer.phar /usr/local/bin/composer

# Install Composer Dependencies
RUN composer install

# Set working directory
WORKDIR /var/www/html
# Add PHP-FPM base image
FROM php:fpm-alpine

# Install your extensions
# To connect to MySQL, add mysqli
RUN docker-php-ext-install mysqli pdo pdo_mysql
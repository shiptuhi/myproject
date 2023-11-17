# Use an official PHP image as the base image
FROM php:8.1.2-cli

# Install dependencies and required extensions
RUN apt-get update && \
    apt-get install -y \
        curl \
        unzip \
        libzip-dev \
        && docker-php-ext-install zip pdo pdo_mysql

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the working directory
WORKDIR /var/www/html/project

# Copy the local project files into the container
COPY . /var/www/html/project

# Install Laravel dependencies
RUN composer install

# Expose port 8080 (or any other port your Laravel app uses)
EXPOSE 8080

# Start Laravel development server
CMD php artisan serve --host=0.0.0.0 --port=8080

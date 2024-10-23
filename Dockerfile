# Step 1: Base Image
FROM php:8.1-apache

# Step 2: Install dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql gd zip

# Step 3: Enable Apache Mod Rewrite
RUN a2enmod rewrite

# Step 4: Set working directory in the container
WORKDIR /var/www/html

# Step 5: Copy the application code to the container
COPY . /var/www/html
RUN cp .env.example .env
# Step 8: Set correct permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Step 9: Expose the port Apache is listening on
EXPOSE 80

# Step 10: Start the Apache server
CMD ["apache2-foreground"]


# Use an official PHP runtime as the base image
FROM php:7.4-apache

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Copy the contents of your PHP website to the working directory
COPY . /var/www/html

# Install any necessary dependencies or extensions
RUN apt-get update && \
    apt-get install -y \
    # Add any additional packages here (e.g., MySQL, PostgreSQL, etc.)
    && docker-php-ext-install mysqli pdo pdo_mysql

# Configure Apache to serve the PHP website
RUN a2enmod rewrite

# Expose port 80 for HTTP traffic
EXPOSE 80

# Start the Apache server when the container is run
CMD ["apache2-foreground"]

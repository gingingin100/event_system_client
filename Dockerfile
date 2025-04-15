FROM php:8.2-apache

# Enable Apache mod_rewrite (if needed for your app)
RUN a2enmod rewrite

# Copy all PHP files from the local directory into the container's web directory
COPY . /var/www/html/

# Set the working directory (optional but good practice)
WORKDIR /var/www/html

# Expose port 80 (default for Apache)
EXPOSE 8082

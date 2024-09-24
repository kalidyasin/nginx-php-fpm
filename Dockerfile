FROM php:fpm-alpine

# Install Nginx and Supervisor
RUN apk add --no-cache nginx supervisor

# Configure Nginx
COPY etc/nginx/http.d/default.conf /etc/nginx/http.d/default.conf

# Create Supervisor configuration file
COPY etc/supervisord.conf /etc/supervisord.conf

# Set the working directory
WORKDIR /var/www/html/public

# Copy PHP file into the container
COPY index.php index.php

# Expose ports
EXPOSE 80
EXPOSE 443

# Start Supervisor to run PHP-FPM and Nginx
CMD ["supervisord", "-c", "/etc/supervisord.conf"]

FROM php:fpm-alpine

# Install Nginx and Supervisor
# RUN apk add --no-cache nginx supervisor
# Install Nginx
RUN apk add --no-cache nginx

# Configure Nginx
COPY etc/nginx/http.d/default.conf /etc/nginx/http.d/default.conf

# Create Supervisor configuration file
# COPY etc/supervisord.conf /etc/supervisord.conf

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Set the working directory
WORKDIR /var/www/html/public

# Copy PHP file into the container
COPY index.php index.php

# Copy style.css file into the container
COPY style.css style.css

# Make sure PHP-FPM logs to stderr
# RUN echo 'error_log = /dev/stderr' >> /usr/local/etc/php-fpm.d/www.conf \
#     && echo 'catch_workers_output = yes' >> /usr/local/etc/php-fpm.d/www.conf

# Expose ports
EXPOSE 80 443

# Start Supervisor to run PHP-FPM and Nginx
# CMD ["supervisord", "-c", "/etc/supervisord.conf"]
# Start PHP-FPM and Nginx
CMD ["sh", "-c", "php-fpm --nodaemonize & nginx -g 'daemon off;'"]

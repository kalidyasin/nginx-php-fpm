FROM php:fpm-alpine

RUN apk add --no-cache nginx

COPY etc/nginx/http.d/default.conf /etc/nginx/http.d/default.conf

WORKDIR /var/www/html/public

COPY index.php index.php

EXPOSE 80

EXPOSE 443

CMD ["nginx", "-g", "daemon off;"]

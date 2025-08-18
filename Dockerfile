# Sử dụng PHP + Apache
FROM php:8.2-apache

# Copy code vào container
COPY . /var/www/html/

# Mở cổng cho Render
EXPOSE 80

# Cài extension mysqli + pdo_pgsql để hỗ trợ cả MySQL & Postgres
RUN docker-php-ext-install mysqli pdo pdo_mysql pdo_pgsql
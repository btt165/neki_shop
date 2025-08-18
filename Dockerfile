# Sử dụng PHP + Apache
FROM php:8.2-apache

# Copy code vào container
COPY . /var/www/html/

# Mở cổng cho Render
EXPOSE 80
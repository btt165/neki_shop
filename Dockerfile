FROM richarvey/nginx-php-fpm:3.1.6

# Set working dir
WORKDIR /var/www/html

# Copy source vào container
COPY . .

# Cài dependencies (nếu SKIP_COMPOSER=0 thì image sẽ tự chạy composer install)
RUN composer install --no-dev --optimize-autoloader

# Laravel optimize
RUN php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache && \
    chmod -R 775 storage bootstrap/cache

# Environment config
ENV WEBROOT=/var/www/html/public
ENV PHP_ERRORS_STDERR=1
ENV RUN_SCRIPTS=1
ENV REAL_IP_HEADER=1
ENV APP_ENV=production
ENV APP_DEBUG=false
ENV LOG_CHANNEL=stderr
ENV COMPOSER_ALLOW_SUPERUSER=1

CMD ["/start.sh"]

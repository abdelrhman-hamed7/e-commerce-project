FROM php:8.2-apache

RUN docker-php-ext-install pdo pdo_mysql mysqli \
    && a2enmod rewrite

WORKDIR /var/www/html

COPY . /var/www/html/
COPY docker/apache-render-entrypoint.sh /usr/local/bin/apache-render-entrypoint

RUN chmod +x /usr/local/bin/apache-render-entrypoint \
    && chown -R www-data:www-data /var/www/html

EXPOSE 80 10000

ENTRYPOINT ["apache-render-entrypoint"]
CMD ["apache2-foreground"]

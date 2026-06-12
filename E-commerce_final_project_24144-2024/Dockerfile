FROM php:8.2-apache

RUN apt-get update \
    && apt-get install -y --no-install-recommends libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* \
    && a2enmod rewrite

WORKDIR /var/www/html

COPY . /var/www/html/
COPY docker/apache-render-entrypoint.sh /usr/local/bin/apache-render-entrypoint

RUN chmod +x /usr/local/bin/apache-render-entrypoint \
    && chown -R www-data:www-data /var/www/html

EXPOSE 80 10000

ENTRYPOINT ["apache-render-entrypoint"]
CMD ["apache2-foreground"]

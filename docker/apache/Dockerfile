FROM php:5.6.40-apache

RUN apt-get update -yqq && \
    apt-get install -yqq --no-install-recommends git zip unzip && \
    rm -rf /var/lib/apt/lists

# Enable PHP extensions
RUN docker-php-ext-install pdo_mysql mysqli

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer

COPY docker/apache/default.conf /etc/apache2/sites-available/000-default.conf

COPY app /var/www/html/app
COPY docker/apache/composer.json /opt/composer.json

WORKDIR /opt
RUN composer install --no-interaction --no-progress --quiet

WORKDIR /var/www/html/app

# Create tmp directory and make it writable by the web server
RUN mkdir -p tmp/cache/models tmp/cache/persistent && \
    chown -R www-data:www-data tmp \
    && chmod -R 770 tmp

RUN mkdir -p app/webroot/img/{artistas, obras} && \
    chown -R www-data:www-data app/webroot/img/{artistas, obras}

RUN mkdir -p app/webroot/img/obras/{mini,thumbs} && \
    chown -R www-data:www-data app/webroot/img/obras/{mini,thumbs}

RUN a2enmod rewrite \
  && service apache2 restart

EXPOSE 80

# see https://github.com/docker-library/docs/blob/master/php/README.md#phpversion-apache
FROM php:8.0-apache

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

#RUN apt-get clean && apt-get update && apt-get install --fix-missing wget git apt-transport-https lsb-release ca-certificates gnupg2 -y
#RUN curl -sSk https://getcomposer.org/installer | php -- --disable-tls && \
#   mv composer.phar /usr/local/bin/composer

#RUN docker-php-ext-install pdo pdo_mysql

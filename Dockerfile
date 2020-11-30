FROM php:7.4-cli-alpine

RUN apk update && apk add --no-cache git

# Composer
RUN curl https://raw.githubusercontent.com/composer/getcomposer.org/76a7060ccb93902cd7576b67264ad91c8a2700e2/web/installer | php -- --quiet
RUN mv /composer.phar /usr/bin/composer

WORKDIR /opt/project

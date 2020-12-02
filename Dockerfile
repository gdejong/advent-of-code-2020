FROM php:8.0-cli-alpine

RUN apk update && apk add --no-cache git

# Composer
RUN curl https://raw.githubusercontent.com/composer/getcomposer.org/76a7060ccb93902cd7576b67264ad91c8a2700e2/web/installer | php -- --quiet
RUN mv /composer.phar /usr/bin/composer

# Xdebug
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/
RUN chmod uga+x /usr/local/bin/install-php-extensions
RUN install-php-extensions xdebug
COPY ./xdebug.ini $PHP_INI_DIR/conf.d/xdebug.ini

WORKDIR /opt/project

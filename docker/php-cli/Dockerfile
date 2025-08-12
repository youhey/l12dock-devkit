FROM php:8.4.11-cli-alpine3.22

#--------------------------------------------------------------------------
# Alpine Linux packages
#--------------------------------------------------------------------------

RUN apk update \
 && apk add --no-cache \
        bash \
        curl \
        wget \
#--------------------------------------------------------------------------
# PHP extensions
#--------------------------------------------------------------------------
 && apk add --no-cache --virtual .php-build-deps \
        autoconf \
        gcc \
        g++ \
        make \
        curl-dev \
        oniguruma-dev \
#####################################
# BC Math
# cURL
# MB String
# OPCache
# PDO
# PDO MySQL
#####################################
 && docker-php-ext-install -j$(nproc) \
     bcmath \
     curl \
     mbstring \
     opcache \
     pdo \
     pdo_mysql \
#####################################
# APCu
#####################################
 && pecl install apcu \
 && docker-php-ext-enable apcu \
#####################################
# PHP Pcov (for PHPUnit coverage)
#####################################
 && pecl install -o -f pcov \
 && docker-php-ext-enable pcov \
#------
# done
#------
 && apk del .php-build-deps \
#--------------------------------------------------------------------------
# cleanup
#--------------------------------------------------------------------------
 && rm -rf /tmp/* /var/tmp/*

#--------------------------------------------------------------------------
# PHP conf
#--------------------------------------------------------------------------

COPY ./conf.d/* /usr/local/etc/php/conf.d/

#--------------------------------------------------------------------------
# PHP Composer
#--------------------------------------------------------------------------

COPY ./php-composer-installer.sh /tmp/

RUN sh /tmp/php-composer-installer.sh

#--------------------------------------------------------------------------
# Environment
#--------------------------------------------------------------------------

VOLUME /src

ENV LANG="C.UTF-8"
ENV LC_ALL="C.UTF-8"
ENV TZ="UTC"

WORKDIR /src

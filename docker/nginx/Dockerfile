FROM nginx:1.29.0-alpine3.22

ARG PHP_UPSTREAM="php-fpm"
ARG PHP_UPSTREAM_PORT=9000

#--------------------------------------------------------------------------
# Nginx conf
#--------------------------------------------------------------------------

RUN rm -f /etc/nginx/conf.d/*.conf

COPY ./server.conf /etc/nginx/conf.d/
COPY ./nginx.conf /etc/nginx/

RUN set -ex; \
    { \
        echo "upstream php-upstream {" ; \
        echo "  server ${PHP_UPSTREAM}:${PHP_UPSTREAM_PORT};" ; \
        echo "}" ; \
    } > /etc/nginx/conf.d/upstream.conf

#--------------------------------------------------------------------------
# Environment
#--------------------------------------------------------------------------

VOLUME /src/public

ENV LANG="C.UTF-8"
ENV LC_ALL="C.UTF-8"
ENV TZ="UTC"

WORKDIR /src/public

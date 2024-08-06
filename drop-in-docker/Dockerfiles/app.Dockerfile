FROM php:8.3.9-fpm-alpine3.20
ARG UID
RUN apk --update add shadow
RUN usermod -u $UID www-data && groupmod -g $UID www-data
RUN apk --update add sudo
RUN echo "www-data ALL=(ALL) NOPASSWD: ALL" >> /etc/sudoers
RUN apk --update add composer
RUN docker-php-ext-install pdo_mysql
RUN apk add --update npm
RUN apk add --update make
RUN apk add --no-cache php-openssl
RUN apk add --no-cache php-pdo_mysql
RUN apk add --no-cache php-mbstring
RUN apk add --no-cache php-dom
RUN apk add --no-cache php-fileinfo
RUN apk add --no-cache php-xmlwriter
RUN apk add --no-cache php-xmlreader
RUN apk add --no-cache php-xml
RUN apk add --no-cache php-tokenizer
RUN apk add --no-cache php-exif
RUN apk add --no-cache php-gd
RUN apk add --no-cache php-session

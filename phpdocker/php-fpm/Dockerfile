FROM phpdockerio/php:8.2-fpm
WORKDIR "/app"

RUN docker-php-ext-install pdo pdo_mysql

RUN apt-get update; \
    apt-get -y --no-install-recommends install \
        git \ 
        php8.2-memcached \ 
        php8.2-mysql \ 
        php8.2-redis; \
    apt-get clean; \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

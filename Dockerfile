FROM php:7.3-fpm

RUN apt-get update \
    && curl -sL https://deb.nodesource.com/setup_12.x | bash - \
    && curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - \
    && echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list \
    && apt-get update \
    && apt-get install -y --no-install-recommends \
        libzip-dev libpng-dev libxml2-dev zlib1g-dev libssl-dev \
        default-mysql-client zip unzip git vim nodejs yarn \
    && docker-php-ext-install pdo_mysql zip exif pcntl gd sockets bcmath > /dev/null \
    && docker-php-ext-configure zip --with-libzip \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN echo "xdebug.remote_enable=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_host=docker.for.mac.localhost" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_port=9000" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "export PHP_IDE_CONFIG=\"serverName=inventory.loc\"" >> /root/.bashrc \
    && echo "if [ -f /root/.bash/.bash_aliases ]; then\n\t. /root/.bash/.bash_aliases\nfi" >> /root/.bashrc

WORKDIR /var/www/inventory-system

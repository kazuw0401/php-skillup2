FROM php:7.2-fpm
RUN cp /usr/share/zoneinfo/Asia/Tokyo /etc/localtime && \
    apt-get update
RUN apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    &&  docker-php-ext-install -j$(nproc) iconv pdo_mysql \
    &&  docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --enable-exif \
    &&  docker-php-ext-install -j$(nproc) gd mbstring iconv exif
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-enable pdo_mysql exif
ADD ./php.ini /usr/local/etc/php/php.ini


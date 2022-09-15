FROM php:8.1.2-apache

COPY composer.lock composer.json /var/www/html/

# Set working directory
WORKDIR /var/www/html/

RUN apt-get update

# 1. development packages
RUN apt-get install -y \
  git \
  zip \
  curl \
  sudo \
  unzip \
  libicu-dev \
  libbz2-dev \
  libpng-dev \
  libjpeg-dev \
  libmcrypt-dev \
  libreadline-dev \
  libzip-dev \
  libfreetype6-dev \
  g++ \
  vim

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

COPY . /var/www/html

# 2. apache configs + document root
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf


# 3. mod_rewrite for URL rewrite and mod_headers for .htaccess extra headers like Access-Control-Allow-Origin-
RUN a2enmod rewrite headers


# 4. start with base php config, then add extensions
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

RUN docker-php-ext-install \
  bz2 \
  intl \
  iconv \
  bcmath \
  opcache \
  calendar \
  pdo_mysql \
  zip

RUN docker-php-ext-configure gd --with-jpeg=/usr/include/ && docker-php-ext-install gd

# 5. composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

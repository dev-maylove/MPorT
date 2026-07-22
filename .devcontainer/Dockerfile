FROM mcr.microsoft.com/devcontainers/php:8.4

RUN apt-get update && apt-get install -y \
    apache2 \
    mariadb-server \
mariadb-client \
    git \
    unzip \
    zip \
    curl \
    nano \
    nodejs \
    npm \
    && docker-php-ext-install pdo pdo_mysql mysqli

COPY apache/000-default.conf /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite

WORKDIR /workspace

CMD service apache2 start && tail -f /dev/null
RUN service mariadb start
